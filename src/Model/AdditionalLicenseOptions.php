<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Model;

final class AdditionalLicenseOptions
{
    /** @var string[] */
    private $additionalLicenseOption = [];

    /**
     * @return string[]
     */
    public function getAdditionalLicenseOption(): array
    {
        return $this->additionalLicenseOption;
    }

    /**
     * @param string[] $additionalLicenseOption
     */
    public function setAdditionalLicenseOption(array $additionalLicenseOption): void
    {
        $this->additionalLicenseOption = $additionalLicenseOption;
    }
}
