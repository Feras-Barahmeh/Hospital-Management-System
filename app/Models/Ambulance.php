<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ambulance extends Model
{
        use HasFactory, Translatable;

        protected $fillable = [
                'car_number',
                'year_made',
                'driver_license_number',
                'driver_phone',
                'is_available',
                'property',
        ];

        public array $translatedAttributes = [
                'car_model',
                'driver_name',
                'note',
        ];

}
