<?php
namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    /**
     * Menampilkan semua data mahasiswa.
     */
    public function index()
    {
        return response()->json([
            'message' => 'Data mahasiswa berhasil diambil',
            'data' => Mahasiswa::all()
        ], 200);
    }

    /**
     * Menyimpan data mahasiswa baru.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nis' => 'required|unique:mahasiswas,nis',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string',
            'no_hp' => 'required|regex:/^[0-9]+$/|min:10|max:15',
            'jenis_kelamin' => 'required|in:L,P',
            'hobi' => 'required|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $mahasiswa = Mahasiswa::create($request->all());

        return response()->json([
            'message' => 'Data mahasiswa berhasil disimpan',
            'data' => $mahasiswa
        ], 201);
    }

    /**
     * Menampilkan data mahasiswa berdasarkan ID.
     */
    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json([
                'message' => 'Mahasiswa tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'message' => 'Data mahasiswa ditemukan',
            'data' => $mahasiswa
        ], 200);
    }

    /**
     * Memperbarui data mahasiswa.
     */
    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json([
                'message' => 'Mahasiswa tidak ditemukan'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nis' => 'sometimes|unique:mahasiswas,nis,' . $id,
            'nama' => 'sometimes|string|max:255',
            'alamat' => 'sometimes|string',
            'no_hp' => 'sometimes|regex:/^[0-9]+$/|min:10|max:15',
            'jenis_kelamin' => 'sometimes|in:L,P',
            'hobi' => 'sometimes|string'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 422);
        }

        $mahasiswa->update($request->all());

        return response()->json([
            'message' => 'Data mahasiswa berhasil diperbarui',
            'data' => $mahasiswa
        ], 200);
    }
    /**
     * Menghapus data mahasiswa.
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json([
                'message' => 'Mahasiswa tidak ditemukan'
            ], 404);
        }

        $mahasiswa->delete();

        return response()->json([
            'message' => 'Data mahasiswa berhasil dihapus'
        ], 200);
    }
}
