<?php
/**
 *
 * Part of the IPFuscator package.
 * Author: Kashyap Merai <kashyapk62@gmail.com>
 *
 */


namespace kamerk22\IPFuscator;


use kamerk22\IPFuscator\Exception\InvalidArgument;
use kamerk22\IPFuscator\Helper\Helper;

class IPFuscator
{

    /**
     * getDecimal
     *
     * @param string $ip
     *
     * @return string
     * @throws InvalidArgument
     */
    public static function getDecimal($ip): string
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
     * @throws InvalidArgument
     */
    public static function getHexadecimal(string $ip): string
    {
        return '0x' . dechex((int)self::getDecimal($ip));
    }

    /**
     * getOctal
     *
     * @param string $ip
     *
     * @return string
     * @throws InvalidArgument
     */
    public static function getOctal(string $ip): string
    {
        return '0' . decoct((int)self::getDecimal($ip));
    }

    /**
     * getFullHex
     *
     * @param string $ip
     *
     * @return string
     * @throws InvalidArgument
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
     * @throws InvalidArgument
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
     * @throws InvalidArgument
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
     * @throws InvalidArgument
     */
    public static function getRandomOctalPad(string $ip): string
    {
        $randOctal = '';
        foreach (Helper::getOctalParts($ip) as $parts) {
            $randOctal .= str_pad('0', random_int(1, 30), '0') . $parts . '.';
        }
        return rtrim($randOctal, '.');
    }

    /**
     * getRandomBase
     *
     * @param string $ip
     *
     * @return string
     * @throws \Exception
     * @throws InvalidArgument
     */
    public static function getRandomBase(string $ip): string
    {
        $parts = Helper::getParts($ip);
        $Octparts = Helper::getOctalParts($ip);
        $Hexparts = Helper::getHexParts($ip);
        $randomBase = '';
        for ($i = 0; $i < 4; $i++) {
            if ($i === 0) {
                $randomBase .= $parts[random_int(0,3)]. '.';
            } elseif ($i === 1) {
                $randomBase .= $Hexparts[random_int(0,3)]. '.';
            } else {
                $randomBase .= $Octparts[random_int(0,3)]. '.';

            }
        }
        return rtrim($randomBase, '.');
    }


    /**
     * getRandomBaseWithPad
     *
     * @param string $ip
     *
     * @return string
     * @throws \Exception
     * @throws InvalidArgument
     */
    public static function getRandomBaseWithPad(string $ip): string
    {
        $parts = Helper::getParts($ip);
        $Octparts = Helper::getOctalParts($ip);
        $Hexparts = Helper::getHexParts($ip);
        $randomBasePad = '';
        for ($i = 0; $i < 4; $i++) {
            if ($i === 0) {
                $randomBasePad .= $parts[random_int(0,3)]. '.';
            } elseif ($i === 1) {
                $randomBasePad .= str_replace('0x', str_pad('0x0', random_int(1, 30), '0'), $Hexparts[random_int(0,3)]) . '.';
            } else {
                $randomBasePad .= str_pad('0', random_int(1, 30), '0') . $Octparts[random_int(0,3)]. '.';

            }
        }
        return rtrim($randomBasePad, '.');
    }

}