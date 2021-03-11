<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Mapper;

use Kennisnet\ECK\Model\Price;

final class ArrayToPriceMapper
{
    /**
     * @return Price[]
     */
    public static function mapArrayToPrices(array $pricesArray): array
    {
        $keys = array_keys($pricesArray);
        if (in_array(array_shift($keys), ['Amount', 'VAT'], true)) {
            return [ArrayToPriceMapper::mapArrayToSinglePrice($pricesArray)];
        }
        return array_map(function (array $singlePriceArray) {
            return ArrayToPriceMapper::mapArrayToSinglePrice($singlePriceArray);
        }, $pricesArray);
    }

    private static function mapArrayToSinglePrice(array $priceArray): Price
    {
        $price = new Price();
        $price->setAmount(StringToIntMapper::mapStringToInt($priceArray['Amount']));
        $price->setVat(StringToFloatMapper::mapStringToFloat($priceArray['VAT']));
        return $price;
    }

}
