<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{
        use HasFactory, Translatable;

        protected $fillable = [
                'type',
        ];
        public array $translatedAttributes = ['type'];
}
