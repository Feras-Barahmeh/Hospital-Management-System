<?php

namespace App\Helpers\Enums;

enum Privileges: string
{
    case USER = 'user';
    case ADMIN = 'admin';
}
