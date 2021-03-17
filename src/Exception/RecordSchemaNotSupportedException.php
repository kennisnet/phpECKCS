<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Exception;

final class RecordSchemaNotSupportedException extends \Exception
{
    public static function becauseTheRecordSchemaIsNotSupported(string $recordSchema): self
    {
        return new self(sprintf('The record schema <\'%s\'> is not supported by this normalizer.', $recordSchema));
    }
}
