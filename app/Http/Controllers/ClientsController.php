<?php

namespace App\Http\Controllers;

use App\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::adults()->get();
        
        if (request()->wantsJson()) {
            return $clients->toJson();
        }

        return view('clients.index', compact('clients'));
    }

}
