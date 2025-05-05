<?php

namespace App\Http\Controllers;

use App\Models\Authentication;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    public function Login(Request $request){
        try {
            $request->validate([
                'username' => 'required',
                'password' => 'required'
            ]);
            $data = Authentication::where('username', $request->username)->first();
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
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Authentication $authentication)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Authentication $authentication)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Authentication $authentication)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Authentication $authentication)
    {
        //
    }
}
