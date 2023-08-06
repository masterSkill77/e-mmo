<?php

namespace App\Trait;

use App\Models\Access;
use Illuminate\Support\Facades\DB;

trait OneTimeToken
{
    //This is used to return one time token for each connection, to garantee that there will be one token, not multiple token
    public function getAccessToken(int $userId): string
    {
        $access = Access::where('user_id', $userId)->first();
        if ($access)
            return $access->access_token;
        else {
            $token = $this->createToken(ENV('APP_KEY'));
            $access = $this->createAccess($token->plainTextToken);
            return $access->access_token;
        }
    }
    public function createAccess(string $access_token)
    {
        $newAccess = new Access([
            'access_token' => $access_token,
            'user_id' => $this->id
        ]);
        $newAccess->save();
        return $newAccess;
    }
}
