@extends('layouts.grid')
@section('titulo')<h3 id="titulo"><center>Serie</center></h3>@stop

@section('content')
@include('alerts.request')

<style>
    tfoot input {
                width: 100%;
                padding: 3px;
                background-color: #fff;
                background-image: none;
                border: 1px solid #ccc;
                border-radius: 4px;
            }
</style>      



    <!--Boton desplegable dropdown-->
    <div class="btn-group" style="margin-left: 94%;margin-bottom:10px" title="Columns">
        <button type="button" class="btn btn-default dropdown-toggle"data-toggle="dropdown">
            <i class="glyphicon glyphicon-th icon-th"></i> 
            <span class="caret"></span>
        </button>
        <ul class="dropdown-menu dropdown-menu-right" role="menu">
            <li><a class="toggle-vis" data-column="0"><label> Iconos</label></a></li>
            <li><a class="toggle-vis" data-column="1"><label> ID</label></a></li>
            <li><a class="toggle-vis" data-column="2"><label> Directorio</label></a></li>
            <li><a class="toggle-vis" data-column="3"><label> C&oacute;digo</label></a></li>
            <li><a class="toggle-vis" data-column="4"><label> Nombre</label></a></li>
        </ul>
    </div>


    <!--tabla-->
    <table id="tserie" name="tserie" class="display table-bordered" width="100%">
        <thead>
          
            <tr class="btn-default active">
             <th style="width:50px;padding: 6px 8px;" data-orderable="false">
                {!!Html::link('serie/create','',array('class' => 'glyphicon glyphicon-plus'))!!}
                <a href="#"><span class="glyphicon glyphicon-refresh"></span></a>
            </th>
            <th><b>ID</b></th>
            <th><b>Directorio</b></th>
            <th><b>C&oacute;digo</b></th>
            <th><b>Nombre</b></th>
        </tr>
    </thead>
    <!--segunda fila-->
    <tfoot>
        <tr class="btn-default active">
            <th style="width:80px;padding: 1px 8px;">
                &nbsp;
            </th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </tfoot>
</table>



@stop