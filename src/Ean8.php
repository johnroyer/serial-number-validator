<?php

namespace Zeroplex;

class Ean8
{
    public static function isValidate(string $code)
    {
    }

    public static function isAllNumber($code)
    {
    }

    public static function isLengthCorrect(string $code)
    {
        return (8 == strlen($code));
    }

    public static function getCheckSum($code)
    {
    }
}
