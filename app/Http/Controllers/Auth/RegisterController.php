<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CreateUserRequest;
use App\Services\AgenceService;
use App\Services\UserService;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RegisterController extends Controller
{
    public function __construct(public UserService $userService, public AgenceService $agenceService)
    {
    }
    public function __invoke(CreateUserRequest $data)
    {
        $agence = $this->agenceService->findAgence($data->email);
        if ($agence)
            throw new HttpResponseException(response()->json("Email can not be used in both agence and user", Response::HTTP_BAD_REQUEST));

        $user = $this->userService->createUser($data->toArray());
        $token = $user->createToken(ENV('APP_KEY'));

        $user->createAccess($token->plainTextToken);

        return response()->json(['user' => $user, 'token' => $token->plainTextToken]);
    }
}
