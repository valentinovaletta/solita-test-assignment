<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Lib\CsvParse\CsvParse;

class JourneySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (glob(storage_path()."/app/public/*.csv") as $filename) {

            $csvFile = NEW CsvParse(path: $filename);
            if($csvFile->isFileExists()){
                $csvFile->createBDFile();
            }

        }
        return $csvFile->loadFileToDB("d:/work/work/solita/storage/app/public/tempFile.csv");
    }

}
