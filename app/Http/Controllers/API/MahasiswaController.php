<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Requests\UserRequest;
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
            'success' => true,
            'message' => 'Data mahasiswa berhasil disimpan',
            'data' => $dataMahasiswa
        ]);
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
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

        $mahasiswa->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Data mahasiswa berhasil diperbaharui'
        ]);
    }

    public function hapus(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data mahasiswa berhasil dihapus'
        ]);
    }

    public function getUser(User $user)
    {
        return ResponseFormatter::success($user, 'Data user berhasil diambil');
    }

    public function deleteUser(User $user, Request $request)
    {
        $token = $request->user()->currentAccessToken()->delete();
        $data = $user->delete();

        return ResponseFormatter::success([$data, $token], 'Data user berhasil dihapus.');
    }

    public function updateUser(User $user, UserRequest $userRequest)
    {
        $data = $userRequest->validated();

        $user->update($data);

        return ResponseFormatter::success(null, 'Data user berhasil diperbaharui.');
    }
}
