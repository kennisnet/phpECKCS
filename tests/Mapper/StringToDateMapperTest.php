<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Tests\Mapper;

use Kennisnet\ECK\Mapper\StringToDateMapper;
use PHPUnit\Framework\TestCase;

final class StringToDateMapperTest extends TestCase
{
    /** @dataProvider stringToDateMapperDataProvider */
    public function test_it_maps_a_string_to_a_date(?\DateTimeImmutable $expected, ?string $input, string $description)
    {
        self::assertEquals($expected, StringToDateMapper::mapStringToDate($input), $description);
    }

    public function stringToDateMapperDataProvider(): \Generator
    {
        yield [null, null, 'No input returns no date'];
        yield [new \DateTimeImmutable('2020-01-02T21:14:42+01:00'), '2020-01-02T21:14:42+01:00', 'It maps a date string to a date'];
        yield [null, 'no valid date', 'Invalid date returns null'];
    }
}
