<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request){
        try {
            $request->validate([
                'username' => 'required|exists:users,username',
                'password' => 'required'
            ]);
            $data = User::where('password', $request->password)->first();
            if (!$data) {
                return response()->json([
                    'message' => 'password salah'
                ]);
            }
            $token = $data->createToken('auth_token')->plainTextToken;
            return response()->json([
                'message' => 'berhasil login',
                'token' => $token
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }
    }

    public function register(Request $request){
        try {
            $field = $request->validate([
                'username' => 'required|exists:users,username',
                'password' => 'required'
            ]);
            $data = User::create($field);
            return response()->json([
                'message' => 'berhasil membuat user',
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }
    }

    public function logout(Request $request){
        try {
            $user = $request->user();
            $user->CurrentAccessTokens()->delete();
            return response()->json([
                'message' => 'berhasil logout'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }
    }
}
