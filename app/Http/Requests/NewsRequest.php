<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'tanggal' => 'required|date',
            'judul' => 'required|string',
            'content' => 'required|string',
            'gambar' => 'required|image|mimes:jpg|max:2048|unique:news',
            'kategori' => 'required|string|in:skripsi,kerja-praktik'
        ];
    }
}
