<?php

namespace App\Repositories\Importer;

class ImporterFactory
{

    protected static $typeFilter = [
        'CSV' => 'App\Repositories\Importer\CsvImporter'
    ];

    /**
     * Instantiate required importer
     * 
     * @param $type
     */
    public static function create($type)
    {
        $importer = self::getImporterType($type);

        return new $importer();
    }

    protected static function getImporterType($type)
    {
        if (array_key_exists(strtoupper($type), self::$typeFilter)) {
            return self::$typeFilter[$type];
        }

        return self::$typeFilter['CSV'];
    }

}