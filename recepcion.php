<!DOCTYPE html>
<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];




$consulta = "SELECT
id_folio, nombre, apellidos,direccion, celular, correo, puntos
FROM
clientes ORDER BY fecha desc";
$avisos = "SELECT
*
FROM avisos where tipo= 'Traslado' and estado='pendiente'";

$num_avisos = "SELECT COUNT(*) FROM avisos where tipo= 'Traslado' and estado='pendiente'";

?>
<html lang="es">
  <head>
<script src="assets\js\push.js/push.min.js" > </script>

<script src="assets\js\plugins/bootstrap-notify.min.js"></script>




    <!-- Open Graph Meta-->
    <title>Recepcion</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">

    <!-- Font-icon css-->
  <link href= "assets/css/themify-icons.css" rel="stylesheet">
<link rel="shortcut icon" href="assets/img/favicon.ico">
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html">ID de Usuario: <?php echo $var_clave ?></a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button"><i class="ti-search"></i></button>
        </li>
        <!--Notification Menu-->
        <?php
          $ejec0 = mysqli_query($conn, $num_avisos);
        while($fila=mysqli_fetch_array($ejec0)){
            $num_avi     = $fila['COUNT(*)'];

      }
      ?>
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="ti-bell"></i></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">Tienes <?php echo $num_avi ?> nuevas notificaciones</li>

            <div class="app-notification__content">
            <?php
            $ejec = mysqli_query($conn, $avisos);
            while($fila=mysqli_fetch_array($ejec)){
            $avi     = $fila['aviso'];
            $fech_avi     = $fila['fecha'];
            ?>

              <li><a class="app-notification__item" href="javascript:;">

                  <div>
                    <p class="app-notification__message"><?php echo $avi; ?></p>
                    <p class="app-notification__meta"><?php echo $fech_avi; ?></p>
                  </div></a></li>
                <?php } ?>

            </div>
            <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
          </ul>
        </li>
        <!-- User Menu-->
        <a class="app-nav__item" href="destroy.php"><i class="ti-shift-left"></i></a>


      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">



      </div>
      <ul class="app-menu">
      <li><a class="app-menu__item" href="#"><i class="app-menu__icon ti-user"></i><span class="app-menu__label"> <?php echo $var_name ?></span></a></li>
      <li><a class="app-menu__item" href="Recepcion.php"><i class="app-menu__icon ti-headphone-alt"></i><span class="app-menu__label">Recepción</span></a></li>
      <li><a class="app-menu__item" href="taller.php"><i class="app-menu__icon ti-settings"></i><span class="app-menu__label">Taller</span></a></li>
      <li><a class="app-menu__item" href="ml.php"><i class="app-menu__icon ti-shopping-cart-full"></i><span class="app-menu__label">MercadoLibre</span></a></li>
      <li><a class="app-menu__item" href="traslado.php"><i class="app-menu__icon ti-truck"></i><span class="app-menu__label">Traslados</span></a></li>
      <li><a class="app-menu__item" href="almacen.php"><i class="app-menu__icon ti-archive"></i><span class="app-menu__label">Almacen</span></a></li>
      <li><a class="app-menu__item" href="#"><i class="app-menu__icon ti-star"></i><span class="app-menu__label">Administración</span></a></li>
</ul>




    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Recepción</h1>
          <p>Dar un buen servicio es nuestra prioridad</p>
        </div>

      </div>





<div class="card text-black bg-primary mb-3">
  <div class="card-body">


          <div class="col-lg-12">
            <p class="bs-component">
              <button class="btn btn-secondary" onclick="alerta();"><i class="ti-plus"></i>Nuevo cliente</button>
              <button class="btn btn-success" type="button" onclick="location='recepcion_e_reparados.php'"><i class="ti-thumb-up"></i>Equipos reparados</button>
              <button class="btn btn-danger" type="button" onclick="location='recepcion_e_sin_repar.php'"><i class="ti-thumb-down"></i>Equipos sin solución</button>
              <button class="btn btn-info" type="button" onclick="aviso();"><i class="ti-alert"></i>Avisos</button>
              <button class="btn btn-warning" type="button"onclick="location='recepcion_ventas.php'"><i class="ti-shopping-cart"></i>Ventas</button>
  </p>

<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
          <table id="a-tables" class="table table-hover table-dark table-responsive">
    <thead>

        <th data-field="id">id</th>
      <th data-field="fecha" data-sortable="true">Nombre</th>
      <th data-field="estatus" data-sortable="true">Apellidos</th>
      <th data-field="estatus" data-sortable="true">Direccion</th>
      <th data-field="estatus" data-sortable="true">Celular</th>
      <th data-field="estatus" data-sortable="true">Correo</th>
      <th class="disabled-sorting">Acción</th>

    </thead>
    <?php
      $ejecutar = mysqli_query($conn, $consulta);
    while($fila=mysqli_fetch_array($ejecutar)){
        $id          = $fila['id_folio'];
        $nom           = $fila['nombre'];
        $ape          = $fila['apellidos'];
        $dir          = $fila['direccion'];
        $cel        = $fila['celular'];
        $cor        = $fila['correo'];


?>
                    <tr>
                        <td width="8%"><?php echo $id ?></td>
                        <td width="14%"><?php echo $nom ?></td>
                        <td width="14%"><?php echo $ape ?></td>
                        <td width="14%"><?php echo $dir ?></td>
                        <td width="14%"><?php echo $cel ?></td>
                        <td width="14%"><?php echo $cor ?></td>
                        <td width="14%">
                        <a href="#" onclick="alerta1(<?php echo $id ?>), enviarmod(<?php echo $id ?>);" title="Actualizar cliente" ><i class="btn-sm btn-warning ti-pencil-alt"></i></a>
                        <a href="#" onclick="orden(<?php echo $id ?>), enviarorden(<?php echo $id ?>);" title="Nueva orden"><i class="btn-sm btn-success ti-plus"></i></a>
                        <a href="recepcion_historial_cliente.php?id=<?php echo $id; ?>"  title="Historial"><i class="btn-sm btn-secondary ti-agenda"></i></a>
                        </td>





          </tr>
        <?php } ?>
        <tbody></br>
            Resultado de clientes
      </tbody>
  </table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
        </div>
      </div>
    </main>
    <!-- Essential javascripts for application to work-->

    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <!-- js placed at the end of the document so the pages load faster -->
   <!-- Essential javascripts for application to work-->
   <script src="assets/js/jquery-3.2.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="assets/js/plugins/pace.min.js"></script>
     <!-- Page specific javascripts-->
    <script type="text/javascript" src="assets/js/plugins/moment.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/jquery-ui.custom.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/fullcalendar.min.js"></script>

    <!-- Data table plugin-->
    <script type="text/javascript" src="assets/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#a-tables').DataTable();</script>

    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="assets/js/sweetalert2.js"></script>

    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <div class="content-panel">
 <div class="col-lg-7">

 <script type="text/javascript">
function enviarmod(id){
  $.ajax({
      // la URL para la petición
      url : 'recepcion_fn_actualizar_cliente.php',
      // la información a enviar
      // (también es posible utilizar una cadena de datos)
      data : {
         id : id
      },
      // especifica si será una petición POST o GET
      type : 'POST',
      // el tipo de información que se espera de respuesta
      dataType : 'json',
      // código a ejecutar si la petición es satisfactoria;
      // la respuesta es pasada como argumento a la función
      success : function(data) {
        $("#swal-input0").val(data.data.id);
        $("#swal-input1").val(data.data.nom);
        $("#swal-input2").val(data.data.ape);
        $("#swal-input3").val(data.data.dir);
        $("#swal-input4").val(data.data.cor);
        $("#swal-input5").val(data.data.cel);

      },
      // código a ejecutar si la petición falla;
      // son pasados como argumentos a la función
      // el objeto de la petición en crudo y código de estatus de la petición
      error : function(xhr, status) {

      },
      // código a ejecutar sin importar si la petición falló o no
      complete : function(xhr, status) {

      }
  });
}

</script>

 <script type="text/javascript">
 //Script para mandar ID para generar la orden
function enviarorden(id){
  $.ajax({
      // la URL para la petición
      url : 'recepcion_fn_actualizar_cliente.php',
      // la información a enviar
      // (también es posible utilizar una cadena de datos)
      data : {
         id : id
      },
      // especifica si será una petición POST o GET
      type : 'POST',
      // el tipo de información que se espera de respuesta
      dataType : 'json',
      // código a ejecutar si la petición es satisfactoria;
      // la respuesta es pasada como argumento a la función
      success : function(data) {
        //Manda Llamar id,nombre y apellido
       $("#swal-input0").val(data.data.id);
        $("#swal-input1").val(data.data.nom);
        $("#swal-input2").val(data.data.ape);



      },
      // código a ejecutar si la petición falla;
      // son pasados como argumentos a la función
      // el objeto de la petición en crudo y código de estatus de la petición
      error : function(xhr, status) {

      },
      // código a ejecutar sin importar si la petición falló o no
      complete : function(xhr, status) {

      }
  });
}

</script>

<script type="text/javascript">
//ventana orden de servición
function orden(id){


swal({
title: 'Nueva orden de servicio',
html:
'<div class="card-body"> <form target="_blank" action="recepcion_pdf-orden.php" method="post" name="data" content="text/html; charset=utf-8" >'+

'<input type="hidden" name="swal-input0"  id="swal-input0" class="form-control border-input" >' +
'<input type="hidden" name="swal-input1"  id="swal-input1" class="form-control border-input" >' +
'<input type="hidden" name="swal-input2"  id="swal-input2" class="form-control border-input" >' +

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Equipo</label>'+
        '<select class="form-control form-control-sm" textalign="center" name="equipo" id="equipo"><option value="Television" >Televisión</option>'+
        '<option value="Ventiladores">Ventiladores</option>'+
        '<option value="Tarjeta madre">Tarjetas madre</option>'+
        '<option value="Audio">Audio</option>'+
        '<option value="Fuente de poder">Fuentes de poder</option>'+
        '</select>' +
    '</div>'+
'</div>'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Marca</label>'+
        '<input type="text" name="marca" id="marca" maxlength="25" onkeyup="this.value = this.value.toUpperCase();" required class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Modelo</label>'+
        '<input type="text" name="modelo" id="modelo" maxlength="25" required class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Falla</label>'+
        '<input type="text" name="falla" id="falla" onkeyup="this.value = this.value.toUpperCase();" maxlength="25" required class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Serie</label>'+
        '<input type="text" name="serie" id="serie" onkeyup="this.value = this.value.toUpperCase();" maxlength="25" required class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Accesorios</label>'+
        '<input type="text" name="acce" id="acce" maxlength="25"  class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="col-md-12">'+
'<div class="form-group">'+
        '<label>Tipo de servicio</label>'+
        '<select class="form-control form-control-sm" text-align="center" required name="servicio" id="servicio"><option value="Reparacion">Reparación</option><option value="Domicilio">Domicilio</option><option value="Garantia">Garantía</option><option value="Compra">Compra</option><option value="Revisión5">Revisión</option></select>' +

        '<label>Comentarios</label>'+
        '<textarea type="text" name="comen" id="comen"  class="form-control border-input"></textarea>'+
    '</div>'+
'</div>'+


'<div class="col-md-12">'+
'<Button type="submit" class= "btn btn-info btn-fill btn-wd">Registrar y generar reporte</Button>'+


'</form></div>',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: '</form> Actualizar solicitud',
cancelButtonClass: 'btn btn-danger btn-fill btn-wd',
showConfirmButton: false,
focusConfirm: false,
buttonsStyling: false,
reverseButtons: true
})

};

</script>


 <script type="text/javascript">
//ventana actualizar cliente
function alerta1(id){


swal({
title: 'Actualizar cliente',
html:
'<div class="col-lg-12"> <form action="recepcion_cliente_actualizar.php" method="post" name="data">'+
'<input name="swal-input0" type="hidden" id="swal-input0" class="form-control border-input" readonly>' +
'<label>Nombre(s)</label>' +
'<input input type="text" name="swal-input1" id="swal-input1"  class="form-control border-input maxlength="25" required>' +
'<label>Apellidos</label>' +
'<input input type="text" name="swal-input2" id="swal-input2" class="form-control border-input maxlength="25" required>' +
'<label>Direccion</label>' +
'<input input type="text" name="swal-input3" id="swal-input3" class="form-control border-input maxlength="25" required>' +
'<label>Correo</label>' +
'<input input type="email" name="swal-input4" id="swal-input4" class="form-control border-input ">' +
'<label>Celular</label>' +
'<input input type="number" name="swal-input5" id="swal-input5" class="form-control border-input type="number" required></br>'+
'<Button type="submit" class= "btn btn-info btn-fill btn-wd">Actualizar cliente</Button>'+
'</form></div>',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: '</form> Actualizar solicitud',
cancelButtonClass: 'btn btn-danger btn-fill btn-wd',
showConfirmButton: false,
focusConfirm: false,
buttonsStyling: false,
reverseButtons: true
})

};

</script>

 <script type="text/javascript">
//Nuevo Aviso
    function aviso(){


    swal({
   title: 'Nuevo aviso',
   html:
   '<div class="col-lg-12"> <form action="funciones/new_aviso.php" method="post" name="data">'+
   '<label>Folio(s)</label>' +
   '<input input type="number" name="nom" id="nom" class="form-control border-input maxlength="25" required>' +
   '<label>Aviso</label>' +
   '<input input type="textarea" name="ape" id="ape" style="line-height: 150px; height:150px;" class="form-control border-input maxlength="100" required>' +
   '<Button type="submit" class= "btn btn-info btn-fill btn-wd">Agregar cliente</Button>'+
   '</form></div>',
   showCancelButton: true,
   confirmButtonColor: '#3085d6',
   cancelButtonColor: '#d33',
   confirmButtonText: '</form> Registrar aviso',
   cancelButtonClass: 'btn btn-danger btn-fill btn-wd',
   showConfirmButton: false,
   focusConfirm: false,
   buttonsStyling: false,
    reverseButtons: true
  })

  };
  </script>

  <script type="text/javascript">
//ventana de nuevo cliente
    function alerta(){


    swal({
   title: 'Agregar cliente',
   html:
   '<div class="col-lg-12"> <form action="recepcion_cliente.php" method="post" name="data">'+
   '<label>Nombre(s)</label>' +
   '<input input type="text" name="nom" id="nom" class="form-control border-input maxlength="25" required>' +
   '<label>Apellidos</label>' +
   '<input input type="text" name="ape" id="ape" class="form-control border-input maxlength="25" required>' +
   '<label>Direccion</label>' +
   '<input input type="text" name="dire" id="dire" class="form-control border-input maxlength="25" required>' +
   '<label>Correo</label>' +
   '<input input type="text" name="cor" id="cor" class="form-control border-input">' +
   '<label>Celular</label>' +
   '<input input type="number" name="cel" id="cel" class="form-control border-input type="number" required></br>'+
   '<Button type="submit" class= "btn btn-info btn-fill btn-wd">Agregar cliente</Button>'+
   '</form></div>',
   showCancelButton: true,
   confirmButtonColor: '#3085d6',
   cancelButtonColor: '#d33',
   confirmButtonText: '</form> Actualizar solicitud',
   cancelButtonClass: 'btn btn-danger btn-fill btn-wd',
   showConfirmButton: false,
   focusConfirm: false,
   buttonsStyling: false,
    reverseButtons: true
  })

  };
  </script>

</div>
</div>

  </body>


</html>
<script type="text/javascript">
$.notify("Hello World");
</script>


  <?php

  //notificacion tipo facebook
              $ejec = mysqli_query($conn, $avisos);
            while($fila=mysqli_fetch_array($ejec)){
                $avi1     = $fila['aviso'];
                $fech_avi1     = $fila['fecha'];

          ?>

<script>

Push.create("<?php echo $fech_avi1; ?>", {
  body:"<?php echo $avi1; ?>",
  icon:"assets/img/alert.png",
  timeout:5000

});

</script>
<?php } ?>
