<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Tests\Mapper;

use Kennisnet\ECK\Mapper\ArrayToAdditionalLicenseOptionsMapper;
use Kennisnet\ECK\Model\AdditionalLicenseOptions;
use Kennisnet\ECK\Tests\builder\AdditionalLicenseOptionsBuilder;
use PHPUnit\Framework\TestCase;

final class ArrayToAdditionalLicenseOptionsMapperTest extends TestCase
{

    /**
     * @dataProvider additionalLicenseOptionsArrayDataProvider
     */
    public function test_it_maps_an_array_to_additional_license_options(?array $input, ?AdditionalLicenseOptions $expectedResult, string $scenario): void
    {
        self::assertEquals($expectedResult, ArrayToAdditionalLicenseOptionsMapper::mapArrayToAdditionalLicenseOptions($input), $scenario);
    }

    public function additionalLicenseOptionsArrayDataProvider(): \Generator
    {
        yield [
            [
                'AdditionalLicenseOption' => ['Inkijkexemplaar', 'Demo-exemplaar']
            ],
            (new AdditionalLicenseOptionsBuilder())
                ->withAdditionalLicenseOption(['Inkijkexemplaar', 'Demo-exemplaar'])
                ->build()
            ,
            'Creates an additional license options object with multiple additional license options'
        ];

        yield [
            [
                'AdditionalLicenseOption' => 'Inkijkexemplaar'
            ],
            (new AdditionalLicenseOptionsBuilder())
                ->withAdditionalLicenseOption(['Inkijkexemplaar'])
                ->build()
            ,
            'Creates an additional license options object with a single additional license option'
        ];

        yield [
            null,
            null,
            'No additional license options should return null'
        ];
    }
}