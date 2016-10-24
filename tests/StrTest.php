<?php

class StrTest extends PHPUnit_Framework_TestCase
{
    /**
     * Test Str::toCamelCase
     *
     * @param $string       Input parameter: $string
     * @param $expected     Expected output
     * @test
     * @dataProvider toCamelCaseProvider
     */
    public function testToCamelCase($string, $expected)
    {
        $return = Str::toCamelCase($string);

        $this->assertEquals($expected, $return);
    }

    /**
     * @return array
     */
    public function toCamelCaseProvider()
    {
        return array
        (
            array('', ''),
            array('foobar', 'foobar'),
            array('foo_bar', 'fooBar'),
            array('ultra_foo_bar', 'ultraFooBar'),
        );
    }

    /**
     * Test Str::toSnakeCase
     *
     * @param $string       Input parameter: $string
     * @param $expected     Expected output
     * @test
     * @dataProvider toSnakeCaseProvider
     */
    public function testToSnakeCase($string, $expected)
    {
        $return = Str::toSnakeCase($string);

        $this->assertEquals($expected, $return);
    }

    /**
     * @return array
     */
    public function toSnakeCaseProvider()
    {
        return array
        (
            array('', ''),
            array('foobar', 'foobar'),
            array('fooBar', 'foo_bar'),
            array('ultraFooBar', 'ultra_foo_bar'),
        );
    }
}