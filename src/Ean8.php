<?php

namespace Zeroplex;

class Ean8
{
    public static function isValid(string $code)
    {
    }

    public static function isAllNumber($code)
    {
        return 1 === preg_match('/^[0-9]+$/', $code);
    }

    public static function isLengthCorrect(string $code)
    {
        return (8 == strlen($code));
    }

    public static function getCheckSum($code)
    {
        $count = [
            0, // odd
            0, // even
        ];

        for ($i = 6; $i >= 0; $i--) {
            $count[$i % 2] += $code[$i];
        }

        $tmp = 3 * $count[0] + $count[1];
        return (10 - ($tmp % 10)) % 10;
    }
}
