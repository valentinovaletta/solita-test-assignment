<?php

namespace App\Lib\CsvParse;

use Illuminate\Support\Facades\DB;

class CsvParse {

    const TEMPLATE_DB =  [
        'departure',
        'return',
        'departure_station_id',
        'departure_station_name',
        'return_station_id',
        'return_station_name',
        'covered_distance',
        'duration'
    ];

    private $handle;
    private $path;

    public function __construct(String $path) {

        $this->path = $path;

        if ( !file_exists($this->path) ) {
            return false;
        }
        $this->handle = fopen($this->path, "r");
    }

    public function isFileExists() : Bool
    {
        if (!$this->handle) {
            return false;
        }
        return true;
    }  

    public function createBDFile() : bool
    {
        $i=0;

        if ( file_exists(storage_path().'/app/public/tempFile.csv') ) {
            return false;
        }

        if ($this->handle) {
            $newFile = fopen(storage_path().'/app/public/tempFile.csv', "a");
            while (!feof($this->handle)) {

                if($this->validateCsvLine( $string = fgets($this->handle, 4096) )){
                    fwrite($newFile, $string);
                }

            }
            fclose($this->handle);
            fclose($newFile);
            return true;
        }
    }

    public function loadFileToDB($path) : bool
    {
        set_time_limit(1000);
        $query = "
            LOAD DATA INFILE '$path' INTO TABLE journeys
            FIELDS TERMINATED BY ','
            ENCLOSED BY '\"'
            (
                departure_time,
                return_time,
                departure_station_id,
                departure_station_name,
                return_station_id,
                return_station_name,
                covered_distance,
                duration            
            )
            SET id = NULL;
            IGNORE 1 LINES;
        ";
        return DB::unprepared($query);
    }

    private function validateCsvLine(string $str, string $separator = ",") : Bool
    {
        $row = explode($separator, $str);
        if( !$this->validateDate($row[0]) || !$this->validateDate($row[1]) || !$this->validateDateDifference($row[0],$row[1]) ){
            return false;
        }
        if( !$this->validateName($row[3]) || !$this->validateName($row[5]) ){
            return false;
        }
        if( !$this->validateNumbers($row[2]) || !$this->validateNumbers($row[4]) || !$this->validateNumbers($row[6])|| !$this->validateNumbers($row[7])){
            return false;
        }
        if( !$this->validateLength($row[6]) || !$this->validateLength($row[7]) ){
            return false;
        }
        return true;
    }


    /* chekers for each csv row */
    private function validateDate($date, $format = 'Y-m-d\TH:i:s') : Bool
    {
        $d = \DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }

    private function validateDateDifference($date1, $date2) : Bool
    {
        return (strtotime($date1) < strtotime($date2));
    }

    private function validateName($name) : Bool
    {
        return is_string($name) && strlen($name) > 1;
    }

    private function validateNumbers($value) : Bool
    {
        return (is_numeric($value) && (int)$value > 0 );
    }    

    private function validateLength($value) : Bool
    {
        return (is_numeric($value) && (int)$value > 10 );
    }     
    /* !chekers for each csv row */

}