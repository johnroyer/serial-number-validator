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
    }
}
