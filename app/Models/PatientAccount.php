<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientAccount extends Model
{
        use HasFactory;

        public $timestamps = false;
        protected $fillable = [
                'date',
                'patient_id',
                'credit',
                'debit',
        ];
}
