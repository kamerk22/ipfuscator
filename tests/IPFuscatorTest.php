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

    public function testCanBeUsedWithValidIp(): void
    {
        $this->assertNotEmpty(IPFuscator::getDecimal($this->ip));
    }

    public function testCanBeUsedWithInvalidIp(): void
    {
        $this->expectException(InvalidArgument::class);
        IPFuscator::getDecimal('in.va.lid.ip');
    }

    public function testCanBeValidDecimal(): void
    {
        $this->assertEquals(
            '2130706433',
            IPFuscator::getDecimal($this->ip)
        );
    }

    public function testCanBeValidHexadecimal(): void
    {
        $this->assertEquals(
            '0x7f000001',
            IPFuscator::getHexadecimal($this->ip)
        );
    }

    public function testCanBeValidOctal(): void
    {
        $this->assertEquals(
            '017700000001',
            IPFuscator::getOctal($this->ip)
        );
    }

    public function testCanBeValidFullHex(): void
    {
        $this->assertEquals(
            '0x7f.0x0.0x0.0x1',
            IPFuscator::getFullHex($this->ip)
        );
    }

    public function testCanBeValidFullOct(): void
    {
        $this->assertEquals(
            '0177.00.00.01',
            IPFuscator::getFullOct($this->ip)
        );
    }

    public function testCanBeValidRandomHexPad(): void
    {
        try {
            $this->assertNotEmpty(IPFuscator::getRandomHexPad($this->ip));
        } catch (InvalidArgument $e) {
        } catch (Exception $e) {
        }
    }

    public function testCanBeValidRandomOctPad(): void
    {
        try {
            $this->assertNotEmpty(IPFuscator::getRandomOctPad($this->ip));
        } catch (InvalidArgument $e) {
        } catch (Exception $e) {
        }
    }

    public function testCanBeValidRandomBase(): void
    {
        try {
            $this->assertNotEmpty(IPFuscator::getRandomBase($this->ip));
        } catch (InvalidArgument $e) {
        } catch (Exception $e) {
        }
    }

    public function testCanBeValidRandomBaseWithPad(): void
    {
        try {
            $this->assertNotEmpty(IPFuscator::getRandomBaseWithRandomPad($this->ip));
        } catch (InvalidArgument $e) {
        } catch (Exception $e) {
        }
    }
}