<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Model;

use DateTimeImmutable;

final class ActivationBefore
{
    /** @var int|null */
    private $activationBeforeDays = null;

    /** @var DateTimeImmutable|null */
    private $activationBeforeDate = null;

    /**
     * @return int|null
     */
    public function getActivationBeforeDays(): ?int
    {
        return $this->activationBeforeDays;
    }

    /**
     * @param int|null $activationBeforeDays
     */
    public function setActivationBeforeDays(?int $activationBeforeDays): void
    {
        $this->activationBeforeDays = $activationBeforeDays;
    }

    /**
     * @return DateTimeImmutable|null
     */
    public function getActivationBeforeDate(): ?DateTimeImmutable
    {
        return $this->activationBeforeDate;
    }

    /**
     * @param DateTimeImmutable|null $activationBeforeDate
     */
    public function setActivationBeforeDate(?DateTimeImmutable $activationBeforeDate): void
    {
        $this->activationBeforeDate = $activationBeforeDate;
    }
}