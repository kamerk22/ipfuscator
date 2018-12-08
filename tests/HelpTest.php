<?php
/**
 *
 * Part of the IPFuscator package.
 * Author: Kashyap Merai <kashyapk62@gmail.com>
 *
 */


namespace kamerk22\IPFuscator\Tests;


use kamerk22\IPFuscator\Helper\Helper;
use PHPUnit\Framework\TestCase;

class HelpTest extends TestCase
{
    public $ip = '127.0.0.1';

    public function testCanBeUsedWithParts(): void
    {
        $parts = Helper::getParts($this->ip);
        $this->assertEquals('127', $parts[0]);
        $this->assertEquals('0', $parts[1]);
        $this->assertEquals('1', $parts[3]);
    }

    public function testCanBeUsedWithHexParts(): void
    {
        $parts = Helper::getHexParts($this->ip);
        $this->assertEquals('0x7f', $parts[0]);
        $this->assertEquals('0x0', $parts[1]);
        $this->assertEquals('0x1', $parts[3]);
    }

    public function testCanBeUsedWithOctParts(): void
    {
        $parts = Helper::getOctalParts($this->ip);
        $this->assertEquals('0177', $parts[0]);
        $this->assertEquals('00', $parts[1]);
        $this->assertEquals('01', $parts[3]);
    }
}