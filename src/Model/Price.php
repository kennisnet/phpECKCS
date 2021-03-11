<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Model;

final class Price
{
    /** @var int */
    private $amount = 0;

    /** @var float */
    private $vat = 0;

    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function getVat(): float
    {
        return $this->vat;
    }

    public function setVat(float $vat): void
    {
        $this->vat = $vat;
    }
}
