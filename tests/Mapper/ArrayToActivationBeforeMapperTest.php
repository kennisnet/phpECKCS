<?php
declare(strict_types=1);


namespace Kennisnet\ECK\Tests\Mapper;


use DateTimeImmutable;
use Kennisnet\ECK\Mapper\ArrayToActivationBeforeMapper;
use Kennisnet\ECK\Model\ActivationBefore;
use Kennisnet\ECK\Tests\builder\ActivationBeforeBuilder;
use PHPUnit\Framework\TestCase;

final class ArrayToActivationBeforeMapperTest extends TestCase
{

    /**
     * @dataProvider activationBeforeDataProvider
     */
    public function test_it_maps_an_array_to_activation_before(?array $input, ?ActivationBefore $expectedResult, string $scenario): void
    {
        self::assertEquals($expectedResult, ArrayToActivationBeforeMapper::mapArrayToActivationBefore($input), $scenario);
    }

    public function activationBeforeDataProvider(): \Generator
    {
        yield [
            [
                'ActivationBeforeDays' => '30'
            ],
            (new ActivationBeforeBuilder())
                ->withActivationBeforeDays(30)
                ->build()
            ,
            'Creates an activation before object with ActivationBeforeDays set to 30 and date not there.'
        ];

        yield [
            [
                'ActivationBeforeDate' => '2021-07-16T23:59:59+01:00'
            ],
            (new ActivationBeforeBuilder())
                ->withActivationBeforeDate(new DateTimeImmutable('2021-07-16T23:59:59+01:00'))
                ->build()
            ,
            'Creates an activation before object with ActivationBeforeDate set to july 16th 2021 and no activation before days.'
        ];

        yield [
            null,
            null,
            'No activation before data returns null'
        ];
    }
}