<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function __construct(public UserService $userService)
    {
    }
    public function __invoke(CreateUserRequest $data)
    {
        $user = $this->userService->createUser($data->toArray());
        $token = $user->createToken(ENV('APP_KEY'));
        return response()->json(['user' => $user, 'token' => $token->plainTextToken]);
    }
}
