<?php

namespace App\Services;

use App\Jobs\SendRequest;
use App\Models\Request;
use App\Models\Staff;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Crypt;

class StaffService
{
    public function __construct(private readonly UserService $userService, private readonly RoleService $roleService, private readonly AgenceService $agenceService)
    {
    }
    public function isAlreadyStaff(int $userId)
    {
        if (Staff::where("id", $userId)->first())
            return true;
        return false;
    }
    public function isPendingRequest(string $email)
    {
        if (Request::where("email", $email)->first())
            return true;
        return false;
    }
    public function addStaff(string $email, int $agenceId, int $roleId)
    {
        $user = $this->userService->findUser($email);
        if ($user) {
            if ((!$this->isAlreadyStaff($user->id) || !$this->isPendingRequest($user->email))) {
                $staff = new Staff([
                    'user_id' => $user->id,
                    'agence_id' => $agenceId,
                    'role_id' => $roleId
                ]);
                $staff->save();
            }
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
    public function accept($cryptedEmail)
    {
        $email = Crypt::decryptString($cryptedEmail);
        $request = Request::where("email", $email)->first();
        $user = $this->userService->findUser($email);
        $staff = new Staff([
            'user_id' => $user->id,
            'agence_id' => $request->agence_id,
            'role_id' => $request->role_id
        ]);
        $staff->save();
        $request->delete();
        return;
    }
}
