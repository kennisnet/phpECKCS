<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Tests\Mapper;

use DateTimeImmutable;
use Kennisnet\ECK\Mapper\ArrayToEckRecordMapper;
use Kennisnet\ECK\EckRecord;
use Kennisnet\ECK\ResponseSerializer;
use Kennisnet\ECK\Tests\builder\EckRecordBuilder;
use Kennisnet\ECK\Tests\builder\PriceBuilder;
use Kennisnet\ECK\Tests\builder\PricesBuilder;
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
            'toegangorg:0c1b8824-6989-5034-b116-7ae1bc0922bd',
            'Code+ Takenboek deel 1 inclusief 1/2 jaar licentie'
        )
            ->withProductId('9789006439816')
            ->withPublisher('Thiememeulenhoff')
            ->withVersion('2')
            ->withPublisherThumbnailLocation('https://www.thiememeulenhoff.nl/areas/Corporate/Images/svg/thiememeulenhoff-logo-no-border.svg')
            ->withProductThumbnailLocation('https://cdn.tham.thiememeulenhoff.nl/image-output/tham.prod.85dc07d2-e6ca-4a7c-bbbc-1b98dabf4fa4/tmthumb.png')
            ->withAccessLocation('https://toegang.org/9789006439816')
            ->withEndOfLifeDate(new DateTimeImmutable('2022-09-27T00:00:00.000Z'))
            ->withFirstPublishedDate(new DateTimeImmutable('2020-09-01T00:00:00.000Z'))
            ->withLastModifiedDate(new DateTimeImmutable('2022-09-27T00:00:00.000Z' ))
            ->withAuthors(['ThiemeMeulenhoff'])
            ->withDescription('Code+ Takenboek deel 1 inclusief 1/2 jaar licentie')
            ->withContentLocation(null)
            ->withIntendedEndUserRole('Onderwijsvolger')
            ->withProductState('Niet meer leverbaar')
//            ->withInformationLocation(null)
            ->withMedium('Boek')
            ->withIsConsumptionProduct(true)
//            ->withProductUsages(['Oefenmateriaal'])
            ->withProductFamilyName('Code+')
//            ->withSectors(['PO'])
//            ->withCourses(['Extra'])
//            ->withLevels(['PO'])
//            ->withYears(['jaar 3'])
            ->withSaleUnitSize(1)
            ->withPrices((new PricesBuilder())->withCurrency('EUR')->withConsumerPrice(0)->withPrice([
                (new PriceBuilder())->withVat(0.0)->withAmount(0)->build()
            ])->build())
            ->withPriceIsIndicative(true)
            ->withIsLicensed(true)
            ->withIsCatalogItem(false)
            ->withCopyright(null)
            ->build();
    }

    private function singleEntryAsArray(): array
    {
        /** @var string $document */
        $document = file_get_contents(__DIR__ . '/../data/eckResponse.xml');
        $recordsAsArray = (new ResponseSerializer())->deserialize($document);
        $firstEntry = array_values($recordsAsArray)[0];
        $firstEntry['Entry']['RecordId'] = array_keys($recordsAsArray)[0];
        return $firstEntry['Entry'];
    }
}
