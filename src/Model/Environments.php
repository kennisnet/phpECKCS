<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Model;

final class Environments
{
    /** @var string[] */
    private $platform = [];

    /** @var string[] */
    private $device = [];

    /** @var string[] */
    private $browser = [];

    /**
     * @return string[]
     */
    public function getPlatform(): array
    {
        return $this->platform;
    }

    /**
     * @param string[] $platform
     */
    public function setPlatform(array $platform): void
    {
        $this->platform = $platform;
    }

    /**
     * @return string[]
     */
    public function getDevice(): array
    {
        return $this->device;
    }

    /**
     * @param string[] $device
     */
    public function setDevice(array $device): void
    {
        $this->device = $device;
    }

    /**
     * @return string[]
     */
    public function getBrowser(): array
    {
        return $this->browser;
    }

    /**
     * @param string[] $browser
     */
    public function setBrowser(array $browser): void
    {
        $this->browser = $browser;
    }
}
