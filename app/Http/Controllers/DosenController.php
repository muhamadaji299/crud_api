<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'message' => 'Data dosen berhasil diambil',
            'data' => Dosen::all()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama_dosen' => 'required|string|max:255',
           'nip' => 'required|regex:/^[0-9]+$/|min:8|max:15',
           'email' => 'required|email',
           'no_telp' => 'required|regex:/^[0-9]+$/|min:7|max:15'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $dosen = Dosen::create($request->all());

        return response()->json([
            'message' => 'Data dosen berhasil disimpan',
            'data' => $dosen
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dosen = Dosen::find($id);

        if (!$dosen) {
            return response()->json([
                'message' => 'dosen tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'message' => 'Data dosen ditemukan',
            'data' => $dosen
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dosen = Dosen::find($id);

        if (!$dosen) {
            return response()->json([
                'message' => 'dosen tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama_dosen' => 'required|string|max:255' .$id,
           'nip' => 'required|regex:/^[0-9]+$/|min:10|max:15',
           'email' => 'required|email',
           'no_telp' => 'required|regex:/^[0-9]+$/|min:10|max:15'
           
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $dosen->update($request->all());

        return response()->json([
            'message' => 'Data dosen berhasil diperbarui',
            'data' => $dosen
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dosen = Dosen::find($id);

        if (!$dosen) {
            return response()->json([
                'message' => 'dosen tidak ditemukan'
            ], 404);
        }

        $dosen->delete();

        return response()->json([
            'message' => 'Data dosen berhasil dihapus'
        ], 200);
    }
}
