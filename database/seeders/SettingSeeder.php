<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = [
            'nama_sekolah' => 'SMA Negeri 1 Kasokandel',
            'no_hp' => '081313747177',
            'tahun_ajaran' => '2023/2024',
            'target_waktu' => '2024-05-04 00:00:00'
        ];

        DB::table('setting')->insert($setting);
    }
}
