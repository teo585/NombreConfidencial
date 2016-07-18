@extends('layouts.vista')
@section('titulo')<h3 id="titulo"><center>Dependencia</center></h3>@stop

@section('content')

@include('alerts.request')

{!!Html::script('js/dependencia.js')!!}
<script>
    var funcion = '<?php echo (isset($dependencia) ? json_encode($dependencia->funciones) : "");?>';
    funcion = (funcion != '' ? JSON.parse(funcion) : '');
    var valorDependencia = ['',''];

    $(document).ready(function(){


      dependencia = new Atributos('dependencia','contenedor_dependencia','dependencia_');
      dependencia.campos   = ['numeroFuncion', 'descripcionFuncion'];
      dependencia.etiqueta = ['input', 'input'];
      dependencia.tipo     = ['text', 'text'];
      dependencia.estilo   = ['width: 200px;height:35px;','width: 1000px;height:35px'];
      dependencia.clase    = ['',''];
      dependencia.sololectura = [false,false];
      for(var j=0, k = funcion.length; j < k; j++)
      {
        dependencia.agregarCampos(JSON.stringify(funcion[j]),'L');
      }

    });

  </script>



<div id='form-section' >

  <fieldset id="dependencia-form-fieldset"> 
    <div class="form-group" id='test'>
          {!!Form::label('codigoDependencia', 'C&oacute;digo', array('class' => 'col-sm-2 control-label')) !!}
          <div class="col-sm-10">
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-barcode"></i>
              </span>
              {!!Form::text('codigoDependencia',null,['class'=>'form-control','placeholder'=>'Ingresa el código del sistema de la dependencia'])!!}
              {!!Form::hidden('idDependencia', null, array('id' => 'idDependencia')) !!}
            </div>
          </div>
        </div>


    
    <div class="form-group" id='test'>
          {!!Form::label('nombreDependencia', 'Nombre', array('class' => 'col-sm-2 control-label')) !!}
          <div class="col-sm-10">
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-pencil-square-o "></i>
              </span>
        {!!Form::text('nombreDependencia',null,['class'=>'form-control','placeholder'=>'Ingresa el nombre de la dependencia'])!!}
            </div>
          </div>



      <div class="form-group" id='test'>
          {!!Form::label('abreviaturaDependencia', 'Abreviatura', array('class' => 'col-sm-2 control-label')) !!}
          <div class="col-sm-10">
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-font  "></i>
              </span>
        {!!Form::text('abreviaturaDependencia',null,['class'=>'form-control','placeholder'=>'Ingresa la abreviatura de la dependencia'])!!}
            </div>
          </div>


<h3 id="titulo"><left>Funciones</left></h3>
        <div class="panel-body">
          <div class="form-group" id='test'>
            <div class="col-sm-12">
              <div class="row show-grid">
                <div class="col-md-1" style="width: 40px;" onclick="dependencia.agregarCampos(valorDependencia,'A')">
                  <span class="glyphicon glyphicon-plus"></span>
                </div>
                <div class="col-md-1" style="width: 200px;">N&uacute;mero</div>
                <div class="col-md-1" style="width: 1000px;">Descripc&oacute;n</div>
                <div id="contenedor_dependencia"> 
                </div>
              </div>
            </div>
          </div>
        </div>

    </fieldset>

	
	</div>

@stop