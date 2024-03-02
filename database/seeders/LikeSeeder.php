<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LikeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $likes = [
            [
                'foto_id' => 1,
                'user_id' => 1,
                'tanggal' => now()->format('Y-m-d')
            ],
            [
                'foto_id' => 2,
                'user_id' => 1,
                'tanggal' => now()->format('Y-m-d')
            ],
        ];

        DB::table('like')->insert($likes);
    }
}
