@extends('layouts.vista')
@section('titulo')<h3 id="titulo"><center>Documento</center></h3>@stop

@section('content')
@include('alerts.request')
{!!Html::script('js/ocultarsistema.js')!!}
{!!Html::script('js/ocultarconsulta.js')!!}


<?php 

$datos =  isset($documento) ? $documento->Documentopermiso : array();
//print_r($datos);

for($i = 0; $i < count($datos); $i++)
{
  $ids = explode(',', $datos[$i]["Rol_idRol"]);

   $nombres = DB::table('rol')
             ->select(DB::raw('group_concat(nombreRol) AS nombreRol'))
            ->whereIn('idRol',$ids)
            ->get();
  $vble = get_object_vars($nombres[0] );
  $datos[$i]["nombreRolPermiso"] = $vble["nombreRol"];
}

?>

<!-- DOCUMENTO PERMISOS -->
{!!Html::script('js/documentopermisos.js')!!}
<script>


    var idRol = '<?php echo isset($idRol) ? $idRol : "";?>';
    var nombreRol = '<?php echo isset($nombreRol) ? $nombreRol : "";?>';

    var documentopermiso = '<?php echo (isset($documento) ? json_encode($documento->Documentopermiso) : "");?>';
    documentopermiso = (documentopermiso != '' ? JSON.parse(documentopermiso) : '');
    var valorDocumentoPermisos = ['','',0,0,0,0,0,0,0];

    $(document).ready(function(){

      var stilocheck = 'width: 70px;height:30px;display:inline-block;';
      documentopermisos = new AtributosPermisos('documentopermisos','contenedor_documentopermisos','documentopermisos_');
      documentopermisos.campos   = ['Rol_idRol','nombreRolPermiso', 'cargarDocumentoPermiso', 'descargarDocumentoPermiso','eliminarDocumentoPermiso','modificarDocumentoPermiso','consultarDocumentoPermiso','correoDocumentoPermiso','imprimirDocumentoPermiso'];
      documentopermisos.etiqueta = ['input','input', 'checkbox','checkbox','checkbox','checkbox','checkbox','checkbox','checkbox',];
      documentopermisos.tipo     = ['hidden','text',       'checkbox','checkbox','checkbox','checkbox','checkbox','checkbox','checkbox',];
      documentopermisos.estilo   = ['width: 600px;height:35px;','width: 600px;height:35px', stilocheck, stilocheck, stilocheck, stilocheck, stilocheck, stilocheck, stilocheck];
      documentopermisos.clase    = ['','','','','','','','',''];
      documentopermisos.sololectura = [false,false,false,false,false,false,false,false,false];  
      documentopermisos.eventoclick = ['','','','','','','','',''];
      documentopermisos.nombreRol =  JSON.parse(nombreRol);
      documentopermisos.idRol =  JSON.parse(idRol);
      for(var j=0, k = documentopermiso.length; j < k; j++)
      {
        documentopermisos.agregarCamposPermisos(JSON.stringify(documentopermiso[j]),'L');
        console.log(JSON.stringify(documentopermiso[j]))
      }
        
    });

  </script>

  <!-- DOCUMENTO PROPIEDADES -->
{!!Html::script('js/documentopropiedades.js')!!}

  <script>

    var idLista = '<?php echo isset($idLista) ? $idLista : "";?>';
    var nombreLista = '<?php echo isset($nombreLista) ? $nombreLista : "";?>';

    var documentopropiedad = '<?php echo (isset($documento) ? json_encode($documento->Documentopropiedad) : "");?>';
    documentopropiedad = (documentopropiedad != '' ? JSON.parse(documentopropiedad) : '');

    var valorDocumentoPropiedades = [0,'','','',0,'',0,'',0];

    $(document).ready(function(){

      documentopropiedades = new AtributosPropiedades('documentopropiedades','contenedor_documentopropiedades','documentopropiedades_');
      documentopropiedades.campos   = ['ordenDocumentoPropiedad', 'tituloDocumentoPropiedad', 'campoDocumentoPropiedad','tipoDocumentoPropiedad','lista','Lista_idLista','longitudDocumentoPropiedad','valorDefectoDocumentoPropiedad','gridDocumentoPropiedad'];
      documentopropiedades.etiqueta = ['input', 'input','select1','select2','input','select3','input','input','checkbox'];
      documentopropiedades.tipo     = ['text','text','','','hidden','','text','text','checkbox',];
      documentopropiedades.estilo   = ['width: 60px;height:35px;','width: 210px;height:35px;','width: 210px;height:35px;','width: 150px;height:35px;','width: 150px;height:35px;','width: 150px;height:35px; disabled: true;','width: 70px;height:35px;','width: 210px;height:35px;','width: 70px;height:35px;display:inline-block;'];
      documentopropiedades.clase    = ['','','chosen-select','chosen-select','','chosen-select','','',''];
      documentopropiedades.nombreLista =  JSON.parse(nombreLista);
      documentopropiedades.idLista =  JSON.parse(idLista);
      documentopropiedades.sololectura = [false,false,false,false,false.true,false,false,false];
      documentopropiedades.eventochange = ['','','','activarLista(this.id)','','enviarid(this.id, this.value)','','',''];
      documentopropiedades.valorTipo =  Array("Texto", "Fecha", "Numero", "Hora", "Lista", "Editor");
      documentopropiedades.nombreTipo =  Array("Texto", "Fecha", "Numero", "Hora", "Lista", "Editor");
      documentopropiedades.valorCampo =  Array("Seleccione");
      documentopropiedades.nombreCampo =  Array("Seleccione");

      for(var j=0, k = documentopropiedad.length; j < k; j++)
      {
        documentopropiedades.agregarCamposPropiedades(JSON.stringify(documentopropiedad[j]),'L');
        document.getElementById("lista"+j).value = document.getElementById('Lista_idLista'+j).value;
        activarLista(document.getElementById("tipoDocumentoPropiedad"+j).id);

      }

    });

  </script>

  @if(isset($documento))
    @if(isset($_GET['accion']) and $_GET['accion'] == 'eliminar')
      {!!Form::model($documento,['route'=>['documento.destroy',$documento->idDocumento],'method'=>'DELETE'])!!}
    @else
      {!!Form::model($documento,['route'=>['documento.update',$documento->idDocumento],'method'=>'PUT'])!!}
    @endif
  @else
    {!!Form::open(['route'=>'documento.store','method'=>'POST'])!!}
  @endif

<div id='form-section'>

  
  <fieldset id="documento-form-fieldset"> 
    <div class="form-group" id='test'>
          {!! Form::label('codigoDocumento', 'C&oacute;digo', array('class' => 'col-sm-2 control-label')) !!}
          <div class="col-sm-10">
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-barcode"></i>
              </span>
              {!!Form::text('codigoDocumento',null,['class'=>'form-control','placeholder'=>'Ingresa el código del documento'])!!}
              {!! Form::hidden('idDocumento', null, array('id' => 'idDocumento')) !!}
            </div>
          </div>
        </div>

        {!! Form::hidden('registro', null, array('id' => 'registro')) !!}
    
        <div class="form-group" id='test'>
          {!! Form::label('nombreDocumento', 'Nombre', array('class' => 'col-sm-2 control-label')) !!}
          <div class="col-sm-10">
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-pencil-square-o "></i>
              </span>
              {!!Form::text('nombreDocumento',null,['class'=>'form-control','placeholder'=>'Ingresa el nombre del documento'])!!}
            </div>
          </div>
        </div>

        <div class="form-group" id='test'>
          {!! Form::label('directorioDocumento', 'Directorio', array('class' => 'col-sm-2 control-label')) !!}
          <div class="col-sm-10">
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-folder-open"></i>
              </span>
              {!!Form::text('directorioDocumento',null,['class'=>'form-control','placeholder'=>'Ingresa el directorio del documento'])!!}
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="col-lg-12">
            <div class="panel panel-default">
              <div class="panel-heading">Detalles</div>
              <div class="panel-body">
                <div class="panel-group" id="accordion">
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#conexionDocumento">Conexi&oacute;n</a>
                      </h4>
                    </div>
                    <div id="conexionDocumento" class="panel-collapse collapse">
                      <div class="panel-body">

                          <div class="form-group" id='test'>
                            {!! Form::label('origenDocumento', 'Origen', array('class' => 'col-sm-2 control-label')) !!}
                            <div class="col-sm-6">
                              <div class="input-group">
                                {!!Form::radio('origenDocumento', '2', true, ['onclick' => 'ocultarSistema(this)'])!!} Sistema
                                &nbsp;
                                {!!Form::radio('origenDocumento', '1', false, ['onclick' => 'ocultarSistema(this)'])!!} Manual
                              </div>
                            </div>
                            </div>
                            </br>

                          <div id="sistemainformacion">
                            <div class="form-group" id='test'>
                              {!! Form::label('SistemaInformacion_idSistemaInformacion', 'Sistema de informaci&oacute;n', array('class' => 'col-sm-2 control-label')) !!}
                              <div class="col-sm-10">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="fa fa-paper-plane   "></i>
                                  </span>
                                {!!Form::select('SistemaInformacion_idSistemaInformacion',$sistemainformacion, (isset($documento) ? $documento->SistemaInformacion_idSistemaInformacion : 0),['class'=>'select form-control','placeholder'=>'Selecciona el sistema de informaci&oacute;n'])!!}
                                </div>
                              </div>
                              </br>
                            </div>

                            </div>
                          

                            <div class="form-group" id='test'>
                            {!! Form::label('tipoConsultaDocumento', 'Tipo de consulta', array('class' => 'col-sm-2 control-label')) !!}
                            <div class="col-sm-6">
                              <div class="input-group">
                                {!!Form::radio('tipoConsultaDocumento', '1', true, ['onclick' => 'ocultarConsulta(this)'])!!} Tabla
                                &nbsp;
                                {!!Form::radio('tipoConsultaDocumento', '2', false, ['onclick' => 'ocultarConsulta(this)'])!!} Vista
                                &nbsp;
                                {!!Form::radio('tipoConsultaDocumento', '3', false, ['onclick' => 'ocultarConsulta(this)'])!!} SQL
                                &nbsp;
                                {!!Form::radio('tipoConsultaDocumento', '4', false, ['onclick' => 'ocultarConsulta(this)'])!!} Ninguna
                              </div>
                            </div>
                            </div>
                            </br>

                            <div id="lista">
                            <div class="form-group" id='test'>
                              {!! Form::label('tablaDocumento', 'Tabla / Vista', array('class' => 'col-sm-2 control-label')) !!}
                              <div class="col-sm-10">
                                <div class="input-group">
                                  <span class="input-group-addon">
                                    <i class="fa fa-paper-plane-o  "></i>
                                  </span>
                                {!!Form::select('tablaDocumento',array('Seleccione'), (isset($documento) ? $documento ->tablaDocumento : 0),['class'=>'select form-control','placeholder'=>'Selecciona un campo'])!!}
                                </div>
                              </div>
                            </div>
                          </div>


                            <div id="consulta">
                              <div class="form-group" id='test'>
                                  {!!Form::label('consultaDocumento', 'Consulta', array('class' => 'col-sm-2 control-label')) !!}
                                  <div class="col-sm-10">
                                    <div class="input-group">
                                      <span class="input-group-addon">
                                        <i class="fa fa-search "></i>
                                      </span>
                                {!!Form::textarea('consultaDocumento',null,['class'=>'form-control','style'=>'height:100px','placeholder'=>'Ingresa la consulta'])!!}
                                    </div>
                              </div>
                              </div>
                            </div>
                            </div>
                          </div>
                        </div>  
                      
                  
                  <div class="panel panel-default">
                    <div class="panel-heading">

                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#propiedadDocumento">Propiedades</a>
                      </h4>
                    </div>
                   <div id="propiedadDocumento" class="panel-collapse collapse">
                      <div class="panel-body">
                        <div class="form-group" id='test'>
                          <div class="col-sm-10" style="width: 100%;">
                            <div class="panel-body">
                              <div class="form-group" id='test'>
                                <div class="col-sm-12">
                                  <div class="row show-grid">
                                    <div class="col-md-1" style="width: 40px;" onclick="documentopropiedades.agregarCamposPropiedades(valorDocumentoPropiedades,'A');">
                                      <span class="glyphicon glyphicon-plus"></span>
                                    </div>
                                    <div class="col-md-1" style="width: 60px;">Orden</div>
                                    <div class="col-md-1" style="width: 210px;">Titulo</div>
                                    <div class="col-md-1" style="width: 210px;">Campo</div>
                                    <div class="col-md-1" style="width: 150px;">Tipo</div>
                                    <div class="col-md-1" style="width: 150px;">Lista</div>
                                    <div class="col-md-1" style="width: 70px;">Long</div>
                                    <div class="col-md-1" style="width: 210px;">Default</div>
                                    <div class="col-md-1" style="width: 70px;">Grid</div>
                                    <div id="contenedor_documentopropiedades">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>  
                      </div>
                    </div>
                  </div>  
                  <div class="panel panel-default">
                    <div class="panel-heading">
                      <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#permisoDocumento">Permisos</a>
                      </h4>
                    </div>
                    <div id="permisoDocumento" class="panel-collapse collapse">
                      <div class="panel-body">
                        <div class="form-group" id='test'>
                          <div class="col-sm-10" style="width: 100%;">
                            <div class="panel-body">
                              <div class="form-group" id='test'>
                                <div class="col-sm-12">
                                  <div class="row show-grid">
                                    <div class="col-md-1" style="width: 40px;" onclick="mostrarModalRol(this.id)">
                                      <span class="glyphicon glyphicon-plus"></span>
                                    </div>
                                    <div class="col-md-1" style="width: 600px;">Rol</div>
                                    <div class="col-md-1" style="width: 70px;"><center><span title="Adicionar" class="fa fa-upload"></span></center></div>
                                    <div class="col-md-1" style="width: 70px;"><center><span title="Descargar" class="fa fa-download "></span></center></div>
                                    <div class="col-md-1" style="width: 70px;"><center><span title="Eliminar / Anular" class="fa fa-trash"></span></center></div>
                                    <div class="col-md-1" style="width: 70px;"><center><span title="Modificar" class="fa fa-pencil"></span></center></div>
                                    <div class="col-md-1" style="width: 70px;"><center><span title="Consultar" class="fa fa-search "></span></center></div>
                                    <div class="col-md-1" style="width: 70px;"><center><span title="Email" class="fa fa-envelope-o "></span></center></div>
                                    <div class="col-md-1" style="width: 70px;"><center><span title="Imprimir" class="fa fa-print"></span></center></div>
                                    <div id="contenedor_documentopermisos">
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>  
                      </div>
                    </div>
                  </div>
                  </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div> 
                    </div>
    </fieldset>
    <!-- Modal -->
<div id="myModalRol" class="modal fade" role="dialog">
  <div class="modal-dialog" style="width:1000px;">

    <!-- Modal content-->
    <div style="" class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Selecci&oacute;n de Roles</h4>
      </div>
      <div class="modal-body">
        <iframe style="width:100%; height:500px; " id="rol" name="rol" src="{!! URL::to ('rolselect')!!}"> </iframe> 
      </div>
    </div>
  </div>
</div>
    </div>

  @if(isset($documento))
    @if(isset($_GET['accion']) and $_GET['accion'] == 'eliminar')
        {!!Form::submit('Eliminar',["class"=>"btn btn-primary"])!!}
      @else
        {!!Form::submit('Modificar',["class"=>"btn btn-primary"])!!}
      @endif
  @else
      {!!Form::submit('Adicionar',["class"=>"btn btn-primary"])!!}
  @endif
  {!!Form::close()!!}
  </div>
</div>
@stop