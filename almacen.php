<?php
include'check_sesion.php';
include'fuctions.php';
include'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];
$var_tipo = $_SESSION['tipo'];

if($var_tipo != "Administrador" && $var_tipo != "Almacen" ) {
  //echo "<script>alert('No tienes acceso a esta página!')</script>";
   echo "<script>window.open('Error_restrinccion.html','_self')</script>";
 }

$consulta = "SELECT * from reparar_tv where ubicacion = 'Almacen';";

$avisos = "SELECT * FROM avisos where tipo= 'Almacen' and estado='pendiente' order by fecha desc;";

$num_avisos = "SELECT COUNT(*) FROM avisos where tipo= 'Almacen' and estado='pendiente'";



?>
<html lang="es">
  <head>

    <!-- Open Graph Meta-->
    <title>Almacen</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!-- Font-icon css-->
    <link href= "assets/css/themify-icons.css" rel="stylesheet">
<link rel="shortcut icon" href="assets/img/favicon.ico">
      </head>

      <body class="app sidebar-mini rtl">


        <header class="app-header"><a class="app-header__logo" onclick="faqs();">ID de Usuario: <?php echo $var_clave ?></a>
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
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="ti-bell"></i><?php echo $num_avi ?></a>
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
            <a class="app-nav__item" href="checkout_empleados.php"><i class="ti-shift-left"></i></a>
          </ul>
        </header>
        <!-- Sidebar menu-->
        <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
        <aside class="app-sidebar">



          </div>
          <ul class="app-menu">
          <li><a class="app-menu__item" href="#"><i class="app-menu__icon ti-user"></i><span class="app-menu__label"> <?php echo $var_name ?></span></a></li>
          <li><a class="app-menu__item" href="recepcion.php"><i class="app-menu__icon ti-headphone-alt"></i><span class="app-menu__label">Recepción</span></a></li>
          <li><a class="app-menu__item" href="taller.php"><i class="app-menu__icon ti-settings"></i><span class="app-menu__label">Taller</span></a></li>
          <li><a class="app-menu__item" href="ml.php"><i class="app-menu__icon ti-shopping-cart-full"></i><span class="app-menu__label">MercadoLibre</span></a></li>
          <li><a class="app-menu__item" href="traslado.php"><i class="app-menu__icon ti-truck"></i><span class="app-menu__label">Traslados</span></a></li>
          <li><a class="app-menu__item active" href="almacen.php"><i class="app-menu__icon ti-archive"></i><span class="app-menu__label">Almacen</span></a></li>
          <li><a class="app-menu__item" href="administrador.php"><i class="app-menu__icon ti-star"></i><span class="app-menu__label">Administración</span></a></li>
    </ul>




        </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1>Almacen</h1>

        </div>

      </div>





<div class="content-panel">

  <div class="card text-black bg-primary mb-3">
          <div class="card-body">

<div class="col-lg-12">
            <p class="bs-component">
              <button class="btn btn-info" type="button"  onclick="nueva();" >Insertar pieza</button>
              <button class="btn btn-danger" onclick="location='almacen.php'"><i class="ti-thumb-down"></i>Almacen sin clasificar</button>
              <button class="btn btn-success" type="button" onclick="location='almacen_clasificados.php'"><i class="ti-thumb-up"></i>Almacen clasificados</button>

  </p>
  </div>


      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">

<table id="a-tables" class="table table-dark table-hover table-responsive">
    <thead>
        <!--<th data-field="state" data-checkbox="true"></th>-->
        <th data-field="id">Id equipo</th>
      <th data-field="folio" data-sortable="true">Folio</th>
      <th data-field="marca" data-sortable="true">Marca</th>
      <th data-field="modelo" data-sortable="true">Modelo</th>
      <th data-field="fecha_entrega" data-sortable="true">Servicio</th>
      <th data-field="costo" data-sortable="true">Estado</th>
      <th data-field="garantia" data-sortable="true">Acción</th>



    </thead>
    <?php
      $ejecutar = mysqli_query($conn, $consulta);
    while($fila=mysqli_fetch_array($ejecutar)){
        $id_equipo          = $fila['id_equipo'];
        $id           = $fila['id_folio'];
        $marca           = $fila['marca'];
        $modelo           = $fila['modelo'];
        $servicio           = $fila['servicio'];
        $estado           = $fila['estado'];


?>
                    <tr>
                        <td><?php echo $id_equipo ?></td>
                        <td><?php echo $id ?></td>
                        <td><?php echo $marca ?></td>
                        <td><?php echo $modelo ?></td>
                        <td><?php echo $servicio ?></td>
                        <td><?php echo $estado ?></td>

                        <td>
                        <button onclick="garantia(<?php echo $id?>), enviarorden(<?php echo $id_equipo?>);" class="btn btn-simple btn-success btn-icon edit" title="Registrar en almacen"><i class="ti-save"></i></button>
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
    <
    <div class="content-panel">
 <div class="col-lg-7">

</div>
</div>
<script>
//Script para mandar ID para generar la orden
function enviarorden(id){
 $.ajax({
     // la URL para la petición
     url : 'recepcion_fn_historial_garantia.php',
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
       $("#swal-input1").val(data.data.id_e);
       $("#swal-input2").val(data.data.id_pe);

       $("#swal-input5").val(data.data.cel);
       $("#swal-input6").val(data.data.equi);
       $("#swal-input7").val(data.data.mar);
       $("#swal-input8").val(data.data.mod);
       $("#swal-input9").val(data.data.ser);
       $("#swal-input10").val(data.data.cor);
       $("#swal-input11").val(data.data.accesorios);
       $("#swal-input12").val(data.data.falla);
       $("#swal-input13").val(data.data.comentarios);
       $("#swal-input14").val(data.data.fecha_ingreso);
       $("#swal-input15").val(data.data.fecha_entrega);
       $("#swal-input16").val(data.data.fecha_egreso);
       $("#swal-input17").val(data.data.servicio);
       $("#swal-input18").val(data.data.ubicacion);
       $("#swal-input19").val(data.data.presupuesto);
       $("#swal-input20").val(data.data.mano_obra);
       $("#swal-input21").val(data.data.abono);
       $("#swal-input22").val(data.data.restante);
       $("#swal-input23").val(data.data.costo_total);
       $("#swal-input24").val(data.data.estado);

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
function garantia(id){

swal({
title: 'Clasificar en almacen',
html:
'<div class="card-body"> <form  action="almacen_fn_clasificar.php" method="post" name="data" content="text/html; charset=utf-8" >'+
//Manda Llamar id,nombre y apellido
//'<input name="swal-input0" type="text" id="swal-input0" class="form-control border-input" readonly >' +



'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Id equipo</label>'+
        '<input type="text" name="swal-input1" id="swal-input1" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+


'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Folio cliente</label>'+
        '<input type="text" name="swal-input00" id="swal-input00" value="'+id+'" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Sub ubicacion</label>'+
        '<input type="text" name="swal-input3" id="swal-input3"  class="form-control border-input">'+
    '</div>'+
'</div>'+


'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Sub estado</label>'+
        '<input type="text" name="swal-input4" id="swal-input4"  maxlength="25" required class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+


'<div class="col-md-12">'+
'<Button type="submit" class= "btn btn-info btn-fill btn-wd">Clasificar</Button>'+

'</form></div>',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: '</form> Actualizar solicitud',
cancelButtonClass: 'btn btn-danger btn-fill btn-wd',
showConfirmButton: false,
focusConfirm: false,
buttonsStyling: false,
reverseButtons: true, allowOutsideClick: false
})

};

</script>


 <script type="text/javascript">
//ventana de nuevo cliente
    function nueva(){


    swal({
   title: 'Nueva publicacion',
   html:
'<div class="card-body"> <form action="ml_fn_nueva.php" method="post" name="data" enctype="multipart/form-data">'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<label>Tipo</label>'+
'<input type="text" name="tipo"  id="tipo" pattern="[A-Za-z0-9 ]+" placeholder="Ejem. Tarjeta Main"  title="Sólo letras y números" onkeyup="this.value = this.value.toUpperCase();"  class="form-control border-input" >' +//Id Equipo
'</div>'+

'<div class="col-md-6">'+
        '<label>Marca</label>'+
        '<input type="text" name="marca" id="marca" pattern="[A-Za-z ]+" placeholder="Ejem. Samsung"  title="Sólo letras" onkeyup="this.value = this.value.toUpperCase();" required class="form-control border-input"></input>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
        '<label>Modelo</label>'+
        '<input type="text"  name="modelo" id="modelo"  title="Sólo letras y números" onkeyup="this.value = this.value.toUpperCase();" required class="form-control border-input"></input>'+
'</div>'+

'<div class="col-md-6">'+
        '<label>Etiqueta 1</label>'+
        '<input type="text" name="etiq1" id="etiq1"  title="Sólo letras y números" onkeyup="this.value = this.value.toUpperCase();" required class="form-control border-input"></input>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
        '<label>Etiqueta 2</label>'+
        '<input type="text" id="etiq2" name="etiq2"  title="Sólo letras y números" onkeyup="this.value = this.value.toUpperCase();" class="form-control border-input"></input>'+
'</div>'+
'<div class="col-md-6">'+
        '<label>Ubicacion</label>'+
        '<input name="ubicacion" id="ubicacion" type="text" pattern="[A-Za-z0-9 ]+" placeholder="Ejem. Caja 25, Pie 35"  title="Sólo letras y números" onkeyup="this.value = this.value.toUpperCase();" required class="form-control border-input"></input>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
        '<label>Precio</label>'+
        '<input type="number" id="precio" name="precio" required title="Sólo letras y números" onkeyup="this.value = this.value.toUpperCase();"  class="form-control border-input"></input>'+
'</div>'+
'<div class="col-md-6">'+
        '<label>Link</label>'+
        '<input name="link" id="link" type="text" required placeholder="Link de Mercadolibre"  class="form-control border-input"></input>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+  
        '<label>Img delantera</label>' +
        '<input input type="file"  id="img1" name="img1"  accept="image/png/jpg" class="form-control border-input" >'+
  '</div>'+

'<div class="col-md-6">'+
'<label>img trasera</label>' +
'<input input type="file"  id="img2" name="img2"  accept="image/png/jpg" class="form-control border-input" >'+
  '</div>'+
  '</div>'+

  '<div class="row">'+
'<div class="col-md-6">'+
'<label>Img etiqueta</label>' +
'<input input type="file" id="img3" name="img3"  accept="image/png/jpg" class="form-control border-input" >'+
  '</div>'+

'<div class="col-md-6">'+
'<label>Img tv</label>' +
'<input input type="file" id="img4" name="img4"  accept="image/png/jpg" class="form-control border-input" >'+
  '</div>'+
  '</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
'<label>Img etiqueta tv</label>' +
'<input input type="file"  id="img5"  name="img5" accept="image/png/jpg" class="form-control border-input" >'+
  '</div>'+

  '<div class="col-md-6">'+
'<label>Estado</label>' +
'<select class="form-control form-control-sm" required textalign="center" name="estado" id="estado"><option value="" ></option><option value="Publicada" >Publicada</option><option value="Pendiente">Pendiente</option></select>' +
  '</div>'+
'</div></br>'+

   '<Button type="submit" class= "btn btn-info btn-fill btn-wd">Confirmar</Button>'+
   '</form></div>',
   showCancelButton: true,
   confirmButtonColor: '#3085d6',
   cancelButtonColor: '#d33',
   confirmButtonText: '</form> ',
   cancelButtonClass: 'btn btn-danger btn-fill btn-wd',
   showConfirmButton: false,
   focusConfirm: false,
   buttonsStyling: false,
    reverseButtons: true, allowOutsideClick: false
  })

  };
  </script>

  <script type="text/javascript">
//Nuevo Aviso
    function faqs(){


   swal(
  'Sistema administrador de negocios de reparación multi-usuarios (CONTROLY) 0.5',
  'Creado por Francisco Israel Martínez Ayala 2019',
  'success'
)
};
  </script>



  </body>
</html>
