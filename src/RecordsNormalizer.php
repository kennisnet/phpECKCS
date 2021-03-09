<?php
declare(strict_types=1);

namespace Kennisnet\ECK;

use Kennisnet\ECK\Exception\MapperException;
use Kennisnet\ECK\Mapper\ArrayToEckRecordMapper;

class RecordsNormalizer
{
    /**
     * @return array<string,EckRecord>|array
     * @throws MapperException
     */
    public function normalize(array $recordData, string $schema): array
    {
        switch ($schema) {
            case EckRecordSchemaTypes::ECKCS_2_3:
            case EckRecordSchemaTypes::ECKCS_2_2:
            case EckRecordSchemaTypes::ECKCS_2_1_1:
                return $this->normalizeECKCS($recordData);
            default:
                return [];
        }
    }

    /**
     * @param iterable $data
     *
     * @return array<string,EckRecord>
     *
     * @throws MapperException
     */
    private function normalizeECKCS(iterable $data): array
    {
        $records = [];
        foreach ($data as $recordId => $record) {
            $recordData = $record['Entry'];
            $recordData['RecordId'] = $recordId;

            $eckRecord = ArrayToEckRecordMapper::mapArrayToEckRecord($recordData);
            $records[$eckRecord->getRecordId()] = $eckRecord;
        }

        return $records;
    }

    /**
     * @return array<string,mixed>
     */
    public function deserializeFromSearchResponse(string $responseString): array
    {
        $responseSerialzer = new ResponseSerializer();

        return $responseSerialzer->deserialize($responseString);
    }

}
