<?php
declare(strict_types=1);

namespace Kennisnet\ECK\Tests\Mapper;

use Kennisnet\ECK\Mapper\ArrayToStringArrayMapper;
use PHPUnit\Framework\TestCase;

final class ArrayToStringArrayMapperTest extends TestCase
{
    /** @dataProvider arrayOfStringsDataProvider */
    public function test_it_maps_an_array_to_an_array_of_strings(array $expected, array $input, string $scenario)
    {
        $this->assertEquals($expected, ArrayToStringArrayMapper::mapArrayToStringArray($input), $scenario);
    }

    public function arrayOfStringsDataProvider(): \Generator
    {
        yield [
            ['test1', 'test2'],
            ['tests' => ['test1', 'test2']],
            'Multiple inputs'
        ];
        yield [
            ['test1'],
            ['test1'],
            'Single input'
        ];
    }
}
