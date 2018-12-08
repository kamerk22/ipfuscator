<?php
/**
 *
 * Part of the IPFuscator package.
 * Author: Kashyap Merai <kashyapk62@gmail.com>
 *
 */


namespace kamerk22\IPFuscator;


class Helper
{
    public static function getParts(string $ip): array
    {
        return explode('.', $ip);
    }

    public static function getHexParts(string $ip): array
    {
        $hexParts = [];
        foreach (self::getParts($ip) as $part) {
            $hexParts[] = '0x' . dechex((int)$part);
        }
        return $hexParts;
    }

    public static function getOctalParts(string $ip): array
    {
        $octParts = [];
        foreach (self::getParts($ip) as $part) {
            $hexParts[] = '0' . decoct((int)$part);
        }
        return $octParts;
    }
}