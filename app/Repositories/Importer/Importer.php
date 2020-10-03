<?php

namespace App\Repositories\Importer;

class Importer
{
    protected ImporterInterface $importer;

    public function __construct(ImporterInterface $importer)
    {
        $this->importer = $importer;
    }

    public function importFile($filePath)
    {
        $this->importer->import($filePath);
    }

}