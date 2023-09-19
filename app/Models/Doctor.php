<?php

namespace App\Models;

use App\Helpers\Enums\Disks;
use App\Traits\Upload;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Doctor extends Model
{
    use HasFactory, Translatable, Upload;
    public array $translatedAttributes = [
        'name',
        'appointments',
    ];

    public $fillable = [
        'name',
        'email',
        'password',
        'phone',
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

    /**
     * Get department related to doctor
     *
     * @return BelongsTo
     */
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }

    /**
     * Rid doctor whit associated image
     *
     * @param int|string $id identifier doctor
     * @return int return object from doctor deleted
     */
    public static function rid(int|string $id): int
    {
        $doctor = Doctor::find($id);
        if (isset($doctor->image)) {
            self::rubOut(Disks::BUI->value, $doctor->image);
        }

        return $doctor->delete();
    }
}
