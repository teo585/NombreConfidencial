<!DOCTYPE html>
<html >
  <head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
      <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
      <link rel="stylesheet" href="css/normalize.css">
      <link rel="stylesheet" href="css/style.css">
    @yield('clases')
    <title>Software</title>

    
</head>


<body>

<div class="col-md-12">
<div class="col-md-3" style="left:-30px ; right: ">
<section class="app" >
  <aside class="sidebar">
      <header >
      <center><strong >Menu</strong></center>
      </header> 

  <nav class="sidebar-nav">
    <ul>
 
  <!-- MAESTROS -->
  <li>
     <a href="#"><i class="fa fa-folder" aria-hidden="true"></i><span>Maestros</span></a>
     
     <ul class="nav-flyout">
         <li>
              <a href="dependencia"><i class="ion-ios-pie"></i>Dependencias</a>
         </li>
        <li>
             <a href="documento"><i class="fa fa-file-text" aria-hidden="true"></i>Documento</a>
        </li>
            <li>
              <a href="serie"><i class="fa fa-sitemap" aria-hidden="true"></i>Serie</a>
            </li>
            <li>
              <a href="lista"><i class="fa fa-th-list" aria-hidden="true"></i>Listas</a>
            </li>
            <li>
              <a href="sistemasinformacion"><i class="fa fa-database" aria-hidden="true"></i>Sistemas de Informacion</a>
            </li>
            <li>
              <a href="normograma"><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Normograma</a>
            </li>
            <li>
              <a href="sitioweb"><i class="fa fa-globe" aria-hidden="true"></i>Sitios Web</a>
            </li>
            <li>
              <a href="etiqueta"><i class="fa fa-tags" aria-hidden="true"></i>Etiquetas</a>
            </li>
     </ul>
    
  </li>

  <!-- TABLAS -->
        <li>
          <a href="#"><i class="fa fa-table" aria-hidden="true"></i> <span class="">Tablas</span></a>
          <ul class="nav-flyout">
            <li>
              <a href="#"><i class="fa fa-folder-open"></i>Retencion Documental(TRD)</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-list-alt" aria-hidden="true" ></i>Clasificacion Documental(CCD)</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-check-square" aria-hidden="true"></i>Control de Informes(CCI)</a>
            </li>
          </ul>
        </li>

  <!-- MOVIMIENTO -->
        <li>
        <a href="#"><i class="fa fa-cloud" aria-hidden="true"></i><span >Movimiento</span></a>
          
          <ul class="nav-flyout">
            <li>
            <a href="#"><i class="fa fa-pencil-square" aria-hidden="true"></i>Radicar archivos</a>
            </li>
             <li>
              <a href="#"><i class="fa fa-search-plus" aria-hidden="true"></i>Consultar Archivos</a>
             </li>
          </ul>
        </li>


  <!-- SEGURIDAD -->
        <li>
          <a href="#"><i class="fa fa-lock" aria-hidden="true"></i><span class="">Seguridad</span></a>
          <ul class="nav-flyout">
            <li>
              <a href="#"><i class="fa fa-users" aria-hidden="true"></i>Usuarios</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-user-secret" aria-hidden="true"></i>Rol</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-dropbox" aria-hidden="true"></i>Paquetes</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-cog"></i>Opciones</a>
            </li>
            <li>
              <a href="#"><i class="fa fa-home" aria-hidden="true"></i>Compañía</a>
            </li>
          </ul>
        </li>

  <!-- SALIR -->
        <li>
          <a href="index"><i class="fa fa-power-off" aria-hidden="true"></i><span class="">Logout </span></a>
        </li>


</ul>
  

</nav>
  </aside>

</section>
</div>

<div class="col-md-9">
  <div class="col-md-12" style="overflow: visible; left: -100px; ">
          <div id="contenedor">
                @yield('titulo')
                <br/>
            </div>
            
            <div  id="contenedor-fin">
                <div id="pantalla" >
                   @yield('content') 
                </div>
            </div>
    </div>
</div>
</div>
</body>
  
</html>