<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Importer\Importer;
use Illuminate\Support\Facades\Auth;
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
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt'
        ]);

        $fileName = $request->file('file')->getClientOriginalName();
        $type = $request->file('file')->getClientOriginalExtension();

        if (! is_int($this->extensionCheck($type))) {
            return redirect()->back()->withErrors('Unsupported extension.');
        };
        $path = $request->file('file')->storeAs('public/uploads', $fileName);
        $path = storage_path('app/'.$path);

        $importer = new Importer(new CsvImporter);
        $importer->importFile('App\Client', $path);

        return redirect()->back()->with('message', 'Successfuly imported.');
    }

    public function extensionCheck($extension)
    {
        $extensions = array('CSV');
        return array_search(strtoupper($extension), $extensions);
    }

}
