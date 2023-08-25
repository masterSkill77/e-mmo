<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;

class VerifyEmailController extends Controller
{
    public function __invoke(string $email)
    {
        $email = Crypt::decryptString($email);
        $userService = new UserService();
        $user = $userService->verifyEmail($email);
        return Redirect::to(env("CLIENT_APP_URL"));
    }
}
