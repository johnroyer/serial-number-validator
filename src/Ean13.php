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
}
