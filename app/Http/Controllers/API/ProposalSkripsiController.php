<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use Illuminate\Support\Str;
use App\Models\ProposalSkripsi;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProposalSkripsiRequest;

class ProposalSkripsiController extends Controller
{
    public function index(ProposalSkripsi $proposal)
    {
        $dataProposal = $proposal->get();

        return response()->json([
            'success' => true,
            'message' => 'List data proposal',
            'data' => $dataProposal
        ]);
    }

    public function simpan(ProposalSkripsi $proposalSkripsi, ProposalSkripsiRequest $proposalSkripsiRequest)
    {
        $data = $proposalSkripsiRequest->validated();
        $data['judul_ta'] = Str::title($data['judul_ta']);

        $dataProposal = $proposalSkripsi->create($data);

        return ResponseFormatter::success($dataProposal, 'Data proposal berhasil dibuat');
    }
}
