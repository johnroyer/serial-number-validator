<?php

namespace Zeroplex;

class TaiwanId
{
    public static $geoMapping = [
        'A' => 10,
        'B' => 11,
        'C' => 12,
        'D' => 13,
        'E' => 14,
        'F' => 15,
        'G' => 16,
        'H' => 17,
        'I' => 34,
        'J' => 18,
        'K' => 19,
        'L' => 20,
        'M' => 21,
        'N' => 22,
        'O' => 35,
        'P' => 23,
        'Q' => 24,
        'R' => 25,
        'S' => 26,
        'T' => 27,
        'U' => 28,
        'V' => 29,
        'W' => 32,
        'X' => 30,
        'Y' => 31,
        'Z' => 33,
    ];

    public function isValid(string $code)
    {
        if (!static::islengthValid($code)) {
            var_dump(__LINE__);
            return false;
        }

        if (!static::isGeoValid($code)) {
            var_dump(__LINE__);
            return false;
        }

        if ($code[9] != static::getCheckSum($code)) {
            return false;
        }
        return true;
    }

    public static function islengthValid(string $code)
    {
        if (10 == strlen($code)) {
            return true;
        }
        return false;
    }

    public static function isMale(string $code)
    {
        if ('1' == $code[1]) {
            return true;
        }
        return false;
    }

    public static function isGeoValid(string $code)
    {
        $char = strtoupper($code[0]);

        return array_key_exists($char, static::$geoMapping);
    }

    public static function getCheckSum(string $code)
    {
        $prefix = strval(static::$geoMapping[$code[0]]);
        $sum = $prefix[0] + $prefix[1] * 9;

        for ($i = 0; $i < 8; $i++) {

            $sum += intval($code[$i + 1]) * (8 - $i);
        }

        if (10 == 10 - ($sum % 10)) {
            return 0;
        }
        return 10 - ($sum % 10);
    }
}
