<?php

namespace App\Models;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Department extends Model implements TranslatableContract
{
    use HasFactory, Translatable;

    protected $fillable =[
        'name',
        'description',
    ];

    public array $translatedAttributes = [
        'name',
        'description',
    ];

    /**
     * Get doctors in this department
     *
     * @return HasOne
     */
    public function doctors(): HasMany
    {
        return $this->hasMany(Doctor::class);
    }
}
