<?php

namespace App\Repositories\Importer;

use DateTime;

class CsvImporter implements ImporterInterface
{

    public function import($model, $filePath)
    {
        $file = fopen($filePath, "r") or die("Unable to open file!");
        $firstLine = true;
        while(!feof($file)) {
            $row = fgets($file);
            if ($firstLine) {
                $firstLine = false;
                continue;
            } else {
                $row = explode(";",$row);

                $date = DateTime::createFromFormat('d/m/Y', trim($row[3]));
                $date = date_format($date,"Y-m-d");

                $model::create([
                    'first_name' => trim($row[0]),
                    'last_name' => trim($row[1]),
                    'gender' => trim($row[2]),
                    'date_of_birth' => $date
                ]);
            }
        }
        
    }

}