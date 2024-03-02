<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $photos = [
            [
                'judul' => 'foto alam 1',
                'deskripsi' => 'deskripsi foto alam 1',
                'lokasi_file' => 'public/Y2dacFY4lEnOvf7RDvJ6i6Y4PrssowBFsqwUT0kX.png',
                'tanggal' => now()->format('Y-m-d'),
                'album_id' => 1,
                'user_id' => 1,
            ],
            [
                'judul' => 'foto alam 2',
                'deskripsi' => 'deskripsi foto alam 2',
                'lokasi_file' => 'public/Y2dacFY4lEnOvf7RDvJ6i6Y4PrssowBFsqwUT0kX.png',
                'tanggal' => now()->format('Y-m-d'),
                'album_id' => 1,
                'user_id' => 1,
            ],
        ];

        DB::table('foto')->insert($photos);
    }
}
