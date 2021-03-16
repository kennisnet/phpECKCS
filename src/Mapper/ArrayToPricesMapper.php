<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Mapper;

use Kennisnet\ECK\Model\Prices;

final class ArrayToPricesMapper
{
    public static function mapArrayToPrices(array $pricesArray): Prices
    {
        $prices = new Prices();
        $prices->setCurrency($pricesArray['Currency'] ?? '');
        $prices->setConsumerPrice(StringToIntMapper::mapStringToInt($pricesArray['ConsumerPrice'] ?? null));
        $prices->setPrice(ArrayToPriceMapper::mapArrayToPrices($pricesArray['Price'] ?? []));
        return $prices;
    }
}
