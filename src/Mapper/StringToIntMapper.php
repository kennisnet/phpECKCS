<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Mapper;

final class StringToIntMapper
{
    public static function mapStringToInt(?string $value): int
    {
        return self::mapStringToNullableInt($value) ?? 0;
    }

    public static function mapStringToNullableInt(?string $value): ?int
    {
        if (null === $value){
            return null;
        }
        return intval($value);
    }
}
