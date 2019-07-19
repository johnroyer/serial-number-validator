<?php

namespace Zeroplex;

class Ean8
{
    public static function isValidate(string $code)
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
    }
}
