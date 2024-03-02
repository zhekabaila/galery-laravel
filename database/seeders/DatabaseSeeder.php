<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Komentar;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(AlbumSeeder::class);
        $this->call(FotoSeeder::class);
        $this->call(LikeSeeder::class);
        $this->call(KomentarSeeder::class);
    }
}
