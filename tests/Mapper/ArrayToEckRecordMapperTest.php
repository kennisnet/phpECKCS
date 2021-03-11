<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Tests\Mapper;

use DateTimeImmutable;
use Kennisnet\ECK\Mapper\ArrayToEckRecordMapper;
use Kennisnet\ECK\Model\EckRecord;
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
            'kinheim:07168b06-92e2-5569-aca3-75f13349f8e0',
            'Mijn Boek 3'
        )
            ->withProductId('9789060523094')
            ->withPublisher('Educatieve Uitgeverij Kinheim')
            ->withPublisherThumbnailLocation('https://www.kinheim.com/wp-content/uploads/kinheim-logo-blauw-op-wit.png')
            ->withProductThumbnailLocation('https://www.kinheim.com/wp-content/uploads/2012/05/712-292-Mijn-Boek-deel-2.png')
            ->withAuthors(['kinheim'])
            ->withDescription('Het aanbod van puzzels in Mijn Boek deel 3 omvat: woordzoekers, speurpuzzels, woordpuzzels, legletters, zoek de verschillen, anagrammen en magische vierkanten.')
            ->withContentLocation('https://www.kinheim.com/leermiddelen/mijn-boek-3/?attribute_pa_aantal=los-exemplaar')
            ->withIntendedEndUserRole('Onderwijsvolger')
            ->withProductState('Leverbaar')
            ->withInformationLocation('https://www.kinheim.com/leermiddelen/mijn-boek-3/?attribute_pa_aantal=los-exemplaar')
            ->withMedium('Boek')
            ->withIsConsumptionProduct(true)
            ->withProductUsages(['Oefenmateriaal'])
            ->withSectors(['PO'])
            ->withCourses(['Extra'])
            ->withLevels(['PO'])
            ->withYears(['jaar 3'])
            ->withSaleUnitSize(1)
            ->withPrices((new PricesBuilder())->withCurrency('EUR')->withPrice([
                (new PriceBuilder())->withVat(9)->withAmount(913)->build()
            ])->build())
            ->withIsLicensed(false)
            ->withIsCatalogItem(true)
            ->withCopyright('yes')
            ->withLastModifiedDate(new DateTimeImmutable('2020-01-02T21:14:42+01:00'))
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
