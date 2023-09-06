<?php

namespace App\Services;

use App\Models\Agence;
use App\Models\Image;
use App\Models\User;
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


            return DB::transaction(function () use ($data, $files, $userId) {
                $user = User::where('id', $userId)->first();
                $agence = Agence::create($data);
                foreach ($files as $file) {
                    $media = $this->mediaService->add($file, Image::LOGO, Agence::class, $agence->id, $agence->id);
                    $agence->agence_logo_id = $media->id;
                    $agence->update();
                }
                $user->user_type = 1;
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

    public function updateAgence(int $agenceId, array $data, $files = [])
    {

        return DB::transaction(function () use ($data, $files, $agenceId) {
            unset($data['files-0']);
            $media = "";
            if (count($files) > 0) {
                Image::where("image_type", Image::LOGO)->where("imageable_id", $agenceId)->delete();
                foreach ($files as $file) {
                    $media = $this->mediaService->add($file, Image::LOGO, Agence::class, $agenceId, $agenceId);
                }
                $data['agence_logo_id'] = $media->id;
            }
            $status = Agence::where('id', $agenceId)->update($data);
            return $status;
        });
    }

    public function getAgenceFromUser(int $userId)
    {
        return Agence::with('responsable', 'estates')->where('responsable_id', $userId)->get();
    }
}
