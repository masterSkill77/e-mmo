<?php

namespace App\Services;

use App\Http\Requests\Estate\CreateEstateRequest;
use App\Models\Estate;
use App\Models\Image;

class EstateService
{
    public function getEstate(int $estateId)
    {
        return Estate::with('agence', 'photos', 'reactions', 'commentaires')->where('id', $estateId)->first();
    }
    public function getAll()
    {
        return Estate::with('photos', 'agence', 'reactions', 'commentaires')->where('is_published', 1)->orderBy('created_at', 'desc')->get();
    }
    public function createEstate(array $data, $files)
    {
        $estate = Estate::create($data);

        if (is_array($files))
            foreach ($files as $file) {
                $this->mediaService->add($file, Image::ILLUSTRATION, Estate::class, $estate->id, $data['agence_id']);
            }
        else
            $this->mediaService->add($files, '', Estate::class, $estate->id, $data['agence_id']);
        return $estate;
    }
    public function destroy(Estate $estate)
    {
        return $estate->delete();
    }
    public function update(Estate $estate, CreateEstateRequest $createEstateRequest, $files)
    {
        if (is_array($files)) {
            foreach ($files as $file) {
                return $file->getClientOriginalName();
                $this->mediaService->update($file, Image::ILLUSTRATION, Estate::class, $estate->id, $createEstateRequest->agence_id);
            }
        } else
            $this->mediaService->update($files, '', Estate::class, $estate->id, $createEstateRequest->agence_id);
        return $estate->update($createEstateRequest->toArray());
    }
}
