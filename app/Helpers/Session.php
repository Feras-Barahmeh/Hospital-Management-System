<?php

namespace App\Helpers;

class Session
{
    public static function flashArray(string $key, array $content): void
    {
        session()->flash('myArray', $content);
        session()->flash($key, session('myArray'));
    }
}
