<?php

namespace App\Services;

use App\Jobs\SendRequest;
use App\Models\Request;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Collection;

class StaffService
{
    public function __construct(private readonly UserService $userService, private readonly RoleService $roleService, private readonly AgenceService $agenceService)
    {
    }
    public function addStaff(string $email, int $agenceId, int $roleId)
    {
        $user = $this->userService->findUser($email);
        if ($user) {
            $staff = new Staff([
                'user_id' => $user->id,
                'agence_id' => $agenceId,
                'role_id' => $roleId
            ]);
            $staff->save();
        } else {
            $staff = [];
            $role = $this->roleService->getRole($roleId);
            $agence = $this->agenceService->getAgence($agenceId);
            dispatch(new SendRequest($email, $role, $agence));
        }
        return $staff;
    }

    public function myStaff(int $agenceId): array
    {
        $staff = [
            'current_staff' => Staff::with(['user', 'role'])->where("agence_id", $agenceId)->get(),
            'pending_staff' => Request::with(['role'])->where("agence_id", $agenceId)->get()
        ];
        return $staff;
    }

    public function removeStaff(int $staffId, string $type)
    {
        if ($type == Staff::PENDING) {
            $status = Request::where("id", $staffId)->delete();
        } else {
            $status = Staff::where("id", $staffId)->delete();
        }
        return $status;
    }
}
