<?php

namespace Zeroplex;

class Isbn13
{
    public static function isValidate(string $code)
    {
    }

    public static function is978Exist(string $code)
    {
        return 1 === preg_match('/^978/', $code);
    }

    public static function isAllNumber(string $code)
    {
        return 1 === preg_match('/^[0-9]+$/', $code);
    }

    public static function isLengthCorrect($code)
    {
        return 13 == strlen($code);
    }

    public static function getCheckSum($code)
    {
        $sum = 0;

        $i = 0;
        for ($i == 0; $i < 12; $i++) {
            $number = $code[$i];

            if (0 == $i % 2) {
                $sum += $number;
            } else {
                $sum += $number * 3;
            }
        }

        $dividend = \ceil($sum / 10) * 10;
        return abs($dividend - $sum);
    }
}
