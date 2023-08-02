<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Agence\CreateAgenceRequest;
use App\Http\Requests\Agence\UpdateAgenceRequest;
use App\Models\Agence;
use App\Services\AgenceService;
use App\Services\ImageService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AgenceController extends Controller
{
    public function __construct(public AgenceService $agenceService, public ImageService $imageService)
    {
    }
    public function all(): JsonResponse
    {
        $photos = [
            'image_path' => 'test',
            'image_extension' => 'test',
            'image_type' => 'test',
            'imageable_type' => Agence::class,
            'imageable_id' => 2,
        ];
        $photos = $this->imageService->store($photos);
        // $agences = $this->agenceService->getAll();
        return response()->json($photos);
    }

    public function store(CreateAgenceRequest $createAgenceRequest): JsonResponse
    {
        $agence = $this->agenceService->createAgence($createAgenceRequest->toArray());
        return response()->json($agence);
    }
    public function find(int $agenceId): JsonResponse
    {
        $agence = $this->agenceService->getAgence($agenceId);
        if (!$agence)
            throw new NotFoundHttpException();
        return response()->json($agence);
    }
    public function update(int $agenceId, UpdateAgenceRequest $updateAgenceRequest): JsonResponse
    {
        $agence = $this->agenceService->getAgence($agenceId);
        if (!$agence)
            throw new NotFoundHttpException();
        $status = $this->agenceService->updateAgence($agenceId, $updateAgenceRequest->toArray());
        return response()->json($status);
    }
}
