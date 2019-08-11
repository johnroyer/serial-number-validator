<?php

namespace Zeroplex;

class TaiwanID
{
    public $geoMapping = [
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
    }

    public static function islengthValid(string $code)
    {
        if (10 == strlen($code)) {
            return true;
        }
        return false;
    }

    public static isMale(string $code)
    {
        if ('1' == $code[1]) {
            return true;
        }
        return false;
    }

    public static isGeoValid(string $code)
    {
        $char = strtoupper($code[0]);

        return array_key_exists($char, $this->geoMapping);
    }

    public static getCheckSum(string $code)
    {
        $sum = $this->geoMapping[$code[0]];

        for ($i = 0; $i < 9; $i++) {
            $sum += intval($code[$i + 1]) * (9 - $i);
        }

        return $sum % 10;
    }
}
