<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Agence\CreateAgenceRequest;
use App\Http\Requests\Agence\UpdateAgenceRequest;
use App\Models\Agence;
use App\Services\AgenceService;
use App\Services\ImageService;
use App\Services\UserService;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AgenceController extends Controller
{
    public function __construct(public AgenceService $agenceService, public ImageService $imageService, public UserService $userService)
    {
    }
    public function all(): JsonResponse
    {
        $agences = $this->agenceService->getAll();
        return response()->json($agences);
    }

    public function store(CreateAgenceRequest $createAgenceRequest)
    {
        $user = $this->userService->findUser($createAgenceRequest->agence_email);

        if ($user)
            throw new HttpResponseException(response()->json("Email can not be used in both agence and user", Response::HTTP_BAD_REQUEST));

        $agence = $this->agenceService->createAgence($createAgenceRequest->toArray(), $createAgenceRequest->allFiles());
        return response()->json($agence, Response::HTTP_CREATED);
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
        $status = $this->agenceService->updateAgence($agenceId, $updateAgenceRequest->toArray(), $updateAgenceRequest->allFiles());
        return response()->json($status);
    }
    public function mine()
    {
        $userId = auth()->user()->id;
        $agences = $this->agenceService->getAgenceFromUser($userId);
        return response()->json($agences);
    }
}
