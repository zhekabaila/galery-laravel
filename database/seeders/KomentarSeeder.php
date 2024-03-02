<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KomentarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comments = [
            [
                'isi_komentar' => 'foto yang sangat indah',
                'foto_id' => 1,
                'user_id' => 1,
                'tanggal' => now()->format('Y-m-d'),
            ],
            [
                'isi_komentar' => 'foto yang luar biasa',
                'foto_id' => 2,
                'user_id' => 1,
                'tanggal' => now()->format('Y-m-d')
            ],
        ];

        DB::table('komentar')->insert($comments);
    }
}
