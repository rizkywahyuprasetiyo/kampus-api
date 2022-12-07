<?php

namespace App\Http\Controllers\API;

use App\Models\Dosen;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DosenController extends Controller
{
    public function index(Dosen $dosen)
    {
        $dataDosen = $dosen->get();

        return response()->json([
            'success' => true,
            'message' => 'List data dosen',
            'data' => $dataDosen
        ]);
    }

    public function simpan(Request $request, Dosen $dosen)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'nama' => 'required|string|max:191',
            'nidn' => 'required|string|max:191',
            'alamat' => 'required|string'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $dataDosen = $dosen->create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data dosen berhasil disimpan',
            'data' => $dataDosen
        ]);
    }

    public function update(Request $request, Dosen $dosen)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'nama' => 'required|string|max:191',
            'nidn' => 'required|string|max:191',
            'alamat' => 'required|string'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $dosen->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Data dosen berhasil diperbaharui'
        ]);
    }

    public function hapus(Dosen $dosen)
    {
        $dosen->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data dosen berhasil dihapus'
        ]);
    }
}
