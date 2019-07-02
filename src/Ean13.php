<?php

namespace Zeroplex;

class Ean13
{
    public static function isValidate(string $code)
    {
        if (!static::isAllNumber($code)) {
            return false;
        }
        if (!static::isLengthCorrect($code)) {
            return false;
        }

        $checksum = static::getCheckSum($code);
        return $checksum == substr($code, -1, 1);
    }

    public static function isAllNumber(string $code)
    {
        return 1 === preg_match('/^[0-9]+$/', $code);
    }

    public static function isLengthCorrect($code)
    {
        return (13 == strlen($code));
    }

    public static function getCheckSum($code)
    {
        $sum = 0;
        for ($i = 0; $i < 12; $i++) {
            if (0 == $i % 2) {
                $sum += $code[$i] * 1;
            } else {
                $sum += $code[$i] * 3;
            }
        }

        $dividend = ceil($sum / 10) * 10;

        return abs($dividend - $sum);
    }
}
