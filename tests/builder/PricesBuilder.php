<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Tests\builder;

use Kennisnet\ECK\Model\Price;
use Kennisnet\ECK\Model\Prices;

final class PricesBuilder
{
    /** @var Prices $prices */
    private $prices;

    public function __construct(Prices $prices = null)
    {
        $this->prices = $prices ?? new Prices();
    }

    public function build(): Prices
    {
        return $this->prices;
    }

    public function withCurrency(string $currency): self
    {
        $builder = clone $this;
        $builder->prices->setCurrency($currency);
        return $builder;
    }

    /**
     * @param Price[] $price
     */
    public function withPrice(array $price): self
    {
        $builder = clone $this;
        $builder->prices->setPrice($price);
        return $builder;
    }

    public function withConsumerPrice(int $consumerPrice): self
    {
        $builder = clone $this;
        $builder->prices->setConsumerPrice($consumerPrice);
        return $builder;
    }
}
