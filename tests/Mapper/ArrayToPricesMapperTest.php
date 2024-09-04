<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Tests\Mapper;

use Kennisnet\ECK\Mapper\ArrayToPricesMapper;
use Kennisnet\ECK\Model\Prices;
use Kennisnet\ECK\Tests\builder\PriceBuilder;
use Kennisnet\ECK\Tests\builder\PricesBuilder;
use PHPUnit\Framework\TestCase;

final class ArrayToPricesMapperTest extends TestCase
{
    /**
     * @dataProvider pricesArrayDataProvider
     */
    public function test_it_maps_an_array_to_prices(array $input, Prices $expectedResult, string $scenario): void
    {
        $this->assertEquals($expectedResult, ArrayToPricesMapper::mapArrayToPrices($input), $scenario);
    }

    public static function pricesArrayDataProvider(): \Generator
    {
        yield [
            [
                'Currency' => 'EUR',
                'Price' => [
                    [
                        'Amount' => '913',
                        'VAT' => '9',
                    ],
                    [
                        'Amount' => '1002',
                        'VAT' => '21',
                    ]
                ]
            ],
            (new PricesBuilder())
                ->withCurrency('EUR')
                ->withPrice([
                    (new PriceBuilder())->withAmount(913)->withVat(9)->build(),
                    (new PriceBuilder())->withAmount(1002)->withVat(21)->build(),
                ])
                ->build()
            ,
            'Creates a prices object, with multiple price(s) and no ConsumerPrice',
        ];

        yield [
            [
                'Currency' => 'EUR',
                'ConsumerPrice' => '913',
                'Price' => [
                    'Amount' => '913',
                    'VAT' => '9',
                ],

            ],
            (new PricesBuilder())
                ->withCurrency('EUR')
                ->withConsumerPrice(913)
                ->withPrice([
                    (new PriceBuilder())->withAmount(913)->withVat(9)->build(),
                ])
                ->build()
            ,
            'Creates a prices object, with single price and ConsumerPrice',
        ];
    }
}
