<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Models\ProposalSkripsi;
use App\Http\Controllers\Controller;

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
}
