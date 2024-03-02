<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $albums = [
            [
                'nama' => 'alama',
                'deskripsi' => 'album ini akan berisi tentang alam',
                'tanggal' => now()->format('Y-m-d'),
                'user_id' => 1
            ],
        ];

        DB::table('album')->insert($albums);
    }
}
