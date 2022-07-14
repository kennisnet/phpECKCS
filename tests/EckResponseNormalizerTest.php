<?php

namespace Kennisnet\ECK\Tests;

use Kennisnet\ECK\EckRecordSchemaTypes;
use Kennisnet\ECK\Exception\RecordSchemaNotSupportedException;
use Kennisnet\ECK\EckRecord;
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
        $this->assertEquals(10, count($records));
        $this->assertInstanceOf(EckRecord::class, array_shift($records));

        $records = $normalizer->normalize($deserializedRecords, EckRecordSchemaTypes::ECKCS_2_4);
        $this->assertEquals(10, count($records));
        $this->assertInstanceOf(EckRecord::class, array_shift($records));

        $records = $normalizer->normalize($deserializedRecords, EckRecordSchemaTypes::ECKCS_2_5);
        $this->assertEquals(10, count($records));
        $this->assertInstanceOf(EckRecord::class, array_shift($records));
    }

    public function test_it_throws_not_supported_exception_when_schema_is_not_supported()
    {
        $document   = file_get_contents(__DIR__ . '/data/eckResponse.xml');
        $normalizer = new RecordsNormalizer();

        $deserializedRecords = $normalizer->deserializeFromSearchResponse($document);

        $this->expectException(RecordSchemaNotSupportedException::class);
        $normalizer->normalize($deserializedRecords, EckRecordSchemaTypes::ECKCS_2_2);
    }
}
