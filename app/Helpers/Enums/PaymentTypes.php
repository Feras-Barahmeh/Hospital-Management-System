<?php

namespace App\Helpers\Enums;

enum PaymentTypes: int
{
        case Later = 1;
        case Cash = 2;
}
