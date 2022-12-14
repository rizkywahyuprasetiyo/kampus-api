<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth('sanctum')->check() ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if ($this->user) {
            return [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,' . $this->user->id,
                'password' => 'sometimes|confirmed|min:8'
            ];
        } else {
            return [
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email',
                'password' => 'sometimes|confirmed|min:8'
            ];
        }
    }
}
