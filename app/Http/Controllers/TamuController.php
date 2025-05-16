<?php

namespace App\Http\Controllers;

use App\Models\Tamu;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TamuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try {
            $data = Tamu::all();
            return response()->json([
                'data' => $data
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ]);
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
            $request->validate([
                'nama_tamu' => 'required|string',
                'alamat' => 'required|string',
                'no_hp' => 'required',
                'ttd' => 'required|string',
                'keperluan_id' => 'required|exists:keperluans,id'
            ]);

            $signatureData = $request->ttd;
            $nama = $request->nama_tamu;

            $image = str_replace('data:image/png;base64,', '', $signatureData);
            $image = str_replace(' ', '+', $image);
            $imageName = 'ttd_'.$nama.'.png';

            Storage::disk('public')->put('tanda_tangan/'.$imageName, base64_decode($image));

            Tamu::create([
                'nama_tamu' => $nama,
                'tanggal_datang' => Carbon::today(),
                'alamat' => $request->alamat,
                'no_hp' => $request->no_hp,
                'ttd' => 'tanda_tangan/'.$imageName,
                'keperluan_id' => $request->keperluan_id
            ]);

            return response()->json([
                'message' => 'berhasil membuat data'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Tamu $tamu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tamu $tamu)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tamu $tamu)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tamu $tamu)
    {
        //
    }
}
