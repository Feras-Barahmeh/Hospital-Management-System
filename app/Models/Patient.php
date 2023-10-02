<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
        use HasFactory, Translatable;

        protected $fillable = [
                'email',
                'BOD',
                'phone_number',
                'sex',
                'blood_type',
        ];
        protected array $translatedAttributes = [
                'name_patient',
                'address',
        ];
}
