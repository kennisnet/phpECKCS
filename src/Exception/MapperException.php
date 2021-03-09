<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Exception;

final class MapperException extends \Exception
{
    public static function becauseMethodIsNotImplementedInTargetClass(string $methodName, string $class): self
    {
        return new self(sprintf('Method \'%s\' is not implemented in class \'%s\'', $methodName, $class));
    }
}
