<?php

namespace App\Services;

use App\Models\Agence;
use App\Models\Image;
use Exception;
use Illuminate\Support\Facades\DB;

class AgenceService
{
    public function __construct(protected MediaService $mediaService)
    {
    }
    public function createAgence(array $data, int $userId, $files)
    {
        if (count($this->getAgenceFromUser($userId)) == 0) {
            $data['responsable_id'] = $userId;


            return DB::transaction(function () use ($data, $files) {

                $agence = Agence::create($data);
                foreach ($files as $file) {
                    $media = $this->mediaService->add($file, Image::LOGO, Agence::class, $agence->id, $agence->id);
                    $agence->agence_logo_id = $media->id;
                    $agence->update();
                }
                return $agence;
            });
        } else {
            throw new Exception('User can not create multiple agence');
        }
    }

    public function getAll()
    {
        return Agence::orderBy('agence_name')->get();
    }

    public function getAgence(int $agenceId)
    {
        return Agence::with('responsable', 'estates')->find($agenceId);
    }

    public function updateAgence(int $agenceId, array $data)
    {
        $status = Agence::where('id', $agenceId)->update($data);
        return $status;
    }

    public function getAgenceFromUser(int $userId)
    {
        return Agence::with('responsable', 'estates')->where('responsable_id', $userId)->get();
    }
}
