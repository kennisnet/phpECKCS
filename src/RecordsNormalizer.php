<?php
declare(strict_types=1);

namespace Kennisnet\ECK;

class RecordsNormalizer
{
    /**
     * @return array<string,EckRecord>|array
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
     */
    private function normalizeECKCS(iterable $data): array
    {
        $records = [];

        foreach ($data as $recordId => $record) {
            $recordData = $record['Entry'];

            $eckRecord = new EckRecord($recordId, $recordData[EckRecord::TITLE]);
            $eckRecord->setDescription($recordData[EckRecord::DESCRIPTION] ?? '');
            $eckRecord->setLocation($recordData[EckRecord::LOCATION] ?? '');
            if (isset($recordData[EckRecord::PUBLISHER])) {
                $eckRecord->setPublisher($recordData[EckRecord::PUBLISHER]);
            }

            if (isset($recordData[EckRecord::AUTHORS])) {
                foreach ($recordData[EckRecord::AUTHORS] as $author) {
                    /* Confusing naming. Author can be plural */
                    if (is_string($author)) {
                        $eckRecord->addAuthor($author);
                    }
                    if (is_array($author)) {
                        foreach ($author as $singleAuthor) {
                            $eckRecord->addAuthor($singleAuthor);
                        }
                    }
                }
            }

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