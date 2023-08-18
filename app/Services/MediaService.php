<?php

namespace App\Services;

use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class MediaService
{
    public function add($file, $imageType, $typeOwner, $ownerId, $agenceId)
    {
        $originalName = $file->getClientOriginalName();
        $path = "/storage/$agenceId/$ownerId/$originalName";

        Storage::disk('local')->put($path, file_get_contents($file));

        $media = new Image([
            'image_type' => $imageType,
            'image_extension' => $file->getClientOriginalExtension(),
            'imageable_type' => $typeOwner,
            'imageable_id' => $ownerId,
            'image_path' => $path,
        ]);
        $media->save();
        return $media;
    }
    public function getImage(int $id)
    {
        return Image::where("id", $id)->first();
    }
}
