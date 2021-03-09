<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Tests\Mapper;

use Kennisnet\ECK\EckRecord;
use Kennisnet\ECK\Mapper\ArrayToEckRecordMapper;
use Kennisnet\ECK\ResponseSerializer;
use Kennisnet\ECK\Tests\builder\EckRecordBuilder;
use PHPUnit\Framework\TestCase;

final class ArrayToEckRecordMapperTest extends TestCase
{
    /**
     * @covers \Kennisnet\ECK\Mapper\ArrayToEckRecordMapper
     */
    public function test_it_maps_an_array_to_a_record()
    {
        $eckRecord = ArrayToEckRecordMapper::mapArrayToEckRecord($this->singleEntryAsArray());
        self::assertEquals($this->expectedResult(), $eckRecord);
    }

    private function expectedResult(): EckRecord
    {
        return EckRecordBuilder::withRecordIdAndTitle(
            'deviant_test:5995920c-c6aa-5ddd-aa80-f2bbbdf545d6',
            'Engels Verkort (BBL)'
        )
            ->withDescription('')
            ->withInformationLocation('')
            ->withPublisher('Uitgeverij Deviant bv')
            ->withAuthors(['Uitgeverij Deviant bv'])
            ->build();
    }

    private function singleEntryAsArray(): array
    {
        $document = file_get_contents(__DIR__ . '/../data/eckResponse.xml');
        $recordsAsArray = (new ResponseSerializer())->deserialize($document);
        $firstEntry = array_values($recordsAsArray)[0];
        $firstEntry['Entry']['RecordId'] = array_keys($recordsAsArray)[0];
        return $firstEntry['Entry'];
    }
}
