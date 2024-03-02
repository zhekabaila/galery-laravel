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
                'username' => 'user',
                'email' => 'user@example.com',
                'password' => Hash::make('123'),
                'nama_lengkap' => 'user',
                'alamat' => 'majalengka',
            ]
        ];

        DB::table('users')->insert($users);
    }
}
