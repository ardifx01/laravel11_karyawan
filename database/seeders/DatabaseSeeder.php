<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Karyawan;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\Post::factory(200)->create();

        $this->call([
            UserSeeder::class,
            KaryawanSeeder::class,
            DomisiliSeeder::class
        ]);

    }

}
