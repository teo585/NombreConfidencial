<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\DocumentoRequest;
use App\Http\Controllers\Controller;
use DB;
use Config;

class DocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
{
        return view ('DocumentoGrid');
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $idRol = \App\Rol::All()->lists('idRol');
        $nombreRol = \App\Rol::All()->lists('nombreRol');
        $sistemainformacion = \App\SistemaInformacion::All()->lists('nombreSistemaInformacion','idSistemaInformacion');
        $idLista = \App\Lista::All()->lists('idLista');
        $nombreLista = \App\Lista::All()->lists('nombreLista');

        return view('documento',compact('idRol','nombreRol','sistemainformacion','idLista','nombreLista'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DocumentoRequest $request)
    {
        \App\Documento::create([
        'codigoDocumento' => $request['codigoDocumento'],
        'nombreDocumento' => $request['nombreDocumento'],
        'directorioDocumento' => $request['directorioDocumento'],
        'origenDocumento' => $request['origenDocumento'],
        'SistemaInformacion_idSistemaInformacion' => $request['SistemaInformacion_idSistemaInformacion'],
        'tipoConsultaDocumento' => $request['tipoConsultaDocumento'],
        'tablaDocumento' => $request['tablaDocumento'],
        'consultaDocumento' => $request['consultaDocumento']
        ]);
        $documento = \App\Documento::All()->last();
        $contadorDocumentoPropiedad = count($request['ordenDocumentoPropiedad']);
        for($i = 0; $i < $contadorDocumentoPropiedad; $i++)
        {
            \App\DocumentoPropiedad::create([
            'Documento_idDocumento' => $documento->idDocumento,
            'ordenDocumentoPropiedad' => $request['ordenDocumentoPropiedad'][$i],
            'tituloDocumentoPropiedad' => $request['tituloDocumentoPropiedad'][$i],
            'campoDocumentoPropiedad' => $request['campoDocumentoPropiedad'][$i],
            'tipoDocumentoPropiedad' => $request['tipoDocumentoPropiedad'][$i],
            'Lista_idLista' => $request['lista'][$i],
            'longitudDocumentoPropiedad' => $request['longitudDocumentoPropiedad'][$i],
            'valorDefectoDocumentoPropiedad' => $request['valorDefectoDocumentoPropiedad'][$i],
            'gridDocumentoPropiedad' => $request['gridDocumentoPropiedad'][$i]
            ]);
        }

        $documento = \App\Documento::All()->last();
        $contadorDocumentoPermiso = count($request['cargarDocumentoPermiso']);
        for($i = 0; $i < $contadorDocumentoPermiso; $i++)
        {
            \App\DocumentoPermiso::create([
            'Documento_idDocumento' => $documento->idDocumento,
            'Rol_idRol' => $request['Rol_idRol'][$i],
            'cargarDocumentoPermiso' => $request['cargarDocumentoPermiso'][$i],
            'descargarDocumentoPermiso' => $request['descargarDocumentoPermiso'][$i],
            'eliminarDocumentoPermiso' => $request['eliminarDocumentoPermiso'][$i],
            'modificarDocumentoPermiso' => $request['modificarDocumentoPermiso'][$i],
            'consultarDocumentoPermiso' => $request['consultarDocumentoPermiso'][$i],
            'correoDocumentoPermiso' => $request['correoDocumentoPermiso'][$i],
            'imprimirDocumentoPermiso' => $request['imprimirDocumentoPermiso'][$i]
            ]);
        }
        return redirect('/documento');
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
        $documento = \App\Documento::find($id);
        $idRol = \App\Rol::All()->lists('idRol');
        $nombreRol = \App\Rol::All()->lists('nombreRol');
        $sistemainformacion = \App\SistemaInformacion::All()->lists('nombreSistemaInformacion','idSistemaInformacion');
        $idLista = \App\Lista::All()->lists('idLista');
        $nombreLista = \App\Lista::All()->lists('nombreLista');

        return view('documento',compact('idRol','nombreRol','sistemainformacion','idLista','nombreLista'), ['documento' => $documento]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DocumentoRequest $request, $id)
    {
        $documento = \App\Documento::find($id);
        $documento->fill($request->all());
        $documento->save();

        \App\DocumentoPropiedad::where('Documento_idDocumento',$id)->delete();
        \App\DocumentoPermiso::where('Documento_idDocumento',$id)->delete();
        $contadorDocumentoPropiedad = count($request['ordenDocumentoPropiedad']);
        for($i = 0; $i < $contadorDocumentoPropiedad; $i++)
        {
            \App\DocumentoPropiedad::create([
            'Documento_idDocumento' => $id,
            'ordenDocumentoPropiedad' => $request['ordenDocumentoPropiedad'][$i],
            'tituloDocumentoPropiedad' => $request['tituloDocumentoPropiedad'][$i],
            'campoDocumentoPropiedad' => $request['campoDocumentoPropiedad'][$i],
            'tipoDocumentoPropiedad' => $request['tipoDocumentoPropiedad'][$i],
            'Lista_idLista' => $request['lista'][$i],
            'longitudDocumentoPropiedad' => $request['longitudDocumentoPropiedad'][$i],
            'valorDefectoDocumentoPropiedad' => $request['valorDefectoDocumentoPropiedad'][$i],
            'gridDocumentoPropiedad' => $request['gridDocumentoPropiedad'][$i]
            ]);
        }

        $documento = \App\Documento::All()->last();
        $contadorDocumentoPermiso = count($request['cargarDocumentoPermiso']);
        for($i = 0; $i < $contadorDocumentoPermiso; $i++)
        {
            \App\DocumentoPermiso::create([
            'Documento_idDocumento' => $id,
            'Rol_idRol' => $request['Rol_idRol'][$i],
            'cargarDocumentoPermiso' => $request['cargarDocumentoPermiso'][$i],
            'descargarDocumentoPermiso' => $request['descargarDocumentoPermiso'][$i],
            'eliminarDocumentoPermiso' => $request['eliminarDocumentoPermiso'][$i],
            'modificarDocumentoPermiso' => $request['modificarDocumentoPermiso'][$i],
            'consultarDocumentoPermiso' => $request['consultarDocumentoPermiso'][$i],
            'correoDocumentoPermiso' => $request['correoDocumentoPermiso'][$i],
            'imprimirDocumentoPermiso' => $request['imprimirDocumentoPermiso'][$i]
            ]);
        }


        return redirect('/documento');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        \App\Documento::destroy($id);
        return redirect('/documento');
    }
}
