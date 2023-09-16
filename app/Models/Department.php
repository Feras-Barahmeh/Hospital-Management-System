<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $fillable =[
        'name'
    ];

    public array $translatedAttributes = [
        'name'
    ];
}
