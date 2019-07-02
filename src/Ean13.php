<?php

namespace Zeroplex;

class Ean13
{
    public static function validate(string $code)
    {
    }

    public static function isAllNumber(string $code)
    {
        return 1 === preg_match('/^[0-9]+$/', $code);
    }

    public static function isLengthCorrect($code)
    {
        return (13 == strlen($code));
    }

    private static function getCheckSum($code)
    {
        $sum = 0;
        for ($i = 0; $i < 13; $i++) {
            if (0 == $i % 2) {
                $sum += $code[$i] * 1;
            } else {
                $sum += $code[$i] * 3;
            }
        }
    }
}
