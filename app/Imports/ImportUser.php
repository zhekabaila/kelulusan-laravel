<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportUser implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure, SkipsEmptyRows
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */

    use Importable, SkipsErrors, SkipsFailures;

    public function __construct()
    {
        set_time_limit(1000000000000);
    }

    public function model(array $row)
    {
        return new User([
            'nis' => $row['nis'],
            'password' => Hash::make($row['password']),
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function rules(): array
    {
        return [
            '*.nis' => ['required', 'numeric', 'unique:users,nis'],
            '*.password' => ['required'],
        ];
    }

    public function customValidationMessages()
    {
        return [
            '*.nis.required' => 'Kolom NIS wajib diisi.',
            '*.nis.numeric' => 'Kolom NIS harus berupa angka.',
            '*.nis.unique' => 'NIS sudah digunakan.',

            '*.password.required' => 'Kolom password wajib diisi.',
        ];
    }
}
