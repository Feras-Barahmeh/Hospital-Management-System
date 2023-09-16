<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Doctor extends Model
{
    use HasFactory, Translatable;
    public array $translatedAttributes = [
        'name',
        'appointments',
    ];

    public $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'price',
        'appointments',
        'email_verified_at',
        'department_id',
    ];

    /**
     * Get the user's image.
     */
    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
