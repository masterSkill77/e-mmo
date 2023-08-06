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
        $agences = $this->agenceService->getAll();
        return response()->json($agences);
    }

    public function store(CreateAgenceRequest $createAgenceRequest): JsonResponse
    {
        $userId = auth()->user()->id;
        $agence = $this->agenceService->createAgence($createAgenceRequest->toArray(), $userId);
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
    public function mine()
    {
        $userId = auth()->user()->id;
        $agences = $this->agenceService->getAgenceFromUser($userId);
        return response()->json($agences);
    }
}
