<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Agence\CreateAgenceRequest;
use App\Models\Agence;
use App\Services\AgenceService;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AgenceController extends Controller
{
    public function __construct(public AgenceService $agenceService)
    {
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
}
