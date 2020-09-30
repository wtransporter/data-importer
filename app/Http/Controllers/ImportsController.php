<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

        $path = $request->file('file')->storeAs('public/uploads', $fileName);
        $path = storage_path('app/'.$path);

        $csvImport = ImporterFactory::create(strtoupper($type));
        $csvImport->import('App\Client', $path);

        return redirect()->back();
    }

}
