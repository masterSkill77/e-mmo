<?php

namespace App\Services;

use App\Exceptions\PasswordMismatchException;
use App\Models\Agence;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UserService
{
    public function createUser(array $data)
    {
        return User::create($data);
    }

    public function verifyEmail(string $email)
    {
        $user = $this->findUser($email);
        if (!$user) {
            throw new NotFoundHttpException();
        }
        $user->email_verified_at = now();
        $user->save();
        return $user;
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
    public function findUser(string $email): User | null
    {
        return User::where('email', $email)->first();
    }
}
