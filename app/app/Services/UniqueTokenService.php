<?php

namespace App\Services;

use App\Models\UniqueToken;
use App\Models\User;
use Illuminate\Support\Str;

class UniqueTokenService
{
    protected function generateUniqueToken(): string
    {
        $token = Str::random(8);

        // ensure that hash is unique
        while (UniqueToken::where('token', $token)->count()) {
            $token = Str::random(8);
        }

        return $token;
    }

    public static function createToken(User $user)
    {
        $token = self::generateUniqueToken();

        $user->accessTokens()->create([
            'token' => $token,
        ]);

        return $token;
    }
}
