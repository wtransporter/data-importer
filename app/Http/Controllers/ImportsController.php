<?php

namespace App\Http\Controllers;

use App\Imports\CsvClientsImport;
use App\Repositories\Importer\Importer;
use App\Http\Requests\ImportFormRequest;
use App\Repositories\Importer\CsvImporter;

class ImportsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('imports.create');
    }

    /**
     * Store the incoming file.
     *
     * @param  \App\Http\Requests\ImportFormRequest  $request
     * @return Response
     */
    public function store(ImportFormRequest $request)
    {
        $type = $request->file('file')->getClientOriginalExtension();

        if (! is_int($this->extensionCheck($type))) {
            return redirect()->back()->withErrors('Unsupported extension.');
        };

        //Bindovati u service container ?
        $importer = new Importer(new CsvImporter(new CsvClientsImport));
        $importer->importFile($request->file('file'));

        return redirect()->back()->with('message', 'Successfuly imported.');
    }

    public function extensionCheck($extension)
    {
        $extensions = array('CSV');
        return array_search(strtoupper($extension), $extensions);
    }

}
