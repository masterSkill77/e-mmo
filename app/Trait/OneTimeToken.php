<?php

namespace App\Trait;

use App\Models\Access;
use Illuminate\Support\Facades\DB;

trait OneTimeToken
{
    //This is used to return one time token for each connection, to garantee that there will be one token, not multiple token
    public function getAccessToken(int $ownerId, string $type): string
    {
        $access = Access::where('token_owner_id', $ownerId)->where("type", $type)->first();
        if ($access)
            return $access->access_token;
        else {
            $token = $this->createToken(ENV('APP_KEY'));
            $access = $this->createAccess($token->plainTextToken, $type);
            return $access->access_token;
        }
    }
    public function createAccess(string $access_token, string $type)
    {
        $newAccess = new Access([
            'access_token' => $access_token,
            'token_owner_id' => $this->id,
            'type' => $type
        ]);
        $newAccess->save();
        return $newAccess;
    }
}
