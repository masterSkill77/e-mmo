<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(public UserService $userService)
    {
    }
    public function __invoke(LoginUserRequest $data)
    {
        $user = $this->userService->login($data->email, $data->password);
        // $token = $user->createToken(ENV('APP_KEY'));
        return response()->json(['user' => $user,/*'token' => $token->plainTextToken*/]);
    }
}
