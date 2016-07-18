<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\ListaRequest;
use App\Http\Controllers\Controller;

class ListaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ListaGrid');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lista');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ListaRequest $request)
    {
        \App\Lista::create([
        'codigoLista' => $request['codigoLista'],
        'nombreLista' => $request['nombreLista'],
        ]);

        $lista = \App\Lista::All()->last();
        $contadorSubLista = count($request['codigoSubLista']);
        for($i = 0; $i < $contadorSubLista; $i++)
        {
            \App\SubLista::create([
            'Lista_idLista' => $lista->idLista,
            'codigoSubLista' => $request['codigoSubLista'][$i],
            'nombreSubLista' => $request['nombreSubLista'][$i],
            ]);
        }

        return redirect('/lista');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $lista = \App\Lista::find($id);
        return view ('lista',['lista'=>$lista]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ListaRequest $request, $id)
    {
        $lista = \App\Lista::find($id);
        $lista->fill($request->all());
        $lista->save();

        \App\SubLista::where('Lista_idLista',$id)->delete();

        $contadorSubLista = count($request['codigoSubLista']);
        for($i = 0; $i < $contadorSubLista; $i++)
        {
            \App\SubLista::create([
            'Lista_idLista' => $id,
            'codigoSubLista' => $request['codigoSubLista'][$i],
            'nombreSubLista' => $request['nombreSubLista'][$i],
            ]);
        }
        

        return redirect('/lista');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\Lista::destroy($id);
        return redirect('/lista');
    }
}
