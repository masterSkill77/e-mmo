<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Estate\CreateEstateRequest;
use App\Models\Estate;
use App\Services\EstateService;

class EstateController extends Controller
{
    public function __construct(public EstateService $estateService)
    {
    }
    public function store(CreateEstateRequest $createEstateRequest)
    {
        $estate = $this->estateService->createEstate($createEstateRequest->toArray());
        return response()->json($estate);
    }

    public function all()
    {
        $estate = $this->estateService->getAll();
        return response()->json($estate);
    }

    public function find(Estate $estate)
    {
        return $estate;
    }
}
