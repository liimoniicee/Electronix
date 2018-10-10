<!DOCTYPE html>
<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];



$solicitud_taller = "SELECT *
FROM solicitudes_refacciones
WHERE solicitud='Pendiente'";

$publicadas="SELECT * from refacciones_tv where estado = 'Publicada';";

$pendientes="SELECT * from refacciones_tv where estado = 'Pendiente';";



$avisos = "SELECT
*
FROM avisos where tipo= 'Mercado' and estado='pendiente' order by fecha desc;";

$num_avisos = "SELECT COUNT(*) FROM avisos where tipo= 'Mercado' and estado='pendiente' ";

?>
<html lang="es">
  <head>

    <!-- Open Graph Meta-->
    <title>Tareas</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!-- Font-icon css-->
    <!-- Font-icon css-->
<link href= "assets/css/themify-icons.css" rel="stylesheet">
<link rel="shortcut icon" href="assets/img/favicon.ico">
  </head>

  <body class="app sidebar-mini rtl">


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
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="ti-bell"></i> <?php echo $num_avi ?></a>
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
        <li class="dropdown"><a class="app-nav__item" href="checkout_empleados.php" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="ti-shift-left"></i></a>

        </li>
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
      <li><a class="app-menu__item active" href="ml.php"><i class="app-menu__icon ti-shopping-cart-full"></i><span class="app-menu__label">MercadoLibre</span></a></li>
      <li><a class="app-menu__item" href="traslado.php"><i class="app-menu__icon ti-truck"></i><span class="app-menu__label">Traslados</span></a></li>
      <li><a class="app-menu__item" href="almacen.php"><i class="app-menu__icon ti-archive"></i><span class="app-menu__label">Almacen</span></a></li>
      <li><a class="app-menu__item" href="administrador.php"><i class="app-menu__icon ti-star"></i><span class="app-menu__label">Administración</span></a></li>
</ul>

    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Mercado libre</h1>
          <p>Dar un buen servicio es nuestra prioridad</p>
        </div>

      </div>

<div class="card text-black bg-primary mb-3">
  <div class="card-body">


          <div class="col-lg-12">
            <p class="bs-component">
              <button class="btn btn-success" type="button" id='watch-me'>Publicadas</button>
              <button class="btn btn-danger" type="button" onclick="location='recepcion_e_sin_repar.php'">Vendidas</button>
              <button class="btn btn-warning" type="button" id='see-me'>Solicitudes de taller</button>

  </p>
</div>
</div>
        </div>

        <div id='show-me'>


      <table id="a-tables" class="table table-dark table-hover table-responsive">
      <thead>
      <th data-field="folio" data-sortable="true">Nombre</th>
      <th data-field="equipo" data-sortable="true">Marca</th>
      <th data-field="falla" data-sortable="true">Modelo</th>
      <th data-field="fecha_entregar" data-sortable="true">Ubicación</th>
      <th data-field="ubicacion" data-sortable="true">Precio</th>
      <th data-field="fecha_ingreso" data-sortable="true">Fecha solicitud</th>
      <th data-field="fecha_entregar" data-sortable="true">Etiqueta 1</th>
      <th data-field="fecha_entregar" data-sortable="true">Etiqueta 2</th>


      <th data-field="accion" data-sortable="true">Acción</th>
      </thead>
      <?php
      $ejec3 = mysqli_query($conn, $pendientes);
      while($fila=mysqli_fetch_array($ejec3)){
     $id           = $fila['Id_refacciones'];
      $tipo           = $fila['tipo'];
      $marca           = $fila['marca'];
      $modelo          = $fila['modelo'];
      $ubicacion        = $fila['ubicacion'];
      $precio        = $fila['precio'];
      $fecha_entrada           = $fila['fecha_entrada'];
      $etiqueta_1          = $fila['etiqueta_1'];
      $etiqueta_2        = $fila['etiqueta_2'];
      $imagen        = $fila['imagen1'];

      ?>
          <tr>

              <td><?php echo $tipo ?></td>
              <td><?php echo $marca ?></td>
              <td><?php echo $modelo ?></td>
              <td><?php echo $ubicacion ?></td>
              <td><?php echo $precio ?></a></td>
              <td><?php echo $fecha_entrada ?></td>
              <td><?php echo $etiqueta_1 ?></td>
              <td><?php echo $etiqueta_2 ?></a></td>

              <td>
              <button onclick="estado(<?php echo $id?>), refaccion(<?php echo $id?>);" title="Cambiar estado" class="btn btn-simple btn-warning btn-sm"><i class="ti-star"></i></button>
              <button onclick="estado(<?php echo $id?>), refaccion(<?php echo $id?>);" title="Abrir ubicación" class="btn btn-simple btn-primary btn-sm"><i class="ti-folder"></i></button>
              <a href='<?php echo $imagen?>'>Abrir imagen</a>
              </td>



      </tr>
      <?php } ?>
      <tbody></br>
      Equipos pendientes
      </tbody>
      </table>
        </div>

        </div>


      <!-- comienza tabla 2 -->
        <div id='show-me-two' style='display:none; border:2px solid #ccc'>


      <table id="a-tables" class="table table-dark table-hover table-responsive">
      <thead>
      <th data-field="id">Id reporte</th>
      <th data-field="folio" data-sortable="true">Parte que necesita</th>
      <th data-field="folio" data-sortable="true">Etiquetas</th>
      <th data-field="equipo" data-sortable="true">Estado</th>
      <th data-field="falla" data-sortable="true">ID Equipo</th>
  
      <th data-field="accion" data-sortable="true">Acción</th>
      </thead>
      <?php
      $ejec4 = mysqli_query($conn, $solicitud_taller);
      while($fila=mysqli_fetch_array($ejec4)){
      $id_solicitud          = $fila['id_solicitud'];
      $tipo          = $fila['tipo'];
      $etiqueta           = $fila['etiqueta'];
      $estado           = $fila['estado'];
      $id_equipo        = $fila['id_equipo'];
     


      ?>
          <tr>
              <td><?php echo $id_solicitud ?></td>
              <td><?php echo $tipo ?></td>
              <td><?php echo $etiqueta ?></td>
              <td><?php echo $estado ?></td>
              <td><?php echo $id_equipo ?></td>
            
              <td>
              <button onclick="solicitud_pieza(<?php echo $id_equipo?>), mod_solicitud_pieza(<?php echo $id_equipo?>);" title="Solicitar pieza" class="btn btn-simple btn-success btn-icon edit"><i ></i></button>
              </td>



      </tr>
      <?php } ?>
      <tbody></br>
      Equipos pendientes
      </tbody>
      </table>
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

    <script type="text/javascript">
    $(document).ready(function ()
     {
       //primero
      $("#watch-me").click(function()
      {
       $("#show-me:hidden").show('slow');
       $("#show-me-two").hide();
       $("#show-me-three").hide();
       $("#show-me-three2").hide();
       $("#show-me-three5").hide();
       $("#show-me-three3").hide();
       $("#show-me-three4").hide();
       });
       $("#watch-me").click(function()
      {
        if($('watch-me').prop('checked')===false)
       {
        $('#show-me').hide();
       }
      });

      //segundo
      $("#see-me").click(function()
      {
        $("#show-me-two:hidden").show('slow');
       $("#show-me").hide();
       $("#show-me-three").hide();
       $("#show-me-three2").hide();
       $("#show-me-three5").hide();
       $("#show-me-three3").hide();
       $("#show-me-three4").hide();
       });
       $("#see-me").click(function()
      {
        if($('see-me-two').prop('checked')===false)
       {
        $('#show-me-two').hide();
       }
      });
    });
</script>

<script>

//Script para mandar ID para generar la orden
function refaccion(id){
$.ajax({

    // la URL para la petición
    url : 'ml_fn_refaccion.php',
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
      $("#swal-input0").val(data.data.tipo);
      $("#swal-input1").val(data.data.marca);
      $("#swal-input2").val(data.data.modelo);
      $("#ubicacion").val(data.data.ubicacion);
      $("#swal-input5").val(data.data.estado);
      $("#precio").val(data.data.precio);
      $("#swal-input7").val(data.data.fecha_entrada);
      $("#etiqueta1").val(data.data.etiqueta_1);
      $("#etiqueta2").val(data.data.etiqueta_2);
      $("#link").val(data.data.link);





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

<script>

//Script para mandar ID para generar la orden
function mod_solicitud_pieza(id_equipo){
$.ajax({

    // la URL para la petición
    url : 'ml_fn_solicitud_pieza.php',
    // la información a enviar
    // (también es posible utilizar una cadena de datos)
    data : {
     id_equipo : id_equipo
    },
    // especifica si será una petición POST o GET
    type : 'POST',
    // el tipo de información que se espera de respuesta
    dataType : 'json',
    // código a ejecutar si la petición es satisfactoria;
    // la respuesta es pasada como argumento a la función
    success : function(data) {
      //Manda Llamar id,nombre y apellido
      $("#swal-input1").val(data.data.marc);
      $("#swal-input2").val(data.data.mod);
      $("#swal-input3").val(data.data.par);


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
//ventana de nuevo cliente
    function solicitud_pieza(id_equipo){

var id = id_equipo;
    swal({
   title: 'Solicitud pieza',
   html:
'<div class="card-body"> <form action="ml_solicitud_pieza.php" method="post" name="data" enctype="multipart/form-data">'+

'<div class="col-md-12">'+
'<div class="form-group">'+
  '<label># equipo</label>'+
'<input type="text" name="swal-input0"  id="swal-input0" value="'+id+'"  class="form-control border-input" readonly >' +//Id Equipo

        '<label>Marca</label>'+
        '<input type="text" name="swal-input1" readonly id="swal-input1" required class="form-control border-input"></input>'+

        '<label>Modelo</label>'+
        '<input type="text" name="swal-input2" readonly id="swal-input2" required class="form-control border-input"></input>'+

       
        '<label>Ubicación</label>'+
        '<select class="form-control form-control-sm" required textalign="center" name="swal-input4" id="swal-input4"><option value="" ></option><option value="Almacen" >Almacen</option><option value="Mercado libre">Mercado libre</option><option value="No encontrada">No encontrada</option></select>' +


'<div class="col-md-12 entradas" style="display:none;">'+
'<label>Costo de refacción</label>'+
'<input type="number" name="swal-input5" value="NA" id="swal-input5" class="form-control border-input"  ><br></br>'+
'</div>'+
'</div>'+
'</div>'+

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
    reverseButtons: true
  })
  $("#swal-input4").change(function(){
    if(this.value != 'No encontrada'){
      $(".entradas").show();
    }
    if(this.value != 'Almacen'){
      $(".entradas").show();
    }
    if(this.value != 'Mercado libre'){
      $(".entradas").hide();
    }else{

    }
  })

  };
  </script>




 <script type="text/javascript">
//ventana de nuevo cliente
    function estado(id){


    swal({
   title: 'Cambiar estado',
   html:
'<div class="card-body"> <form action="ml_fn_refaccion.php" method="post" name="data" enctype="multipart/form-data">'+

'<input type="hidden" value="'+id+'" name="swal-input00"   id="swal-input00" class="form-control border-input" >' +//Id Equipo

'<div class="row">'+
'<div class="col-md-6">'+
'<div class="form-group">'+
  '<label>Nombre de la pieza</label>'+
'<input type="text" name="swal-input0" readonly id="swal-input0" pattern="[A-Za-z0-9 ]+" placeholder="Ejem. Tarjeta Main"  title="Sólo letras y números" onkeyup="this.value = this.value.toUpperCase();"  class="form-control border-input" >' +//Id Equipo
'</div>'+
'</div>'+

'<div class="col-md-6">'+
'<div class="form-group">'+
        '<label>Marca</label>'+
        '<input type="text" name="swal-input1" readonly id="swal-input1" pattern="[A-Za-z ]+" placeholder="Ejem. Samsung"  title="Sólo letras" onkeyup="this.value = this.value.toUpperCase();" required class="form-control border-input"></input>'+
        '</div>'+
'</div>'+
'</div>'+


'<div class="row">'+
'<div class="col-md-6">'+
'<div class="form-group">'+
        '<label>Modelo</label>'+
        '<input type="text" name="swal-input2" readonly id="swal-input2" pattern="[A-Za-z0-9 ]+" title="Sólo letras y números" onkeyup="this.value = this.value.toUpperCase();" required class="form-control border-input"></input>'+
        '</div>'+
'</div>'+

'<div class="col-md-6">'+
'<div class="form-group">'+
        '<label>Etiqueta 1</label>'+
        '<input type="text" name="etiqueta1" readonly id="etiqueta1" pattern="[A-Za-z0-9 ]+" title="Sólo letras y números" onkeyup="this.value = this.value.toUpperCase();" required class="form-control border-input"></input>'+
        '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
'<div class="form-group">'+
        '<label>Etiqueta 2</label>'+
        '<input type="text" name="etiqueta2" readonly id="etiqueta2" pattern="[A-Za-z0-9 ]+" title="Sólo letras y números" onkeyup="this.value = this.value.toUpperCase();" required class="form-control border-input"></input>'+
        '</div>'+
'</div>'+


'</div>'+


'<div class="row">'+
'<div class="col-md-6">'+
'<div class="form-group">'+
        '<label>Ubicacion</label>'+
        '<input type="text" name="ubicacion" readonly id="ubicacion" pattern="[A-Za-z0-9 ]+" placeholder="Ejem. Caja 25, Pie 35"  title="Sólo letras y números" onkeyup="this.value = this.value.toUpperCase();" required class="form-control border-input"></input>'+
        '</div>'+
'</div>'+

'<div class="col-md-6">'+
'<div class="form-group">'+
        '<label>Precio</label>'+
        '<input type="number" name="precio"  id="precio" required class="form-control border-input"></input>'+
        '</div>'+
'</div>'+
'</div>'+

'<div class="col-lg-12">'+
        '<label>Link</label>'+
        '<input type="text" name="link"  id="link" required  class="form-control border-input"></input></br>'+
/*

        '<iframe src="https://www.mercadolibre.com.mx">'+
'</iframe>'+
'</div>'+
*/
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
    reverseButtons: true
  })
  $("#swal-input4").change(function(){
    if(this.value != 'no encontrada'){
      $(".entradas").show();
    }else{
      $(".entradas").hide();
    }
  })

  };
  </script>




  </body>
</html>
