<?php
declare(strict_types=1);

namespace Kennisnet\ECK;

use Kennisnet\ECK\Exception\RecordSchemaNotSupportedException;
use Kennisnet\ECK\Mapper\ArrayToEckRecordMapper;
use Kennisnet\ECK\Model\EckRecord;

class RecordsNormalizer
{
    /**
     * @return array<string,EckRecord>|array
     * @throws RecordSchemaNotSupportedException
     */
    public function normalize(array $recordData, string $schema): array
    {
        switch ($schema) {
            case EckRecordSchemaTypes::ECKCS_2_3:
                return $this->normalizeECKCS($recordData);
            default:
                throw RecordSchemaNotSupportedException::becauseTheRecordSchemaIsNotSupported($schema);
        }
    }

    /**
     * @param iterable $data
     *
     * @return array<string,EckRecord>
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
        return (new ResponseSerializer())->deserialize($responseString);
    }
}
