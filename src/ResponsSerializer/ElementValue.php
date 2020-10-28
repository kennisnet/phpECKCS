<?php
declare(strict_types=1);

namespace Kennisnet\ECK\ResponseSerializer;

interface ElementValue
{
    const ARRAY  = 'ARRAY';
    const STRING = 'string';

    public function isArray(): bool;

    /**
     * @return string|array
     */
    public function getValue();
}