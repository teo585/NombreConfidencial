<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\EtiquetaRequest;
use App\Http\Controllers\Controller;

class EtiquetaSelectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('EtiquetaGridSelect');    
    }
}
