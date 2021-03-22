<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Mapper;

final class ArrayToStringArrayMapper
{
    /**
     * @return string[]
     */
    public static function mapArrayToStringArray(array $arrayWithValues): array
    {
        $valueArray = array_values($arrayWithValues);
        $propertyValue = array_shift($valueArray);
        return self::mapValueToStringArray($propertyValue);
    }

    /**
     * @param string[]|string|null $value
     * @return string[]
     */
    public static function mapValueToStringArray($value): array
    {
        if (is_array($value)) {
            return $value;
        }
        return null !== $value ? [$value] : [];
    }
}
