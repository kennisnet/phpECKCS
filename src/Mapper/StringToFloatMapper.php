<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Mapper;

final class StringToFloatMapper
{
    public static function mapStringToFloat(?string $vat): float
    {
        return floatval($vat);
    }
}
