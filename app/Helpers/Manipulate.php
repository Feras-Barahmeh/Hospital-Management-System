<?php

namespace App\Helpers;

class Manipulate
{
    public static function format(string $str, $params): string
    {
        return sprintf($str, $params);
    }
}
