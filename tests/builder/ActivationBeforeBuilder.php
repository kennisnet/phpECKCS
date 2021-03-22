<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Tests\builder;

use Kennisnet\ECK\Model\ActivationBefore;

final class ActivationBeforeBuilder
{
    /** @var ActivationBefore $activationBefore */
    private $activationBefore;

    public function __construct(ActivationBefore  $activationBefore = null)
    {
        $this->activationBefore = $activationBefore ?? new ActivationBefore();
    }

    public function build(): ActivationBefore
    {
        return $this->activationBefore;
    }

    public function withActivationBeforeDays(int $activationBeforeDays): self
    {
        $builder = clone $this;
        $builder->activationBefore->setActivationBeforeDays($activationBeforeDays);
        return $builder;
    }

    public function withActivationBeforeDate(\DateTimeImmutable $activationBeforeDate): self
    {
        $builder = clone $this;
        $builder->activationBefore->setActivationBeforeDate($activationBeforeDate);
        return $builder;
    }
}