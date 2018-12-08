<?php
/**
 *
 * Part of the IPFuscator package.
 * Author: Kashyap Merai <kashyapk62@gmail.com>
 *
 */


namespace kamerk22\IPFuscator\Exception;


class InvalidArgument extends \Exception
{
    /**
     * invalidIp
     *
     * @param string $message
     *
     * @return InvalidArgument
     */
    public static function invalidIp(string $message): InvalidArgument
    {
        return new static($message);
    }
}