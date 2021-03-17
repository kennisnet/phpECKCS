<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Model;

final class Prices
{
    /** @var string */
    private $currency = '';

    /** @var int|null */
    private $consumerPrice = null;

    /** @var Price[] */
    private $price = [];

    public function getCurrency(): string
    {
        return $this->currency;
    }

    public function setCurrency(string $currency): void
    {
        $this->currency = $currency;
    }

    public function getConsumerPrice(): ?int
    {
        return $this->consumerPrice;
    }

    public function setConsumerPrice(?int $consumerPrice): void
    {
        $this->consumerPrice = $consumerPrice;
    }

    public function getPrice(): array
    {
        return $this->price;
    }

    public function setPrice(array $price): void
    {
        $this->price = $price;
    }
}
