<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $siswa = [
            [
                'nis' => '123456',
                'nisn' => '9876543210',
                'nama' => 'Nama Siswa 1',
                'ttl' => 'Majalengka, 28 Juni 2006',
                'nama_ortu' => 'Nama Orang Tua 1',
                'jk' => 'L',
                'jurusan' => 'RPL',
                'kelas' => 'RPL-2',
                // 'nilai1' => 80.25,
                // 'nilai2' => 85.50,
                // 'nilai3' => 90.75,
                // 'nilai4' => 95.00,
                // 'nilai5' => 80.25,
                // 'nilai6' => 85.50,
                // 'nilai7' => 90.75,
                // 'nilai8' => 95.00,
                // 'nilai9' => 80.25,
                // 'nilai10' => 85.50,
                // 'nilai11' => 90.75,
                // 'nilai12' => 95.00,
                // 'nilai13' => 80.25,
                // 'nilai14' => 85.50,
                // 'nilai15' => 90.75,
                // 'nilai16' => 95.00,
            ],
            [
                'nis' => '654321',
                'nisn' => '0123456789',
                'nama' => 'Nama Siswa 2',
                'ttl' => 'Majalengka, 28 Juni 2006',
                'nama_ortu' => 'Nama Orang Tua 2',
                'jk' => 'P',
                'jurusan' => 'TKJ',
                'kelas' => 'TKJ-2',
                // 'nilai1' => 85.50,
                // 'nilai2' => 90.75,
                // 'nilai3' => 95.00,
                // 'nilai4' => 80.25,
                // 'nilai5' => 85.50,
                // 'nilai6' => 90.75,
                // 'nilai7' => 95.00,
                // 'nilai8' => 80.25,
                // 'nilai9' => 85.50,
                // 'nilai10' => 90.75,
                // 'nilai11' => 95.00,
                // 'nilai12' => 80.25,
                // 'nilai13' => 85.50,
                // 'nilai14' => 90.75,
                // 'nilai15' => 95.00,
                // 'nilai16' => 80.25,
            ],
            // Tambahkan data siswa lainnya sesuai kebutuhan
        ];

        // Loop through each siswa and create record in database
        DB::table('siswa')->insert($siswa);
    }
}
