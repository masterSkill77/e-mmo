<?php

namespace App\Services;

use App\Http\Requests\Estate\CreateEstateRequest;
use App\Models\Estate;
use App\Models\Image;

class EstateService
{
    public function __construct(protected readonly MediaService $mediaService)
    {
    }
    public function getEstate(int $estateId)
    {
        return Estate::with('agence', 'photos')->where('id', $estateId)->get();
    }

    public function getAll()
    {
        return Estate::with('photos')->get();
    }

    public function estateForAgence(int $agenceId)
    {
        return Estate::where('agence_id', $agenceId)->with('agence', 'photos')->paginate(20);
    }
    public function all()
    {
        return Estate::with('photos', 'agence')->get();
    }
    public function find(int $estateId)
    {
        return Estate::where('id', $estateId)->with('agence', 'photos')->first();
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
