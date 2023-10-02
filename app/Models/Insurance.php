<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
        use HasFactory, Translatable;

        public array $translatedAttributes = [
                'company_name',
                'note',
        ];

        protected $fillable = [
                'company_code',
                'patient_discount_rate',
                'company_rate',
                'status',
        ];

}
