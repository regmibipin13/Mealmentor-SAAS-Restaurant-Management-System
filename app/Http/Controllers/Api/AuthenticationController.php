<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    public function login(Request $request)
    {
        $sanitized = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (!Auth::attempt($sanitized)) {
            return response()->json(['status' => 'error', 'message' => 'Credentials Do Not Matched']);
        }
        if (auth()->user()->user_type !== 2) {
            return response()->json(['status' => 'error', 'message' => 'Only Restaurant Owner can login']);
        }
        $token = auth()->user()->createToken('API Token')->accessToken;

        $data = [
            'user' => auth()->user(),
            'token' => $token,
        ];

        return response()->json(['status' => 'success', 'message' => 'Logged In Successfully', 'data' => $data]);
    }

    public function getLoggedInUser()
    {
        if (auth('api')->check()) {
            return User::find(auth('api')->id());
        }
        return null;
    }
}
