<?php

namespace App\Services;

use App\Models\Staff;

class StaffService
{
    public function addStaff(int $userId, int $agenceId, int $roleId)
    {
        $staff = new Staff([
            'user_id' => $userId,
            'agence_id' => $agenceId,
            'role_id' => $roleId
        ]);
        $staff->save();
        return $staff;
    }
}
