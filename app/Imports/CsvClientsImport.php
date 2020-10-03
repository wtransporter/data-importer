<?php

namespace App\Imports;

use DateTime;
use App\Client;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;

class CsvClientsImport implements ToModel, WithCustomCsvSettings, WithStartRow
{

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $date = DateTime::createFromFormat('d/m/Y', trim($row[3]));

        return new Client([
            'first_name'      =>  $row[0],
            'last_name'     =>  $row[1],
            'gender'  =>  $row[2],
            'date_of_birth'  =>  date_format($date,"Y-m-d")
        ]);

    }

    /**
     * @return int
     */
    public function startRow(): int
    {
        return 2;
    }

    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'ISO-8859-1',
            'delimiter' => ";"
        ];
    }
}
