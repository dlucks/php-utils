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

    /**
     * Test Str::startsWith
     *
     * @param string $string
     * @param string $subString
     * @param bool $caseSensitive
     * @param bool $expected
     * @test
     * @dataProvider startsWithProvider
     */
    public function testStartsWith($string, $subString, $caseSensitive, $expected)
    {
        $return = Str::startsWith($string, $subString, $caseSensitive);

        $this->assertEquals($expected, $return);
    }

    /**
     * @return array
     */
    public function startsWithProvider()
    {
        return array
        (
            array('', '', true, true),
            array('', '', false, true),
            array('foobar', 'foo', true, true),
            array('foobar', 'bar', true, false),
            array('foobar', 'FOO', false, true),
            array('foobar', 'BAR', false, false),
            array('foobar_foobar', 'foo', true, true),
        );
    }

    /**
     * Test Str::endsWith
     *
     * @param string $string
     * @param string $subString
     * @param bool $caseSensitive
     * @param bool $expected
     * @test
     * @dataProvider endsWithProvider
     */
    public function testEndsWith($string, $subString, $caseSensitive, $expected)
    {
        $return = Str::endsWith($string, $subString, $caseSensitive);

        $this->assertEquals($expected, $return);
    }

    /**
     * @return array
     */
    public function endsWithProvider()
    {
        return array
        (
            array('', '', true, true),
            array('', '', false, true),
            array('foobar', 'foo', true, false),
            array('foobar', 'bar', true, true),
            array('foobar', 'FOO', false, false),
            array('foobar', 'BAR', false, true),
            array('foobar_foobar', 'bar', true, true),
        );
    }
}