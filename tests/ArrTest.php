<?php

class ArrTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     * @dataProvider testGetProvider
     */
    public function testGet($array, $key, $default, $expectedReturn)
    {
        $return = Arr::get($array, $key, $default);

        $this->assertEquals($expectedReturn, $return);
    }

    /**
     * @return array
     */
    public function testGetProvider()
    {
        return array
        (
            array(null, null, null, null),
            array(null, null, 'foo', 'foo'),
            array(array('foo' => 'bar'), 'foo', null, 'bar'),
            array(array('foo' => 'bar'), 'foo', 'defaultValue', 'bar'),
        );
    }
}