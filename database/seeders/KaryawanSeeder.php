<?php

namespace Database\Seeders;
use App\Models\Karyawan;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {

        $faker = Faker::create('id_karyawan');

    	for($i = 1; $i <= 100; $i++){

    	      // insert data ke table pegawai menggunakan Faker
    		DB::table('karyawan')->insert([
    			'nama' => $faker->name,
    			'jenis_kelamin' => $faker->randomElement(['Laki-Laki', 'Perempuan']),
    			'tanggal_lahir' => $faker->datetime('d-m-Y'),
    			'hp' => $faker->numerify('###-###-####'),
                'domisili' => $faker->state

    		]);

    	}
    }
}
