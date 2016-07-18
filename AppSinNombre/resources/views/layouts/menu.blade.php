<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
 <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css'>

    {!!Html::style('css/menunaranjado.css'); !!}
    @yield('clases')

   <title>SCARGET</title>
</head>
<body >

    <div class="head">
        <div class="form-group">
        <!--<div class="col-md-1">
                {!! HTML::decode(HTML::link('index', HTML::image('imagenes/logosgd.png','Imagen no encontrada',array('title' => 'Scarget')))) !!}
            </div>-->



<div class="row">
  <div class="col-md-8">

        <div class="menu">
                          
          <div class="container">
           <nav >
                <div class="brand"><a href="index">SCARGET</a></div>
                <ul class="menu" >

<!-- MAESTROS -->
                    <li class="dropdown-btn"><a href="index"><span>Maestros </span><i class="fa fa-folder" aria-hidden="true"></i></a>
                    <div class="dropdown-content">
                    <a href="dependencia"><i class="ion-ios-pie"></i> Dependencias</a>
                       
                       <!-- esto sirve para que el usuario vea un comentario
                        <a href="#">Search all files
                            <span class="after">Ctrl+Shift+F</span>
                        </a> -->
                                              
                        <hr>

                        <a href="#"><i class="fa fa-file-text" aria-hidden="true"></i> Documento</a>
                        <hr>
                        
                        <a href="#"><i class="fa fa-sitemap" aria-hidden="true"></i> Serie</a>
                        <hr>
                        
                        <a href="#"><i class="fa fa-th-list" aria-hidden="true"></i> Listas</a>
                        <hr>
                        
                        <a href="#"><i class="fa fa-database" aria-hidden="true"></i> Sistemas de Informacion</a>
                        <hr>
                        
                        <a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Normograma</a>
                        <hr>
                        <a href="#"><i class="fa fa-globe" aria-hidden="true"></i> Sitios Web</a>
                        <hr >

                        <a href="#"><i class="fa fa-tags" aria-hidden="true"></i> Etiquetas</a>
                      
                    </div><!-- End Dropdown content -->
                    </li>



<!-- TABLAS -->
                    <li class="dropdown-btn"><a href="#"><span class="">Tablas </span><i class="fa fa-table" aria-hidden="true"></i> </a>
                    <div class="dropdown-content">

                    <a href="#"><i class="fa fa-folder-open"></i> Retencion Documental(TRD)</a>
                    <hr>
                    <a href="#"><i class="fa fa-list-alt" aria-hidden="true" ></i> Clasificacion Documental(CCD)</a>
                    <hr>
                    <a href="#"><i class="fa fa-check-square" aria-hidden="true"></i> Control de Informes(CCI)</a>
                        
                        
                       

                    </div><!-- End Dropdown content -->
                    </li>
                   
  <!-- MOVIMIENTO -->
        <li class="dropdown-btn">
           <a href="#"><span >Movimiento </span><i class="fa fa-cloud" aria-hidden="true"></i></a>
        
        
           <div class="dropdown-content">
            <a href="#"><i class="fa fa-pencil-square" aria-hidden="true"></i> Radicar archivos</a>
            <hr>
            <a href="#"><i class="fa fa-search-plus" aria-hidden="true"></i> Consultar Archivos</a>
            
        </div><!-- End Dropdown content -->
        </li>


<!-- SEGURIDAD -->
        <li class="dropdown-btn">
            <a href="#"><span class="">Seguridad </span><i class="fa fa-lock" aria-hidden="true"></i></a>
        
        
           <div class="dropdown-content">
            <a href="#"><i class="fa fa-users" aria-hidden="true"></i> Usuarios</a>
            <hr>
            <a href="#"><i class="fa fa-user-secret" aria-hidden="true"></i> Rol</a>
            <hr>
            <a href="#"><i class="fa fa-dropbox" aria-hidden="true"></i> Paquetes</a>
            <hr>
            <a href="#"><i class="fa fa-cog"></i> Opciones</a>
            <hr>
            <a href="#"><i class="fa fa-home" aria-hidden="true"></i> Compañía</a>
        </div><!-- End Dropdown content -->
        </li>
<!-- SALIR --> 

            <li class="dropdown-btn" >
            <a href="index"><span class=""> Logout </span><i class="fa fa-power-off" aria-hidden="true"></i></a>
            </li>

                </ul> <!-- End LISTAS -->
            </nav>

        </div><!-- End Container Div -->
      


                        </div>  
                    </div>  
                </div>  
        </div>
    </div>





    <div id="contenedor">
        @yield('titulo')
    </div>
    <div id="contenedor-fin">
        <div id="pantalla">
           @yield('content') 
        </div>
    </div>
  


</body>
</html>
