<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request) : JsonResponse
    {
        $credentials = $request->only('email', 'password');
        if (!$token = Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'INVALID_CREDENTIALS'
            ], 401);
        }
        return response()->json(['message'=>'success',
            'token'=>$token],200);
    }

}
