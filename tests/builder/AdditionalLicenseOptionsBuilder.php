<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Tests\builder;

use Kennisnet\ECK\Model\AdditionalLicenseOptions;

final class AdditionalLicenseOptionsBuilder
{
    /** @var AdditionalLicenseOptions $additionalLicenseOptions */
    private $additionalLicenseOptions;

    public function __construct(AdditionalLicenseOptions $additionalLicenseOptions = null)
    {
        $this->additionalLicenseOptions = $additionalLicenseOptions ?? new AdditionalLicenseOptions();
    }

    public function build(): AdditionalLicenseOptions
    {
        return $this->additionalLicenseOptions;
    }

    public function withAdditionalLicenseOption(array $additionalLicenseOption): self
    {
        $builder = clone $this;
        $builder->additionalLicenseOptions->setAdditionalLicenseOption($additionalLicenseOption);
        return $builder;
    }
}
