<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\DependenciaRequest;
use App\Http\Controllers\Controller;

class DependenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //DependenciaGrid
        return view('DependenciaGrid');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dependencia');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DependenciaRequest $request)
    {
        \App\Dependencia::create([
        'codigoDependencia' => $request['codigoDependencia'],
        'nombreDependencia' => $request['nombreDependencia'],
        'abreviaturaDependencia' => $request['abreviaturaDependencia'],
        ]);

        $dependencia = \App\Dependencia::All()->last();
        $contadorFuncion = count($request['numeroFuncion']);
        for($i = 0; $i < $contadorFuncion; $i++)
        {
            \App\Funcion::create([
            'Dependencia_idDependencia' => $dependencia->idDependencia,
            'numeroFuncion' => $request['numeroFuncion'][$i],
            'descripcionFuncion' => $request['descripcionFuncion'][$i]
            ]);
        }
            return redirect('/dependencia');
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
        $dependencia = \App\Dependencia::find($id);
        return view ('dependencia',['dependencia'=>$dependencia]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DependenciaRequest $request, $id)
    {
        $dependencia = \App\Dependencia::find($id);
        $dependencia->fill($request->all());
        $dependencia->save();

        \App\Funcion::where('Dependencia_idDependencia',$id)->delete();
        $contadorFuncion = count($request['numeroFuncion']);
        for($i = 0; $i < $contadorFuncion; $i++)
        {
            \App\Funcion::create([
            'Dependencia_idDependencia' => $id,
            'numeroFuncion' => $request['numeroFuncion'][$i],
            'descripcionFuncion' => $request['descripcionFuncion'][$i]
            ]);
        }

        return redirect('/dependencia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\Dependencia::destroy($id);
        return redirect('/dependencia');
    }
}
