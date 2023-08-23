<?php

namespace App\Services;

use App\Models\Estate;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class MediaService
{

    public function add($file, $imageType, $typeOwner, $ownerId, $agenceId)
    {
        $originalName = $file->getClientOriginalName();
        $path = "/storage/$agenceId/$ownerId/$originalName";
        $realPath = "/public/$agenceId/$ownerId/$originalName";
        Storage::disk('local')->put($realPath, file_get_contents($file));

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

    public function update($file, $imageType, $typeOwner, $ownerId, $agenceId)
    {
        $images = Image::where("imageable_type", Estate::class)->get();
        foreach ($images as $image) {
            unlink($image->image_path);
        }
        return $this->add($file, $imageType, $typeOwner, $ownerId, $agenceId);
    }


    public function getImage(int $id)
    {
        return Image::where("id", $id)->first();
    }
}
