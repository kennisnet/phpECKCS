<?php
declare(strict_types=1);

namespace Kennisnet\ECK;

use Kennisnet\ECK\Exception\RecordSchemaNotSupportedException;
use Kennisnet\ECK\Mapper\ArrayToEckRecordMapper;

class RecordsNormalizer
{
    /**
     * @param string $schema
     *
     * @return bool
     */
    public function supportsSchema(string $schema): bool
    {
        $reflect = new \ReflectionClass(EckRecordSchemaTypes::class);
        if (in_array($schema, EckRecordSchemaTypes::unsupportedVersion)) {
            return false;
        }

        return in_array($schema, $reflect->getConstants());
    }

    /**
     * @param array $recordData
     * @param string $schema
     *
     * @return array<string,EckRecord>|array
     * @throws RecordSchemaNotSupportedException
     */
    public function normalize(array $recordData, string $schema): array
    {
        switch ($schema) {
            case EckRecordSchemaTypes::ECKCS_2_5_1:
            case EckRecordSchemaTypes::ECKCS_2_5_2:
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
