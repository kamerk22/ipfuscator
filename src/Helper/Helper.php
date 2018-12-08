<?php
/**
 *
 * Part of the IPFuscator package.
 * Author: Kashyap Merai <kashyapk62@gmail.com>
 *
 */


namespace kamerk22\IPFuscator\Helper;


use kamerk22\IPFuscator\Exception\InvalidArgument;

class Helper
{

    /**
     * getParts
     *
     * @param string $ip
     *
     * @return array
     * @throws InvalidArgument
     */
    public static function getParts(string $ip): array
    {
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
            return explode('.', $ip);
        }
        throw InvalidArgument::invalidIp('IP Adress format is invalid.');

    }

    /**
     * getHexParts
     *
     * @param string $ip
     *
     * @return array
     * @throws InvalidArgument
     */
    public static function getHexParts(string $ip): array
    {
        $hexParts = [];
        foreach (self::getParts($ip) as $part) {
            $hexParts[] = '0x' . dechex((int)$part);
        }
        return $hexParts;
    }

    /**
     * getOctalParts
     *
     * @param string $ip
     *
     * @return array
     * @throws InvalidArgument
     */
    public static function getOctalParts(string $ip): array
    {
        $octParts = [];
        foreach (self::getParts($ip) as $part) {
            $octParts[] = '0' . decoct((int)$part);
        }
        return $octParts;
    }
}