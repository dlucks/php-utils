<?php

class ArrTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var array
     */
    protected $_arrayIndexed = array(
        'foo', 'bar', '42'
    );

    /**
     * @var array
     */
    protected $_arrayAssoc = array(
        'foo' => 'bar',
        'abc' => 'xyz',
    );

    /**
     * Test Arr::get
     *
     * @param $array        Input parameter: $array
     * @param $key          Input parameter: $key
     * @param $default      Input parameter: $default
     * @param $expected     Expected output
     * @test
     * @dataProvider getProvider
     */
    public function testGet($array, $key, $default, $expected)
    {
        $return = Arr::get($array, $key, $default);

        $this->assertEquals($expected, $return);
    }

    /**
     * @return array
     */
    public function getProvider()
    {
        return array
        (
            // Test invalid input.
            array(null, null, null, null),
            array(null, null, 'sly', 'sly'),

            // Test indexed arrays.
            array($this->_arrayIndexed, null, 'hoff', 'hoff'),
            array($this->_arrayIndexed, 0, 'hoff', 'foo'),
            array($this->_arrayIndexed, 2, 'hoff', '42'),
            array($this->_arrayIndexed, 9, 'hoff', 'hoff'),
            array($this->_arrayIndexed, 9, null, null),

            // Test assoc arrays.
            array($this->_arrayAssoc, 'foo', null, 'bar'),
            array($this->_arrayAssoc, 'foo', 'norris', 'bar'),
            array($this->_arrayAssoc, 1, 'norris', 'norris'),
            array($this->_arrayAssoc, 'sly', 'norris', 'norris'),
        );
    }
}