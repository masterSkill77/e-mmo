<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Agence;
use App\Services\StaffService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

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
        return response()->json($staff, Response::HTTP_CREATED);
    }
    public function myStaff(int $agenceId): JsonResponse
    {
        $staff = $this->staffService->myStaff($agenceId);
        return response()->json($staff);
    }
    public function removeStaff(Agence $agence, int $staffId, string $type)
    {
        $status = $this->staffService->removeStaff($staffId, $type);
        return response()->json($status);
    }
    public function accept(Agence $agence, string $encryptedEmail)
    {
        $staff = $this->staffService->accept($encryptedEmail);
        return response()->redirectTo(env("CLIENT_APP_URL"));
    }
}
