<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Tests\builder;

use Kennisnet\ECK\Model\Environments;

final class EnvironmentsBuilder
{
    /** @var Environments $environments */
    private $environments;

    public function __construct(Environments $environments = null)
    {
        $this->environments = $environments ?? new Environments();
    }

    public function build(): Environments
    {
        return $this->environments;
    }

    public function withPlatform(array $platform): self
    {
        $builder = clone $this;
        $builder->environments->setPlatform($platform);
        return $builder;
    }

    public function withDevice(array $device): self
    {
        $builder = clone $this;
        $builder->environments->setDevice($device);
        return $builder;
    }

    public function withBrowser(array $browser): self
    {
        $builder = clone $this;
        $builder->environments->setBrowser($browser);
        return $builder;
    }

}