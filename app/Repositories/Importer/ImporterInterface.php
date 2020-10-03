<?php

namespace App\Repositories\Importer;

interface ImporterInterface
{

    /**
     * Import data
     * 
     * @param $file file path for import
     * 
     */
    public function import($file);

}