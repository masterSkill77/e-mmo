<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Estate\CreateEstateRequest;
use App\Services\EstateService;
use Illuminate\Http\Request;

class EstateController extends Controller
{
    public function __construct(public EstateService $estateService)
    {
    }
    public function store(CreateEstateRequest $createEstateRequest) {
        
    }
}
