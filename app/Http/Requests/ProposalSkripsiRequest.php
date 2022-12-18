<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProposalSkripsiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'judul_ta' => 'required|string|max:255',
            'kategori' => 'required|string|in:rpl,sc',
            'status' => 'required|string|in:submitted,siap_sempro,diterima,ditolak'
        ];
    }
}
