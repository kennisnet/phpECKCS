<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Tests\Mapper;

use Kennisnet\ECK\Mapper\ArrayToEnvironmentsMapper;
use Kennisnet\ECK\Model\Environments;
use Kennisnet\ECK\Tests\builder\EnvironmentsBuilder;
use PHPUnit\Framework\TestCase;

final class ArrayToEnvironmentsMapperTest extends TestCase
{

    /**
     * @dataProvider environmentsArrayDataProvider
     */
    public function test_it_maps_an_array_to_environments(?array $input, ?Environments $expectedResult, string $scenario): void
    {
        self::assertEquals($expectedResult, ArrayToEnvironmentsMapper::mapArrayToEnvironments($input), $scenario);
    }

    public function environmentsArrayDataProvider(): \Generator
    {
        yield [
            [
                'Platform' => ['iOS', 'Android'],
                'Device' => ['mobile ready', 'tablet'],
                'Browser' => ['Chrome', 'Safari'],
            ],
            (new EnvironmentsBuilder())
                ->withPlatform(['iOS', 'Android'])
                ->withDevice(['mobile ready', 'tablet'])
                ->withBrowser(['Chrome', 'Safari'])
                ->build()
            ,
            'Creates an environments object with multiple platforms, devices and browsers.'
        ];

        yield [
            [],
            (new EnvironmentsBuilder())
                ->build()
            ,
            'Creates an environments object without any platforms, devices or browsers'
        ];

        yield [
            [
                'Platform' => 'iOS'
            ],
            (new EnvironmentsBuilder())
                ->withPlatform(['iOS'])
                ->build()
            ,
            'Creates an environments object with only a single platform and no devices or browsers'
        ];

        yield [
            null,
            null,
            'No environments data returns null.'
        ];
    }
}
