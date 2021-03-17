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
        if (is_array($propertyValue)){
            return $propertyValue;
        }
        return null !== $propertyValue ? [$propertyValue] : [];
    }
}
