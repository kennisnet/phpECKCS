<?php

namespace Kennisnet\ECK\Tests;

use Kennisnet\ECK\EckRecord;
use Kennisnet\ECK\EckRecordSchemaTypes;
use Kennisnet\ECK\RecordsNormalizer;
use PHPUnit\Framework\TestCase;

class EckResponseNormalizerTest extends TestCase
{
    /**
     * @covers \Kennisnet\ECK\RecordsNormalizer
     */
    public function testRecordNormalizerFromSearchResponse()
    {
        $document   = file_get_contents(__DIR__ . '/data/eckResponse.xml');
        $normalizer = new RecordsNormalizer();

        $deserializedRecords = $normalizer->deserializeFromSearchResponse($document);

        $records = $normalizer->normalize($deserializedRecords, EckRecordSchemaTypes::ECKCS_2_3);

        $this->assertEquals(6, count($records));
        $this->assertInstanceOf(EckRecord::class, array_shift($records));
    }
}
