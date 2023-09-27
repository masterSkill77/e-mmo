<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\PasswordMismatchException;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\LoginUserRequest;
use App\Models\User;
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
        $connected = null;
        if ($user) {
            if (!$this->userService->login($data->email, $data->password)) {
                throw new PasswordMismatchException();
            }
            $connected = $user;
        } else if ($agence) {
            if (!$this->agenceService->login($agence, $data->password)) {
                throw new PasswordMismatchException();
            }
            $connected = $agence;
        }
        $token = $connected->getAccessToken($connected->id, get_class($connected));
        $usertype = get_class($connected) == User::class ? 'user' : 'agence';

        return response()->json(['result' => $connected, 'token' => $token, 'connected_usertype' => $usertype]);
    }
}
