<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assistant extends Model
{
    use HasFactory, Translatable;
    protected $fillable = [
        'name',
        'price',
        'note',
        'status',
    ];
    public array $translatedAttributes = ['name', 'note'];

}
