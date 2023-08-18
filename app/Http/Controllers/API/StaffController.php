<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Agence;
use App\Services\StaffService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function __construct(protected StaffService $staffService)
    {
    }
    public function addStaff(Request $request, Agence $agence)
    {
        $roleId = (int) $request->input('role_id');
        $email =  $request->input('email');

        $staff = $this->staffService->addStaff($email, $agence->id, $roleId);
        return response()->json($staff);
    }
    public function myStaff(int $agenceId): JsonResponse
    {
        $staff = $this->staffService->myStaff($agenceId);
        return response()->json($staff);
    }
}
