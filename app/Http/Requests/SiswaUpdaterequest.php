<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SiswaUpdaterequest extends FormRequest
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
        $id = $this->route('id');

        return [
            'nis' => ['required', 'numeric', Rule::unique('siswa', 'nis')->ignore($id), Rule::exists('users', 'nis')->where('role', 'user')],
            'nisn' => ['required', 'numeric', Rule::unique('siswa', 'nisn')->ignore($id)],
            'nama' => ['required', 'string', 'max:255'],
            'ttl' => ['required', 'string', 'max:255'],
            'nama_ortu' => ['required', 'string', 'max:255'],
            'jk' => ['required', Rule::in(['L', 'P'])],
            'jurusan' => ['required', 'string', 'max:255'],
            'kelas' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'nis.required' => 'Kolom NIS wajib diisi.',
            'nis.numeric' => 'Kolom NIS harus berupa angka.',
            'nis.unique' => 'NIS sudah digunakan.',
            'nis.exists' => 'NIS tidak tersedia atau Role tidak bernilai User.',

            'nisn.required' => 'Kolom NISN wajib diisi.',
            'nisn.numeric' => 'Kolom NISN harus berupa angka.',
            'nisn.unique' => 'NISN sudah digunakan.',

            'nama.required' => 'Kolom Nama wajib diisi.',
            'nama.string' => 'Kolom Nama harus berupa teks.',
            'nama.max' => 'Kolom Nama tidak boleh lebih dari :max karakter.',

            'ttl.required' => 'Kolom TTL wajib diisi.',
            'ttl.string' => 'Kolom TTL harus berupa teks.',
            'ttl.max' => 'Kolom TTL tidak boleh lebih dari :max karakter.',

            'nama_ortu.required' => 'Kolom Nama Orang Tua wajib diisi.',
            'nama_ortu.string' => 'Kolom Nama Orang Tua harus berupa teks.',
            'nama_ortu.max' => 'Kolom Nama Orang Tua tidak boleh lebih dari :max karakter.',

            'jk.required' => 'Kolom Jenis Kelamin wajib diisi.',
            'jk.in' => 'Kolom Jenis Kelamin harus di antara L atau P.',

            'jurusan.required' => 'Kolom Jurusan wajib diisi.',
            'jurusan.string' => 'Kolom Jurusan harus berupa teks.',
            'jurusan.max' => 'Kolom Jurusan tidak boleh lebih dari :max karakter.',

            'kelas.required' => 'Kolom Kelas wajib diisi.',
            'kelas.string' => 'Kolom Kelas harus berupa teks.',
            'kelas.max' => 'Kolom Kelas tidak boleh lebih dari :max karakter.',
        ];
    }
}
