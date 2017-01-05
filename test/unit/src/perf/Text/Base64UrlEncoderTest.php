<?php

namespace perf\Text;

/**
 *
 */
class Base64UrlEncoderTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @var Base64UrlEncoder
     */
    private $encoder;

    /**
     *
     */
    protected function setUp()
    {
        $this->encoder = new Base64UrlEncoder();
    }

    /**
     *
     */
    public function dataProviderEncodeWithoutTrimming()
    {
        return array(
            array('',     ''),
            array('foo',  'Zm9v'),
            array('1234', 'MTIzNA=='),
        );
    }

    /**
     *
     * @dataProvider dataProviderEncodeWithoutTrimming
     */
    public function testEncodeWithoutTrimming($string, $expected)
    {
        $result = $this->encoder->encode($string);

        $this->assertSame($expected, $result);
    }

    /**
     *
     * @dataProvider dataProviderEncodeWithoutTrimming
     */
    public function testDecodeWithoutTrimming($expected, $string)
    {
        $result = $this->encoder->decode($string);

        $this->assertSame($expected, $result);
    }

    /**
     *
     */
    public function dataProviderEncodeWithTrimming()
    {
        return array(
            array('',     ''),
            array('foo',  'Zm9v'),
            array('1234', 'MTIzNA'),
        );
    }

    /**
     *
     * @dataProvider dataProviderEncodeWithTrimming
     */
    public function testEncodeWithTrimming($string, $expected)
    {
        $result = $this->encoder->encode($string, Base64UrlEncoder::TRIM);

        $this->assertSame($expected, $result);
    }

    /**
     *
     * @dataProvider dataProviderEncodeWithTrimming
     */
    public function testDecodeWithTrimming($expected, $string)
    {
        $result = $this->encoder->decode($string);

        $this->assertSame($expected, $result);
    }
}
