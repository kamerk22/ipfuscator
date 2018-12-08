<?php

/**
 *
 * Part of the IPFuscator package.
 * Author: Kashyap Merai <kashyapk62@gmail.com>
 *
 */

use kamerk22\IPFuscator\Exception\InvalidArgument;
use kamerk22\IPFuscator\IPFuscator;
use PHPUnit\Framework\TestCase;

class IPFuscatorTest extends TestCase
{
    public $ip = '127.0.0.1';

    public function testCanBeUsedWithValidIp()
    {
        $this->assertIsString(
            IPFuscator::class,
            IPFuscator::getDecimal($this->ip)
        );
    }

    public function testCanBeUsedWithInvalidIp()
    {
        $this->expectException(InvalidArgument::class);
        IPFuscator::getDecimal('in.va.lid.ip');
    }

    public function testCanBeValidDecimal()
    {
        $this->assertEquals(
            '2130706433',
            IPFuscator::getDecimal($this->ip)
        );
    }

    public function testCanBeValidHexadecimal()
    {
        $this->assertEquals(
            '0x7f000001',
            IPFuscator::getHexadecimal($this->ip)
        );
    }

    public function testCanBeValidOctal()
    {
        $this->assertEquals(
            '017700000001',
            IPFuscator::getOctal($this->ip)
        );
    }

    public function testCanBeValidFullHex()
    {
        $this->assertEquals(
            '0x7f.0x0.0x0.0x1',
            IPFuscator::getFullHex($this->ip)
        );
    }

    public function testCanBeValidFullOct()
    {
        $this->assertEquals(
            '0177.00.00.01',
            IPFuscator::getFullOct($this->ip)
        );
    }
}