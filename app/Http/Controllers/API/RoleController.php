<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Agence;
use App\Models\Role;
use App\Services\RoleService;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct(public RoleService $roleService)
    {
    }

    public function store(Request $request, Agence $agence)
    {
        $roleName = $request->input('role_name');
        $permission = $request->input('permission');
        $newRole = $this->roleService->registerRole($roleName, $permission, $agence->id);
        return response()->json($newRole);
    }
    public function roleForAgence(Request $request, Agence $agence)
    {
        $allROles = $this->roleService->getAllRoles($agence->id);
        return response()->json($allROles);
    }

    public function deleteRole(Agence $agence, Role $role)
    {
        $status = $this->roleService->removeRole($role->id);
        return response()->json($status);
    }
}
