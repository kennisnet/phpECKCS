<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Tests\Mapper;

use PHPUnit\Framework\TestCase;

final class StringToIntMapperTest extends TestCase
{
    /** @dataProvider mapStringToIntDataProvider */
    public function test_it_maps_a_string_to_an_int(int $expected, ?string $input, string $description)
    {
        self::assertEquals($expected, $input, $description);
    }

    /** @dataProvider mapStringToNullableIntDataProvider */
    public function test_it_maps_a_string_to_a_nullable_int(?int $expected, ?string $input, string $description)
    {
        self::assertEquals($expected, $input, $description);
    }

    public function mapStringToIntDataProvider(): \Generator
    {
        yield [0, null, 'null maps to 0'];
        yield [0, '0', '\'0\' maps to 0'];
        yield [5, '5', '\'5\' maps to 5'];
    }

    public function mapStringToNullableIntDataProvider(): \Generator
    {
        yield [null, null, 'null maps to null'];
        yield [0, '0', '\'0\' maps to 0'];
        yield [5, '5', '\'5\' maps to 5'];
    }
}
