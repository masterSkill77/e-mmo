<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Agence;
use App\Services\StaffService;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function __construct(protected StaffService $staffService)
    {
    }
    public function addStaff(Request $request, Agence $agence)
    {
        $roleId = (int) $request->input('role_id');
        $userId = (int) $request->input('user_id');

        $staff = $this->staffService->addStaff($userId, $agence->id, $roleId);
        return response()->json($staff);
    }
}
