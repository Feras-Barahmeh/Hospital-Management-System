<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AmbulanceTranslation extends Model
{
        use HasFactory;

        protected $fillable = [
                'car_model',
                'driver_name',
                'note',
        ];
        public $timestamps = false;
}
