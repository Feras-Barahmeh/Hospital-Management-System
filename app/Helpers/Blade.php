<?php

namespace App\Helpers;

use Illuminate\Support\Facades\File;

class Blade
{
    /**
     * Generate an HTML image tag with optional CSS class and fallback avatar.
     *
     * This method generates an HTML <img> tag based on the provided object's image URL. If the image URL exists,
     * it will use that URL as the source for the image. If the URL does not exist, it will use a fallback
     * avatar image.
     *
     * @param object $object The object containing the image URL.
     * @param string $class  Optional CSS class to be applied to the <img> tag (default is 'table-img').
     *
     * @return string The HTML <img> tag with the specified class and image source.
     */
    public static function img(object $object, string $nameDefault='avatar.jpg', string $folder='uploads', string $class='table-img'): string
    {
        $src = asset("uploads/{$nameDefault}");
        if ($object->image &&File::exists(public_path("{$folder}/" .$object->image->url))) {
            $src = asset("{$folder}/" .$object->image->url);
        }

        return  '<img src='. $src .' class='.$class.' alt="avatar"/>';
    }
}
