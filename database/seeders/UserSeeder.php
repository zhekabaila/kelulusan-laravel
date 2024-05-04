<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'nis' => '123456',
                'password' => Hash::make(123),
                'role' => 'user'
            ],
            [
                'nis' => '654321',
                'password' => Hash::make(123),
                'role' => 'user'
            ],
            [
                'nis' => 'admin',
                'password' => Hash::make(123),
                'role' => 'admin'
            ],
        ];

        DB::table('users')->insert($users);
    }
}
