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
        if (self::isSinglePriceArray($pricesArray)) {
            return [ArrayToPriceMapper::mapArrayToSinglePrice($pricesArray)];
        }

        $combinedAmountAndPricesArrays = self::createPricesArraysFromAmountAndVatArrays(
            array_values($pricesArray['Amount'] ?? []),
            array_values($pricesArray['VAT'] ?? [])
        );

        return array_map(
            function (array $priceArray) {
                return self::mapArrayToSinglePrice($priceArray);
            }, $combinedAmountAndPricesArrays
        );

    }

    private static function mapArrayToSinglePrice(array $priceArray): Price
    {
        $price = new Price();
        $price->setAmount(StringToIntMapper::mapStringToInt($priceArray['Amount']));
        $price->setVat(StringToFloatMapper::mapStringToFloat($priceArray['VAT']));
        return $price;
    }

    private static function createPricesArraysFromAmountAndVatArrays(array $amountArray, array $vatArray): array
    {
        $combinedAmountAndPricesArrays = [];
        for ($i = 0; $i < sizeof($amountArray); $i++) {
            $combinedAmountAndPricesArrays[] = [
                'Amount' => $amountArray[$i],
                'VAT' => $vatArray[$i],
            ];
        }
        return $combinedAmountAndPricesArrays;
    }

    private static function isSinglePriceArray(array $pricesArray)
    {
        /*
         * The serializer returns some strange results. It casts a 0 to a null for example
         * which makes it hard to differentiate between a set value and a not-set
         * value. We only look at the VAT therefore, because that contains a not-0 value
         * for the VAT, which does not cast to null in the serializer..
         */
        return sizeof($pricesArray) === 2 
            && isset($pricesArray['VAT'])
            && !is_array($pricesArray['VAT']);

    }

}
