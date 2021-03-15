<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Mapper;

final class StringToBoolMapper
{
    public static function mapStringToBool(?string $value): bool
    {
        if (null === $value){
            return false;
        }
        $lcValue = strtolower($value);
        return 'false' !== $lcValue && '0' !== $lcValue && 'null' !== $lcValue;
    }
}
