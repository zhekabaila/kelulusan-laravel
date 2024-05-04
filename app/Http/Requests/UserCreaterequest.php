<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserCreaterequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nis' => ['required', 'numeric', Rule::unique('users', 'nis')],
            'password' => ['required'],
            'role' => ['required', Rule::in(['user', 'admin'])],
        ];
    }

    public function messages()
    {
        return [
            'nis.required' => 'Kolom NIS wajib diisi.',
            'nis.numeric' => 'Kolom NIS harus berupa angka.',
            'nis.unique' => 'NIS sudah digunakan.',

            'password.required' => 'Kolom password wajib diisi.',

            'role.required' => 'Kolom role wajib diisi.',
            'role.in' => 'Kolom role hanya dapat berisi User atau Admin'
        ];
    }
}
