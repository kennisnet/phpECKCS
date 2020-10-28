<?php
declare(strict_types=1);

namespace Kennisnet\ECK\ResponseSerializer;


class ElementString implements ElementValue
{
    /**
     * @var string
     */
    protected $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function getValue(): string
    {
        return $this->value;
    }


    public function isArray(): bool
    {
        return false;
    }

}