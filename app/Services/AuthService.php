<?php

namespace App\Services;


use App\Models\Volunteer;
use Illuminate\Support\Facades\Auth;

class AuthService
{
    public function login(array $credentials)
    {
        if (!Auth::attempt($credentials)) {
            return null;
        }

        $volunteer = Volunteer::where('full_name', $credentials['full_name'])->first();

        $token = $volunteer->createToken('auth_token')->plainTextToken;

        return [
            'user' => $volunteer,
            'access_token' => $token,
        ];
    }
}
