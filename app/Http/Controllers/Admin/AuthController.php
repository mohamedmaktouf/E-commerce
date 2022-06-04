<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use JWTAuth;

class AuthController extends Controller
{
    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
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
