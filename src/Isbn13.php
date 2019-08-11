<?php

namespace Zeroplex;

class Isbn13
{
    public static function isValid(string $code)
    {
        if (!static::is978Exist($code)) {
            return false;
        }
        if (!static::isLengthCorrect($code)) {
            return false;
        }
        if (!static::isAllNumber($code)) {
            return false;
        }
        if ($code[12] != static::getCheckSum($code)) {
            return false;
        }
        return true;
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
