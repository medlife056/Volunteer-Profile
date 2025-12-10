<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Services\AuthService;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'password' => 'required|integer',
        ]);

        $result = $this->authService->login($request->only('full_name', 'password'));

        if (!$result) {
            return response()->json([
                'message' => 'your data is incorrect'
            ], 401);
        }

        return response()->json($result);
    }
}
