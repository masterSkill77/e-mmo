<?php

namespace App\Services;

use App\Models\Agence;
use App\Models\Role;

class RoleService
{
    public function getAllRoles(int $agenceId)
    {
        return Role::agence($agenceId)->get();
    }
    public function registerRole(string $role_name, string $permission, int $agenceId)
    {
        $newRole = new Role([
            'role_name' => $role_name,
            'permission' => $permission,
            'agence_id' => $agenceId
        ]);
        $newRole->save();
        return $newRole;
    }

    public function removeRole(int $roleId): bool
    {
        return Role::where("id", $roleId)->delete();
    }
}
