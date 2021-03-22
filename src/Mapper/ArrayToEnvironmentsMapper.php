<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Mapper;

use Kennisnet\ECK\Model\Environments;

final class ArrayToEnvironmentsMapper
{
    public static function mapArrayToEnvironments(?array $environmentsArray): ?Environments
    {
        if (null === $environmentsArray) {
            return null;
        }

        $environments = new Environments();
        $environments->setPlatform(ArrayToStringArrayMapper::mapValueToStringArray($environmentsArray['Platform'] ?? null));
        $environments->setDevice(ArrayToStringArrayMapper::mapValueToStringArray($environmentsArray['Device'] ?? null));
        $environments->setBrowser(ArrayToStringArrayMapper::mapValueToStringArray($environmentsArray['Browser'] ?? null));
        return $environments;
    }
}