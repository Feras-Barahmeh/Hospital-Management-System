<?php

namespace App\Traits;

use App\Models\Image;

trait ImageOperation
{
    public static function inviteAssociatedRecord($url, $imageableID, $imageableType): void
    {
        /*** @var object $img  by default contain object Image Model */

        $img = $img ?? new Image();
        $img->url = $url;
        $img->imageable_id = $imageableID;
        $img->imageable_type = $imageableType;
        $img->save();
    }

    public static function kickOutAssociatedRecord($id): int
    {
        return Image::destroy($id);
    }
}
