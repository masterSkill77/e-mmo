<?php

namespace App\Services;

use App\Models\Agence;
use App\Models\Image;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AgenceService
{
    public function __construct(protected MediaService $mediaService)
    {
    }

    public function login(Agence $agence, string $password)
    {
        return (Hash::check($password, $agence->password));
    }

    public function createAgence(array $data, $files)
    {

        return DB::transaction(function () use ($data, $files) {
            $data["password"] = Hash::make($data["password"]);
            $data["agence_logo"] = "logo";
            $agence = Agence::create($data);
            foreach ($files as  $index => $file) {
                if ($index == "files-0") {
                    $path = $this->mediaService->storeLogoImage($file, $agence->id);
                    $agence->agence_logo = $path;
                    $agence->update();
                } else {
                    $this->mediaService->add($file, Image::ILLUSTRATION, Agence::class, $agence->id, $agence->id);
                }
            }
            return $agence;
        });
    }

    public function getAll()
    {
        return Agence::orderBy('created_at', 'DESC')->where("active", 1)->get();
    }

    public function getAgence(int $agenceId)
    {
        return Agence::with('estates', 'estates.photos')->find($agenceId);
    }

    public function updateAgence(int $agenceId, array $data, $files = [])
    {

        return DB::transaction(function () use ($data, $files, $agenceId) {
            unset($data['files-0']);
            $media = "";
            if (count($files) > 0) {
                foreach ($files as $file) {
                    $media = $this->mediaService->storeLogoImage($file,  $agenceId);
                }
                $data['agence_logo'] = $media;
            }
            Agence::where('id', $agenceId)->update($data);
            return Agence::where("id", $agenceId)->get();
        });
    }

    public function getAgenceFromUser(int $userId)
    {
        return Agence::with('responsable', 'estates')->where('responsable_id', $userId)->get();
    }

    public function findAgence(string $email): Agence | null
    {
        return Agence::where('agence_mail', $email)->first();
    }
}
