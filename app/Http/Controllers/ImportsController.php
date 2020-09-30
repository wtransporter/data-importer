<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Importer\Importer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Importer\CsvImporter;
use App\Repositories\Importer\ImporterFactory;

class ImportsController extends Controller
{
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorizeCheck();
        return view('imports.create');
    }

    /**
     * Store the incoming file.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->authorizeCheck();
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);

        $fileName = $request->file('file')->getClientOriginalName();
        $type = $request->file('file')->getClientOriginalExtension();
        // die($type);
        if (! is_int($this->extensionCheck($type))) {
            return redirect()->back()->withErrors('Unsupported extension.');
        };
        $path = $request->file('file')->storeAs('public/uploads', $fileName);
        $path = storage_path('app/'.$path);

        $importer = new Importer(new CsvImporter);
        $importer->importFile('App\Client', $path);
        // $csvImport = ImporterFactory::create(strtoupper($type));
        // $csvImport->import('App\Client', $path);

        return redirect()->back()->with('message', 'Successfuly imported.');
    }

    protected function authorizeCheck()
    {
        abort_if(! Auth::user()->hasRole('admin'), 403);
    }

    public function extensionCheck($extension)
    {
        $extensions = array('CSV');
        return array_search(strtoupper($extension), $extensions);
    }

}
