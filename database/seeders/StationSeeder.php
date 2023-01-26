<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Station;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Station::truncate();
        $csvFile = fopen(storage_path()."/app/public/station.csv", "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Station::create([
                    'FID' => $data['0'],
                    'ID'=> $data['1'],
                    'Nimi'=> $data['2'],
                    'Namn'=> $data['3'],
                    'Name'=> $data['4'],
                    'Osoite'=> $data['5'],
                    'Adress'=> $data['6'],
                    'Kaupunki'=> $data['7'],
                    'Stad'=> $data['8'],
                    'Operaattor'=> $data['9'],
                    'Kapasiteet'=> $data['10'],
                    'x'=> $data['11'],
                    'y'=> $data['12']
                ]);
            }
            $firstline = false;
        }
        fclose($csvFile);
    }

}
