<?php

namespace App\Helpers\Enums;

enum Disks:string
{
    case Local = 'local';
    case Public = 'public';
    case BUI = 'back_upload_img';
    case S3 = 's3';
}
