<?php

namespace App\Services;

use App\Exceptions\PasswordMismatchException;
use App\Models\Agence;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public function createUser(array $data)
    {
        return User::create($data);
    }

    public function login(string $email, string $password)
    {
        $user = $this->findUser($email);
        if (!$user) {
            throw new ModelNotFoundException('User with email : ' . $email . " not found");
        }
        if (!Hash::check($password, $user->password))
            throw new PasswordMismatchException();
        return $user;
    }
    private function findUser(string $email): User | null
    {
        return User::where('email', $email)->first();
    }
}
