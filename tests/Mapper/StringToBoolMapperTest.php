<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Tests\Mapper;

use Kennisnet\ECK\Mapper\StringToBoolMapper;
use PHPUnit\Framework\TestCase;

final class StringToBoolMapperTest extends TestCase
{
    /** @dataProvider stringToBoolMapperDataProvider */
    public function test_it_maps_a_string_to_a_bool(bool $expected, ?string $input, string $description)
    {
        $this->assertEquals($expected, StringToBoolMapper::mapStringToBool($input), $description);
    }

    public function stringToBoolMapperDataProvider(): \Generator
    {
        yield [true, 'true', '\'true\' resolves to true'];
        yield [true, 'True', '\'True\' resolves to true'];
        yield [true, '1', '\'1\' resolves to true'];
        yield [false, 'false', '\'false\' resolves to false'];
        yield [false, 'False', '\'False\' resolves to false'];
        yield [false, '0', '\'0\' resolves to false'];
        yield [false, null, 'null resolves to false'];
        yield [false, 'null', '\'null\' resolves to false'];

    }
}
