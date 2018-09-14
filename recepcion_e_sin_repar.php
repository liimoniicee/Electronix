
<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];


$consulta = "SELECT
id_equipo,id_folio, id_personal,nombre,apellidos,celular,correo, equipo, marca, modelo, accesorios, falla, comentarios, fecha_ingreso,fecha_entregar, servicio,ubicacion,presupuesto,mano_obra,abono,restante,costo_total,estado FROM clientes LEFT JOIN reparar_Tv USING(id_folio) where estado = 'Sin solucion'";


$venta="SELECT * from ventas_tv ";



?>
<html lang="es">
  <head>

    <!-- Open Graph Meta-->
    <title>Equipos sin reparación</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!-- Font-icon css-->


  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html">ID de Usuario: </a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Search">
          <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <!--Notification Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="fa fa-bell-o fa-lg"></i></a>
          <ul class="app-notification dropdown-menu dropdown-menu-right">
            <li class="app-notification__title">You have 4 new notifications.</li>
            <div class="app-notification__content">
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Lisa sent you a mail</p>
                    <p class="app-notification__meta">2 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Mail server not working</p>
                    <p class="app-notification__meta">5 min ago</p>
                  </div></a></li>
              <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                  <div>
                    <p class="app-notification__message">Transaction complete</p>
                    <p class="app-notification__meta">2 days ago</p>
                  </div></a></li>
              <div class="app-notification__content">
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Lisa sent you a mail</p>
                      <p class="app-notification__meta">2 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-danger"></i><i class="fa fa-hdd-o fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Mail server not working</p>
                      <p class="app-notification__meta">5 min ago</p>
                    </div></a></li>
                <li><a class="app-notification__item" href="javascript:;"><span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-success"></i><i class="fa fa-money fa-stack-1x fa-inverse"></i></span></span>
                    <div>
                      <p class="app-notification__message">Transaction complete</p>
                      <p class="app-notification__meta">2 days ago</p>
                    </div></a></li>
              </div>
            </div>
            <li class="app-notification__footer"><a href="#">See all notifications.</a></li>
          </ul>
        </li>
        <!-- User Menu-->
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
          <ul class="dropdown-menu settings-menu dropdown-menu-right">
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
            <li><a class="dropdown-item" href="page-user.html"><i class="fa fa-user fa-lg"></i> Profile</a></li>
            <li><a class="dropdown-item" href="destroy.php"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
          </ul>
        </li>
      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">

        <div>
          <p class="app-sidebar__user-name"><?php $var_name ?></p>

        </div>
      </div>
      <ul class="app-menu">
      <li><a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Inicio</span></a></li>

      <li><a class="app-menu__item" href="recepcion.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Recepcion</span></a></li>
      <li><a class="app-menu__item" href="index.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Taller</span></a></li>
      <li class="treeview"><a class="app-menu__item" href="ml.php" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">MercadoLibre</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
            <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i> Nueva publicacion</a></li>
            </ul>
      <li><a class="app-menu__item" href="index.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Traslados</span></a></li>
      <li><a class="app-menu__item" href="index.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Almacén</span></a></li>
      <li><a class="app-menu__item" href="index.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Administración</span></a></li>

    </aside>
    <main class="app-content">
      <div class="app-title">
          <h1><i class="fa fa-dashboard"></i>Equipos sin solución</h1>
            </div>

<div class="content-panel">
                <div class="col-md-12">
                    <div class="tile">
                      <div class="tile-body">

          <table id="a-tables" class="table table-dark table-hover table-responsive">
    <thead>
        <!--<th data-field="state" data-checkbox="true"></th>-->
        <th data-field="id">id_equipo</th>
        <th data-field="folio" data-sortable="true">Folio</th>

      <th data-field="equipo" data-sortable="true">equipo</th>
      <th data-field="falla" data-sortable="true">falla</th>
      <th data-field="fecha_ingreso" data-sortable="true">fecha_ingreso</th>
      <th data-field="fecha_entregar" data-sortable="true">fecha_entregar</th>
      <th data-field="ubicacion" data-sortable="true">ubicacion</th>.
      <th data-field="accion" data-sortable="true">Acción</th>

    </thead>
    <?php
      $ejecutar = mysqli_query($conn, $consulta);
    while($fila=mysqli_fetch_array($ejecutar)){
        $id_equipo          = $fila['id_equipo'];
        $id           = $fila['id_folio'];
        $equipo           = $fila['equipo'];
        $falla          = $fila['falla'];
        $fecha_ingreso        = $fila['fecha_ingreso'];
        $fecha_entregar        = $fila['fecha_entregar'];
        $ubicacion        = $fila['ubicacion'];
?>
                    <tr>
                        <td><?php echo $id_equipo ?></td>
                        <td><?php echo $id ?></td>
                        <td><?php echo $equipo ?></td>
                        <td><?php echo $falla ?></td>
                        <td><?php echo $fecha_ingreso ?></td>
                        <td><?php echo $fecha_entregar ?></td>
                        <td><?php echo $ubicacion ?></a></td>
                        <td>
                        <button onclick="devolucion(<?php echo $id?>), enviarorden(<?php echo $id?>);" title="Devolucion de equipo" class="btn btn-simple btn-warning btn-icon edit"><i ></i></button>
                        <button onclick="cambio(<?php echo $id?>), enviarorden(<?php echo $id?>);" title="Cambiar equipo" class="btn btn-simple btn-success btn-icon edit"><i ></i></button>
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

</div>
</div>

<script type="text/javascript">
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
       $("#swal-input3").val(data.data.nom);
       $("#swal-input4").val(data.data.ape);
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
//devolucion
function devolucion(id){


swal({
title: 'Devolución de equipo',
html:
'<div class="card-body"> <form target="_blank" action="recepcion_pdf-devolucion.php" method="post" name="data" content="text/html; charset=utf-8" >'+

'<input type="hidden" name="swal-input9" id="swal-input9" readonly class="form-control border-input">'+
'<input type="hidden" name="swal-input4" id="swal-input4" readonly class="form-control border-input">'+


//Manda Llamar id,nombre y apellido
'<h5>Al devolver el equipo se cobrará $200.00</h5>'+

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
        '<input type="text" name="swal-input0" id="swal-input0" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Nombre(s)</label>'+
        '<input type="text" name="swal-input3" id="swal-input3" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+




'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Celular</label>'+
        '<input type="text" name="swal-input5" id="swal-input5" readonly maxlength="25" required class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Equipo</label>'+
        '<input type="text" name="swal-input6" id="swal-input6" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+


'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Marca</label>'+
        '<input type="text" name="swal-input7" id="swal-input7" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Modelo</label>'+
        '<input type="text" name="swal-input8" id="swal-input8" readonly maxlength="25" required class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Ingreso</label>'+
        '<input type="text" name="swal-input14" id="swal-input14" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Falla</label>'+
        '<input type="text" name="swal-input12" id="swal-input12" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Ubicación</label>'+
        '<input type="text" name="swal-input18" id="swal-input18" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Servicio</label>'+
        '<input type="text" name="swal-input17" id="swal-input17" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-12">'+
'<Button type="submit" class= "btn btn-info btn-fill btn-wd">Devolver equipo</Button>'+

'</form></div>',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: '</form> Devolver equipo',
cancelButtonClass: 'btn btn-danger btn-fill btn-wd',
showConfirmButton: false,
focusConfirm: false,
buttonsStyling: false,
reverseButtons: true
})

};

</script>

<script type="text/javascript">
//ventana orden de servición
function cambio(id){


swal({
title: 'Cambio',
html:
'<div class="card-body"> <form target="_blank" action="recepcion_pdf-cambio.php" method="post" name="data" content="text/html; charset=utf-8" >'+
//Manda Llamar id,nombre y apellido
'<h5>Equipo que deja a cambio</h5>'+

        '<input type="hidden" name="swal-input1" id="swal-input1" readonly class="form-control border-input">'+
        '<input type="hidden" name="swal-input0" id="swal-input0" readonly class="form-control border-input">'+
        '<input type="hidden" name="swal-input3" id="swal-input3" readonly class="form-control border-input">'+
        '<input type="hidden" name="swal-input4" id="swal-input4" readonly class="form-control border-input">'+
        '<input type="hidden" name="swal-input6" id="swal-input6" readonly class="form-control border-input">'+
        '<input type="hidden" name="swal-input9" id="swal-input9" readonly class="form-control border-input">'+
        '<input type="hidden" name="swal-input12" id="swal-input12" readonly class="form-control border-input">'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
  '<label>Marca</label>'+
        '<input type="text" name="swal-input7" id="swal-input7" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+


'<div class="col-md-6">'+
  '<div class="form-group">'+
  '<label>Modelo</label>'+
        '<input type="text" name="swal-input8" id="swal-input8" readonly maxlength="25" required class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<h5>Equipo que compra</h5>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
  '<label>ID Venta</label>'+
  '<select class="form-control form-control-sm" textalign="center" name="tv_venta" id="tv_venta">'+
  <?php
  $ejec7 = mysqli_query($conn, $venta);
  while($fila=mysqli_fetch_array($ejec7)){?>
  '<?php echo '<option value="'.$fila["idventa_tv"].'">'.$fila["idventa_tv"].'</option>'; ?>'+
  <?php } ?>
  '</select>' +
    '</div>'+
'</div>'+

'<div class="col-md-6">'+
  '<div class="form-group">'+
  '<label>Marca</label>'+
        '<input type="text" name="marca" id="marca" readonly maxlength="25" required class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-6">'+
  '<div class="form-group">'+
  '<label>Modelo</label>'+
        '<input type="text" name="modelo" id="modelo" readonly maxlength="25" required class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+





'<h5>Costos</h5>'+
'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Abono del cliente</label>'+
        '<input type="text" name="swal-input21" id="swal-input21" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Valor de su televisión</label>'+
        '<input type="number" name="swal-input50" id="swal-input50"  required placeholder="Escribir con punto decimal" onkeypress="operaciones();" class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Costo de tv</label>'+
        '<input type="text" name="costo" id="costo" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Total a pagar</label>'+
        '<input type="text" name="swal-input52" id="swal-input52" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="col-md-12">'+
'<Button type="submit" class= "btn btn-info btn-fill btn-wd">Cambiar equipo y generar garantía</Button>'+

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
$('#tv_venta').on('change', function(){
var id = $(this).val();


$.ajax({
  type: 'POST',
  url: 'obtener_tv_ventas.php',
  data: {id: id},
  dataType : 'json',
})
.done(function(data){

  $("#modelo").val(data.data.mod);
  $("#marca").val(data.data.mar);
  $("#costo").val(data.data.cost);

})
.fail(function(){
alert('hubo un error')
})

})

};

</script>


<script type="text/javascript">
/*
$('#tv_venta').on('change', function(){
var id = $(this).val();


$.ajax({
  type: 'POST',
  url: 'obtener_tv_ventas.php',
  data: {id: id},
  dataType : 'json',
})
.done(function(data){

  $("#modelo").val(data.data.mod);
  $("#serie").val(data.data.ser);
  $("#costo").val(data.data.cost);

})
.fail(function(){
alert('hubo un error')
})
});
*/


</script>

<script type="text/javascript">

function operaciones()
{
  var abono =document.getElementById('swal-input21').value;
  var valor =document.getElementById('swal-input50').value;
  var costo =document.getElementById('costo').value;

  var suma =parseInt(abono)+parseInt(valor);

  var sub =parseInt(costo)-parseInt(suma);

  var total =parseInt(document.getElementById('swal-input52').value= sub);

}


</script>

  </body>
</html>
