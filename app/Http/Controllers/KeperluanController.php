<?php

namespace App\Http\Controllers;

use App\Models\keperluan;
use Illuminate\Http\Request;

class KeperluanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data = keperluan::all();
            return response()->json([
                'data' => $data
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
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
        try {
            $field = $request->validate([
                'tujuan' => 'required|unique:keperluans,tujuan'
            ]);
            $data = keperluan::create($field);
            return response()->json([
                'message' => 'berhasil membuat tujuan',
                'data' => $data
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(keperluan $keperluan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(keperluan $keperluan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, keperluan $keperluan)
    {
        //
        try {
            $field = $request->validate([
                'tujuan' => 'required|unique:keperluans,tujuan'
            ]);
            $keperluan->update($field);
            return response()->json([
                'message' => 'berhasil mengubah data'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(keperluan $keperluan)
    {
        try {
            $keperluan->delete();
            return response()->json([
                'message' => 'berhasil menghapus data'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
