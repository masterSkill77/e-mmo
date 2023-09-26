<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginUserRequest;
use App\Services\AgenceService;
use App\Services\UserService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct(public UserService $userService, public AgenceService $agenceService)
    {
    }
    public function __invoke(LoginUserRequest $data)
    {
        $user = $this->userService->findUser($data->email);
        $agence = $this->agenceService->findAgence($data->email);
        if (!$user && !$agence) {
            throw new ModelNotFoundException('User with email : ' . $data->email . " not found");
        }
        $user = $this->userService->login($data->email, $data->password);
        $token = $user->getAccessToken($user->id);
        return response()->json(['user' => $user, 'token' => $token]);
    }
}
