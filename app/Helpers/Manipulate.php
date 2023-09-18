<?php

namespace App\Helpers;

class Manipulate
{
    /**
     * Format a string using variable substitution.
     *
     * This method takes a format string and an array of parameters and uses
     * vsprintf to replace placeholders in the format string with the provided
     * parameters.
     *
     * @param string $str The format string containing placeholders.
     * @param array  $params An associative array of parameters to replace placeholders.
     * @return string The formatted string with placeholders replaced.
     */
    public static function format(string $str, array $params): string
    {
        return vsprintf($str, $params);
    }
}
