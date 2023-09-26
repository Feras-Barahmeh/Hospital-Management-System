<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Package extends Model
{
      use HasFactory, Translatable;

      public array $translatedAttributes = ['package_name', 'description'];

      public $fillable = [
            'total_before_discount',
            'total_after_discount',
            'discount_amount',
            'tax',
            'out_the_door_price'
      ];

      public function package(): BelongsToMany
      {
            return $this->belongsToMany(Assistant::class);
      }
}
