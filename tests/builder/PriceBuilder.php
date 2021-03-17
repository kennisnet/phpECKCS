<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Tests\builder;

use Kennisnet\ECK\Model\Price;

final class PriceBuilder
{
    private $price;

    public function __construct(Price $price = null)
    {
        $this->price = $price ?? new Price();
    }

    public function build(): Price
    {
        return $this->price;
    }

    public function withAmount(int $amount): self
    {
        $builder = clone $this;
        $builder->price->setAmount($amount);
        return $builder;
    }

    public function withVat(float $vat): self
    {
        $builder = clone $this;
        $builder->price->setVat($vat);
        return $builder;
    }
}
