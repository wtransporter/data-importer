<?php

namespace App\Repositories\Importer;

use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Concerns\ToModel;

class CsvImporter implements ImporterInterface
{
    protected $modelImport;

    public function __construct(ToModel $modelImport) {
        $this->modelImport = $modelImport;
    }
    
    public function import($file)
    {
        Excel::import($this->modelImport, $file);
    }

}