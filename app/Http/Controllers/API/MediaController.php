<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Agence;
use App\Models\Image;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function getLogo(int $imageId)
    {
        return response()->json(Image::where("imageable_id", $imageId)->where("imageable_type", Agence::class)->where('image_type', Image::LOGO)->first());
    }
    public function uploadImage(Request $request)
    {
        return ($request->file("files")->getClientOriginalName());
    }
}
