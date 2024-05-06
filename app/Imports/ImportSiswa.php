<?php

namespace App\Imports;

use App\Models\Siswa;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportSiswa implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure, SkipsEmptyRows
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    use Importable, SkipsErrors, SkipsFailures;

    public function model(array $row)
    {
        return new Siswa([
            'nis' => $row['nis'],
            'nisn' => $row['nisn'],
            'nama' => $row['nama'],
            'ttl' => $row['tempat_lahir'] . ', ' . $row['tanggal_lahir'],
            'nama_ortu' => $row['nama_ortu'],
            'jk' => $row['jk'],
            'jurusan' => $row['jurusan'],
            'kelas' => $row['kelas'],
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function rules(): array
    {
        return [
            '*.nis' => ['required', 'numeric', 'unique:siswa,nis', Rule::exists('users', 'nis')->where('role', 'user')],
            '*.nisn' => ['required', 'numeric', 'unique:siswa,nisn'],
            '*.nama' => ['required', 'string', 'max:255'],
            '*.tempat_lahir' => ['required', 'string', 'max:255'],
            '*.tanggal_lahir' => ['required', 'string', 'max:255'],
            '*.nama_ortu' => ['required', 'string', 'max:255'],
            '*.jk' => ['required', Rule::in(['L', 'P']), 'max:255'],
            '*.jurusan' => ['required', 'string', 'max:255'],
            '*.kelas' => ['required', 'string', 'max:255'],
        ];
    }

    public function customValidationMessages()
    {
        return [
            '*.nis.required' => 'Kolom NIS wajib diisi.',
            '*.nis.numeric' => 'Kolom NIS harus berupa angka.',
            '*.nis.unique' => 'NIS sudah digunakan.',
            'nis.exists' => 'NIS tidak tersedia atau Role tidak bernilai User.',

            '*.nisn.required' => 'Kolom NISN wajib diisi.',
            '*.nisn.numeric' => 'Kolom NISN harus berupa angka.',
            '*.nisn.unique' => 'NISN sudah digunakan.',

            '*.nama.required' => 'Kolom Nama wajib diisi.',
            '*.nama.string' => 'Kolom Nama harus berupa teks.',
            '*.nama.max' => 'Kolom Nama tidak boleh lebih dari :max karakter.',

            '*.tempat_lahir.required' => 'Kolom Tempat Lahir wajib diisi.',
            '*.tempat_lahir.string' => 'Kolom Tempat Lahir harus berupa teks.',
            '*.tempat_lahir.max' => 'Kolom Tempat Lahir tidak boleh lebih dari :max karakter.',

            '*.tanggal_lahir.required' => 'Kolom Tanggal Lahir wajib diisi.',
            '*.tanggal_lahir.string' => 'Kolom Tanggal Lahir harus berupa teks.',
            '*.tanggal_lahir.max' => 'Kolom Tanggal Lahir tidak boleh lebih dari :max karakter.',

            '*.nama_ortu.required' => 'Kolom Nama Orang Tua wajib diisi.',
            '*.nama_ortu.string' => 'Kolom Nama Orang Tua harus berupa teks.',
            '*.nama_ortu.max' => 'Kolom Nama Orang Tua tidak boleh lebih dari :max karakter.',

            '*.jk.required' => 'Kolom Jenis Kelamin wajib diisi.',
            '*.jk.in' => 'Kolom Jenis Kelamin harus di antara L atau P.',
            '*.jk.max' => 'Kolom Jenis Kelamin tidak boleh lebih dari :max karakter.',

            '*.jurusan.required' => 'Kolom Jurusan wajib diisi.',
            '*.jurusan.string' => 'Kolom Jurusan harus berupa teks.',
            '*.jurusan.max' => 'Kolom Jurusan tidak boleh lebih dari :max karakter.',

            '*.kelas.required' => 'Kolom Kelas wajib diisi.',
            '*.kelas.string' => 'Kolom Kelas harus berupa teks.',
            '*.kelas.max' => 'Kolom Kelas tidak boleh lebih dari :max karakter.',
        ];
    }
}
