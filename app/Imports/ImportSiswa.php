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
            'nilai1' => $row['nilai1'],
            'nilai2' => $row['nilai2'],
            'nilai3' => $row['nilai3'],
            'nilai4' => $row['nilai4'],
            'nilai5' => $row['nilai5'],
            'nilai6' => $row['nilai6'],
            'nilai7' => $row['nilai7'],
            'nilai8' => $row['nilai8'],
            'nilai9' => $row['nilai9'],
            'nilai10' => $row['nilai10'],
            'nilai11' => $row['nilai11'],
            'nilai12' => $row['nilai12'],
            'nilai13' => $row['nilai13'],
            'nilai14' => $row['nilai14'],
            'nilai15' => $row['nilai15'],
            'nilai16' => $row['nilai16']
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function rules(): array
    {
        return [
            '*.nis' => ['required', 'numeric', 'unique:siswa,nis', 'exists:users,nis'],
            '*.nisn' => ['required', 'numeric', 'unique:siswa,nisn'],
            '*.nama' => ['required', 'string', 'max:255'],
            '*.tempat_lahir' => ['required', 'string', 'max:255'],
            '*.tanggal_lahir' => ['required', 'string', 'max:255'],
            '*.nama_ortu' => ['required', 'string', 'max:255'],
            '*.jk' => ['required', Rule::in(['L', 'P']), 'max:255'],
            '*.jurusan' => ['required', Rule::in(['MIPA', 'IPS'])],
            '*.kelas' => ['required', 'string', 'max:255'],
            '*.nilai1' => 'required|numeric|between:0,999.99',
            '*.nilai2' => 'required|numeric|between:0,999.99',
            '*.nilai3' => 'required|numeric|between:0,999.99',
            '*.nilai4' => 'required|numeric|between:0,999.99',
            '*.nilai5' => 'required|numeric|between:0,999.99',
            '*.nilai6' => 'required|numeric|between:0,999.99',
            '*.nilai7' => 'required|numeric|between:0,999.99',
            '*.nilai8' => 'required|numeric|between:0,999.99',
            '*.nilai9' => 'required|numeric|between:0,999.99',
            '*.nilai10' => 'required|numeric|between:0,999.99',
            '*.nilai11' => 'required|numeric|between:0,999.99',
            '*.nilai12' => 'required|numeric|between:0,999.99',
            '*.nilai13' => 'required|numeric|between:0,999.99',
            '*.nilai14' => 'required|numeric|between:0,999.99',
            '*.nilai15' => 'required|numeric|between:0,999.99',
            '*.nilai16' => 'required|numeric|between:0,999.99',
        ];
    }

    public function customValidationMessages()
    {
        return [
            '*.nis.required' => 'Kolom NIS wajib diisi.',
            '*.nis.numeric' => 'Kolom NIS harus berupa angka.',
            '*.nis.unique' => 'NIS sudah digunakan.',
            '*.nis.exists' => 'NIS tidak tersedia.',

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

            '*.nilai1.required' => 'Kolom Nilai 1 wajib diisi.',
            '*.nilai1.numeric' => 'Kolom Nilai 1 harus berupa angka.',
            '*.nilai1.between' => 'Kolom Nilai 1 harus di antara :min dan :max.',

            '*.nilai2.required' => 'Kolom Nilai 2 wajib diisi.',
            '*.nilai2.numeric' => 'Kolom Nilai 2 harus berupa angka.',
            '*.nilai2.between' => 'Kolom Nilai 2 harus di antara :min dan :max.',

            '*.nilai3.required' => 'Kolom Nilai 3 wajib diisi.',
            '*.nilai3.numeric' => 'Kolom Nilai 3 harus berupa angka.',
            '*.nilai3.between' => 'Kolom Nilai 3 harus di antara :min dan :max.',

            '*.nilai4.required' => 'Kolom Nilai 4 wajib diisi.',
            '*.nilai4.numeric' => 'Kolom Nilai 4 harus berupa angka.',
            '*.nilai4.between' => 'Kolom Nilai 4 harus di antara :min dan :max.',

            '*.nilai5.required' => 'Kolom Nilai 5 wajib diisi.',
            '*.nilai5.numeric' => 'Kolom Nilai 5 harus berupa angka.',
            '*.nilai5.between' => 'Kolom Nilai 5 harus di antara :min dan :max.',

            '*.nilai6.required' => 'Kolom Nilai 6 wajib diisi.',
            '*.nilai6.numeric' => 'Kolom Nilai 6 harus berupa angka.',
            '*.nilai6.between' => 'Kolom Nilai 6 harus di antara :min dan :max.',

            '*.nilai7.required' => 'Kolom Nilai 7 wajib diisi.',
            '*.nilai7.numeric' => 'Kolom Nilai 7 harus berupa angka.',
            '*.nilai7.between' => 'Kolom Nilai 7 harus di antara :min dan :max.',

            '*.nilai8.required' => 'Kolom Nilai 8 wajib diisi.',
            '*.nilai8.numeric' => 'Kolom Nilai 8 harus berupa angka.',
            '*.nilai8.between' => 'Kolom Nilai 8 harus di antara :min dan :max.',

            '*.nilai9.required' => 'Kolom Nilai 9 wajib diisi.',
            '*.nilai9.numeric' => 'Kolom Nilai 9 harus berupa angka.',
            '*.nilai9.between' => 'Kolom Nilai 9 harus di antara :min dan :max.',

            '*.nilai10.required' => 'Kolom Nilai 10 wajib diisi.',
            '*.nilai10.numeric' => 'Kolom Nilai 10 harus berupa angka.',
            '*.nilai10.between' => 'Kolom Nilai 10 harus di antara :min dan :max.',

            '*.nilai11.required' => 'Kolom Nilai 11 wajib diisi.',
            '*.nilai11.numeric' => 'Kolom Nilai 11 harus berupa angka.',
            '*.nilai11.between' => 'Kolom Nilai 11 harus di antara :min dan :max.',

            '*.nilai12.required' => 'Kolom Nilai 12 wajib diisi.',
            '*.nilai12.numeric' => 'Kolom Nilai 12 harus berupa angka.',
            '*.nilai12.between' => 'Kolom Nilai 12 harus di antara :min dan :max.',

            '*.nilai13.required' => 'Kolom Nilai 13 wajib diisi.',
            '*.nilai13.numeric' => 'Kolom Nilai 13 harus berupa angka.',
            '*.nilai13.between' => 'Kolom Nilai 13 harus di antara :min dan :max.',

            '*.nilai14.required' => 'Kolom Nilai 14 wajib diisi.',
            '*.nilai14.numeric' => 'Kolom Nilai 14 harus berupa angka.',
            '*.nilai14.between' => 'Kolom Nilai 14 harus di antara :min dan :max.',

            '*.nilai15.required' => 'Kolom Nilai 15 wajib diisi.',
            '*.nilai15.numeric' => 'Kolom Nilai 15 harus berupa angka.',
            '*.nilai15.between' => 'Kolom Nilai 15 harus di antara :min dan :max.',

            '*.nilai15.required' => 'Kolom Nilai 15 wajib diisi.',
            '*.nilai15.numeric' => 'Kolom Nilai 15 harus berupa angka.',
            '*.nilai15.between' => 'Kolom Nilai 15 harus di antara :min dan :max.',
        ];
    }
}
