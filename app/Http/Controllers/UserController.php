<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request){
        try {
            $request->validate([
                'username' => 'required|exists:users,username',
                'password' => 'required'
            ]);
            $user = User::where('username', $request->username)->first();
            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'message' => 'password salah'
                ]);
            }
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'message' => 'berhasil login',
                'token' => $token
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function register(Request $request){
        try {
            $field = $request->validate([
                'username' => 'required|unique:users,username',
                'password' => 'required'
            ]);
            $data = User::create($field);
            return response()->json([
                'message' => 'berhasil membuat user',
                'data' => $data
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function logout(Request $request){
        try {
            $user = $request->user();
            $user->CurrentAccessToken()->delete();
            return response()->json([
                'message' => 'berhasil logout'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
