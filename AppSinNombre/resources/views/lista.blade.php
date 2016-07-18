@extends('layouts.vista')
@section('titulo')<h3 id="titulo"><center>Lista</center></h3>@stop

@section('content')

{!!Html::script('js/lista.js')!!}
<script>


    var sublista = '<?php echo (isset($lista) ? json_encode($lista->sublistas) : "");?>';
    sublista = (sublista != '' ? JSON.parse(sublista) : '');
    var valorlista = ['',''];

    $(document).ready(function(){


      lista = new Atributos('lista','contenedor_lista','lista_');
      lista.campos   = ['codigoSubLista', 'nombreSubLista'];
      lista.etiqueta = ['input', 'input'];
      lista.tipo     = ['text', 'text'];
      lista.estilo   = ['width: 300px;height:35px;','width: 900px;height:35px;'];
      lista.clase    = ['',''];
      lista.sololectura = [false,false];
      for(var j=0, k = sublista.length; j < k; j++)
      {
        lista.agregarCampos(JSON.stringify(sublista[j]),'L');
      }

    });

  </script>




<div id='form-section' >

	<fieldset id="lista-form-fieldset">



		<div class="form-group" id='test'>
          {!!Form::label('codigoLista', 'C&oacute;digo', array('class' => 'col-sm-2 control-label')) !!}
          <div class="col-sm-10">
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-barcode"></i>
              </span>
              {!!Form::text('codigoLista',null,['class'=>'form-control','placeholder'=>'Ingresa el código de la lista'])!!}
              {!!Form::hidden('idLista', null, array('id' => 'idLista')) !!}
            </div>
          </div>
        </div>


		
		<div class="form-group" id='test'>
          {!!Form::label('nombreLista', 'Nombre', array('class' => 'col-sm-2 control-label')) !!}
          <div class="col-sm-10">
            <div class="input-group">
              <span class="input-group-addon">
                <i class="fa fa-pencil-square-o "></i>
              </span>
				{!!Form::text('nombreLista',null,['class'=>'form-control','placeholder'=>'Ingresa el nombre de la lista'])!!}
            </div>
          </div>


          </br>
          </br>
          </br>
          </br>
          </br>
        <h4 id="titulo"><center>Opciones</center></h4>
        <div class="panel-body">
          <div class="form-group" id='test'>
            <div class="col-sm-12">
              <div class="row show-grid">
                <div class="col-md-1" style="width: 40px;" onclick="lista.agregarCampos(valorlista,'A')">
                  <span class="glyphicon glyphicon-plus"></span>
                </div>
                <div class="col-md-1" style="width: 300px;">C&oacute;digo</div>
                <div class="col-md-1" style="width: 900px;">Nombre</div>
                <div id="contenedor_lista">
                </div>
              </div>
            </div>
          </div>
        </div>

    </fieldset>

	</div>
</div>
@stop