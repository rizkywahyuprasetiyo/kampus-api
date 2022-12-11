<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalSkripsi extends Model
{
    use HasFactory;
    protected $table = 'proposal_skripsi';

protected $fillable = [
    'judul_ta',
    'kategori',
    'status'
];
}