<?php

namespace App\Http\Controllers;

use App\Imports\CsvClientsImport;
use App\Repositories\Importer\Importer;
use App\Http\Requests\ImportFormRequest;
use App\Repositories\Importer\CsvImporter;
use Carbon\Exceptions\InvalidFormatException;

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
        //Bindovati u service container ?
        $importer = new Importer(new CsvImporter(new CsvClientsImport));
        try {
            
            $importer->importFile($request->file('file'));    

        } catch (InvalidFormatException $ex) {
            return redirect()->back()->withErrors('Wrong date format passed.');            
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Something went wrong. Check file and extension.');
        }

        return redirect()->back()->with('message', 'Successfuly imported.');
    }


}
