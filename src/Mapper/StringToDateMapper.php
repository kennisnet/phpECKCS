<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Mapper;

final class StringToDateMapper
{
    public static function mapStringToDate(?string $dateString): ?\DateTimeImmutable
    {
        if (null === $dateString){
            return null;
        }

        try{
            return new \DateTimeImmutable($dateString);
        }catch (\Throwable $exception){
            return null;
        }
    }
}
