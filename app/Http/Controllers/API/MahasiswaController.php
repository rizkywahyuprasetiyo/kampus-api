<?php

namespace App\Http\Controllers\API;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    public function index(Mahasiswa $mahasiswa)
    {
        $dataMahasiswa = $mahasiswa->get();

        return response()->json([
            'success' => true,
            'message' => 'List data mahasiswa',
            'data' => $dataMahasiswa
        ]);
    }

    public function simpan(Request $request, Mahasiswa $mahasiswa)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'nama' => 'required|string|max:191',
            'nim' => 'required|string|max:191',
            'alamat' => 'required|string'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $dataMahasiswa = $mahasiswa->create($data);

        return response()->json([
            'success' => 'true',
            'message' => 'Data mahasiswa berhasil disimpan',
            'data' => $dataMahasiswa
        ]);
    }
}
