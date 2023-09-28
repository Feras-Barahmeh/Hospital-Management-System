<?php

namespace App\TraitsLivewire;

use App\Helpers\Manipulate;
use App\Livewire\CreatePackage;

trait Packages
{
        protected  const DIR = 'dashboard/packages.';
        public static function msg($name, $param=null): string
        {
                $mes = self::DIR . $name;
                $mes = __($mes);
                return  Manipulate::format($mes, $param);
        }

}
