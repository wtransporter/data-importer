<?php

namespace App\Repositories\Importer;

interface ImporterInterface
{

    /**
     * Import data
     * 
     * @param $model model to import
     * @param $file file path for import
     * 
     */
    public function import($model, $file);

}