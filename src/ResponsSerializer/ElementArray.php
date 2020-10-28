<?php
declare(strict_types=1);

namespace Kennisnet\ECK\ResponseSerializer;


class ElementArray implements ElementValue
{
    /**
     * @var array
     */
    protected $value;

    public function __construct(array $value)
    {
        $this->value = $value;
    }

    public function isArray(): bool
    {
        return true;
    }

    public function getValue(): array
    {
        return $this->value;
    }

}