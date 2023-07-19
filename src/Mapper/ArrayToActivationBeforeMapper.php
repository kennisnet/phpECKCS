<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Mapper;

use Kennisnet\ECK\Model\ActivationBefore;

final class ArrayToActivationBeforeMapper
{

    public static function mapArrayToActivationBefore(?array $activationBeforeArray): ?ActivationBefore
    {
        if (null === $activationBeforeArray) {
            return null;
        }

        $activationBefore = new ActivationBefore();
        $activationBefore->setActivationBeforeDays(StringToIntMapper::mapStringToNullableInt($activationBeforeArray['ActivationBeforeDays'] ?? null));
        $activationBefore->setActivationBeforeDate(StringToDateMapper::mapStringToDate($activationBeforeArray['ActivationBeforeDate'] ?? null));

        return $activationBefore;
    }
}
