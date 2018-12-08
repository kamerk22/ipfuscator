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

    /**
     * getDecimal
     *
     * @param string $ip
     *
     * @return string
     */
    public static function getDecimal(string $ip): string
    {
        $parts = Helper::getParts($ip);
        return (int)$parts[0] * (2 ** 24) + (int)$parts[1] * (2 ** 16) + (int)$parts[2] * (2 ** 8) + (int)$parts[3];
    }

    /**
     * getHexadecimal
     *
     * @param string $ip
     *
     * @return string
     */
    public static function getHexadecimal(string $ip): string
    {
        return '0x' . dechex(self::getDecimal($ip));
    }

    /**
     * getOctal
     *
     * @param string $ip
     *
     * @return string
     */
    public static function getOctal(string $ip): string
    {
        return '0' . decoct(self::getDecimal($ip));
    }

    /**
     * getFullHex
     *
     * @param string $ip
     *
     * @return string
     */
    public static function getFullHex(string $ip): string
    {
        return implode('.', Helper::getHexParts($ip));
    }

    /**
     * getFullOct
     *
     * @param string $ip
     *
     * @return string
     */
    public static function getFullOct(string $ip): string
    {
        return implode('.', Helper::getOctalParts($ip));
    }

    /**
     * getRandomHexPad
     *
     * @param string $ip
     *
     * @return string
     * @throws \Exception
     */
    public static function getRandomHexPad(string $ip): string
    {
        $randHex = '';
        foreach (Helper::getHexParts($ip) as $parts) {
            $randHex .= str_replace('0x', str_pad('0x0', random_int(1, 30), '0'), $parts) . '.';
        }
        return rtrim($randHex, '.');
    }

    /**
     * getRandomOctalPad
     *
     * @param string $ip
     *
     * @return string
     * @throws \Exception
     */
    public static function getRandomOctalPad(string $ip): string
    {
        $randOctal = '';
        foreach (Helper::getHexParts($ip) as $parts) {
            $randOctal .= str_pad('0', random_int(1, 30), '0') . $parts . '.';
        }
        return rtrim($randOctal, '.');
    }


}