<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Estate\CreateEstateRequest;
use App\Models\Estate;
use App\Services\EstateService;
use Symfony\Component\HttpFoundation\Response;

class EstateController extends Controller
{
    public function __construct(public EstateService $estateService)
    {
    }
    public function store(CreateEstateRequest $createEstateRequest)
    {
        $estate = $this->estateService->createEstate($createEstateRequest->toArray(), $createEstateRequest->allFiles());
        return response()->json($estate, Response::HTTP_CREATED);
    }

    public function all()
    {
        $estate = $this->estateService->getAll();
        return response()->json($estate);
    }
    public function mine(int $agenceId)
    {
        $estates = $this->estateService->estateForAgence($agenceId);
        return $estates;

        return response()->json($estates);
    }
    public function find(int $agenceId, Estate $estate)
    {
        $estate = $this->estateService->find($estate->id);
        return response()->json($estate);
    }
    public function destroy(int $agenceId, Estate $estate)
    {
        $deleted = $this->estateService->destroy($estate);
        return response()->json($deleted);
    }
    public function update(int $agenceId, Estate $estate, CreateEstateRequest $createEstateRequest)
    {
        $updated = $this->estateService->update($estate, $createEstateRequest, $createEstateRequest->allFiles());
        return response()->json($updated);
    }
}
