<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Mapper;

use Kennisnet\ECK\Model\AdditionalLicenseOptions;

final class ArrayToAdditionalLicenseOptionsMapper
{
    public static function mapArrayToAdditionalLicenseOptions(?array $additionalLicenseOptionsArray): ?AdditionalLicenseOptions
    {
        if (null === $additionalLicenseOptionsArray) {
            return null;
        }

        $additionalLicenseOptions = new AdditionalLicenseOptions();
        $additionalLicenseOptions->setAdditionalLicenseOption(ArrayToStringArrayMapper::mapValueToStringArray($additionalLicenseOptionsArray['AdditionalLicenseOption'] ?? null));
        return $additionalLicenseOptions;

    }

}