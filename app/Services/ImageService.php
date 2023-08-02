<?php

namespace App\Services;

use App\Models\Image;

class ImageService
{
    public function store(array $data)
    {
        return Image::create($data);
    }
}
