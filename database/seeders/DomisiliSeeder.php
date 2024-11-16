<?php

namespace Database\Seeders;
use App\Models\Domisili;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Kavist\RajaOngkir\Facades\RajaOngkir;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use File;

class DomisiliSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            Domisili::truncate();

            $json = File::get("database/data/kota.json");
            $kota = json_decode($json);

            foreach ($kota as $key => $value){
                Domisili::Create([
                    "name" => $value->name,
                    "alt_name" => $value->alt_name,
                    "latitude" => $value->latitude,
                    "longitude" => $value->longitude
                ]);
            }
        }
    }

