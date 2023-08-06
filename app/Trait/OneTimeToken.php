<?php

namespace App\Trait;

use App\Models\Access;
use Illuminate\Support\Facades\DB;

trait OneTimeToken
{
    //This is used to return one time token for each connection, to garantee that there will be one token, not multiple token
    public function getAccessToken(int $userId): string
    {
        return Access::where('user_id', $userId)->first()->access_token;
    }
    public function createAccess(string $access_token)
    {
        return (new Access([
            'access_token' => $access_token,
            'user_id' => $this->id
        ]))->save();
    }
}
