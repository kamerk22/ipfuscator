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

    /**
     * testCanBeUsedWithValidIp
     * @throws InvalidArgument
     */
    public function testCanBeUsedWithValidIp(): void
    {
        $this->assertNotEmpty(IPFuscator::getDecimal($this->ip));
    }

    /**
     * testCanBeUsedWithInvalidIp
     * @throws InvalidArgument
     */
    public function testCanBeUsedWithInvalidIp(): void
    {
        $this->expectException(InvalidArgument::class);
        IPFuscator::getDecimal('in.va.lid.ip');
    }

    /**
     * testCanBeValidDecimal
     * @throws InvalidArgument
     */
    public function testCanBeValidDecimal(): void
    {
        $this->assertEquals(
            '2130706433',
            IPFuscator::getDecimal($this->ip)
        );
    }

    /**
     * testCanBeValidHexadecimal
     * @throws InvalidArgument
     */
    public function testCanBeValidHexadecimal(): void
    {
        $this->assertEquals(
            '0x7f000001',
            IPFuscator::getHexadecimal($this->ip)
        );
    }

    /**
     * testCanBeValidOctal
     * @throws InvalidArgument
     */
    public function testCanBeValidOctal(): void
    {
        $this->assertEquals(
            '017700000001',
            IPFuscator::getOctal($this->ip)
        );
    }

    /**
     * testCanBeValidFullHex
     * @throws InvalidArgument
     */
    public function testCanBeValidFullHex(): void
    {
        $this->assertEquals(
            '0x7f.0x0.0x0.0x1',
            IPFuscator::getFullHex($this->ip)
        );
    }

    /**
     * testCanBeValidFullOct
     * @throws InvalidArgument
     */
    public function testCanBeValidFullOct(): void
    {
        $this->assertEquals(
            '0177.00.00.01',
            IPFuscator::getFullOct($this->ip)
        );
    }


    /**
     * testCanBeValidRandomHexPad
     * @throws InvalidArgument
     */
    public function testCanBeValidRandomHexPad(): void
    {
        $this->assertNotEmpty(IPFuscator::getRandomHexPad($this->ip));
    }

    /**
     * testCanBeValidRandomOctPad
     * @throws InvalidArgument
     */
    public function testCanBeValidRandomOctPad(): void
    {
        $this->assertNotEmpty(IPFuscator::getRandomOctPad($this->ip));
    }

    /**
     * testCanBeValidRandomBase
     * @throws InvalidArgument
     */
    public function testCanBeValidRandomBase(): void
    {
        $this->assertNotEmpty(IPFuscator::getRandomBase($this->ip));
    }

    /**
     * testCanBeValidRandomBaseWithPad
     * @throws InvalidArgument
     */
    public function testCanBeValidRandomBaseWithPad(): void
    {
        $this->assertNotEmpty(IPFuscator::getRandomBaseWithRandomPad($this->ip));
    }
}