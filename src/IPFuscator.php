<?php
/**
 *
 * Part of the IPFuscator package.
 * Author: Kashyap Merai <kashyapk62@gmail.com>
 *
 */


namespace kamerk22\IPFuscator;


class IPFuscator
{

    public static function getDecimal(string $ip): string
    {
        $parts = Helper::getParts($ip);
        return (int)$parts[0] * 16777216 + (int)$parts[1] * 65536 + (int)$parts[2] * 256 + (int)$parts[3];
    }
}