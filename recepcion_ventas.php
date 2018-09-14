<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];


$venta="SELECT * from ventas_tv where estado = 'En venta';";

$clientes="SELECT * from clientes order by id_folio desc ";


?>
<html lang="es">
  <head>

    <!-- Open Graph Meta-->
    <title>Televisión en venta</title>
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
      <li><a class="app-menu__item" href="taller.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Taller</span></a></li>
      <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">MercadoLibre</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
            <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i> Nueva publicacion</a></li>
            </ul>
      <li><a class="app-menu__item" href="index.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Traslados</span></a></li>
      <li><a class="app-menu__item" href="index.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Almacén</span></a></li>
      <li><a class="app-menu__item" href="index.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Administración</span></a></li>





    </aside>
    <main class="app-content">
      <div class="app-title">
          <h1><i class="fa fa-dashboard"></i>Ventas</h1>
      </div>
<div class="content-panel">

  <div class="col-lg-2"
    <div class="bs-component">
      <div class="card">
        <div class="row">
        <button class="btn btn-primary" type="button" onclick="nuevo();">Nuevo equipo a la venta</button>

      </div>
      </div>
    </div>
  </div><br></br>


              <div class="row">
                <?php
                $ejec1 = mysqli_query($conn, $venta);
                while($fila=mysqli_fetch_array($ejec1)){ ?>
                <div class="col-lg-4">
                  <div class="bs-component">
                    <div class="card">
                      <h4 class="card-header"><?php echo $fila['marca']; ?></h4>
                      <div class="card-body">
                        <h5 class="card-title"><?php echo $fila['modelo']; ?></h5>
                        <h6 class="card-subtitle text-muted">$<?php echo $fila['costo']; ?></h6>
                      </div><img style="height: 350px; width: 100%; display: block;" src="<?php echo $fila['imagen1']; ?>" alt="Card image">

                      <div class="card-footer text-muted"><?php echo  $fila['fecha_alta']; ?> </div>
                        <button class="btn btn-primary" type="button" onclick="vender(<?php echo $fila['idventa_tv']; ?>), mod_vender(<?php echo $fila['idventa_tv']; ?>);">Vender</button>
                      </div>

                  </div><br></br>
                </div>

              <?php } ?>
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
function mod_vender(id){
  $.ajax({
      // la URL para la petición
      url : 'recepcion_fn_ventas.php',
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


         $("#marc").val(data.data.marc);
         $("#mod").val(data.data.mod);
         $("#ser").val(data.data.ser);
         $("#costo").val(data.data.cost);
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

  function nuevo(){


  swal({
 title: 'Agregar producto',
 html:
 '<div class="col-lg-12"> <form action="recepcion_ventas_nuevo.php" method="post" name="data" enctype="multipart/form-data">'+
 '<label>Marca</label>' +
 '<input input type="text" name="marc" id="marc" class="form-control border-input" maxlength="20" required>' +
 '<label>Modelo</label>' +
 '<input input type="text" name="mod" id="mod" class="form-control border-input maxlength="20" required>' +
 '<label>Serie</label>' +
 '<input input type="text" name="ser" id="ser" class="form-control border-input maxlength="20" required>' +
 '<label>Costo</label>' +
 '<input input type="number" name="costo" id="costo" class="form-control border-input" maxlength="20" required>' +
 '<label>imagen</label>' +
 '<input input type="file" name="img" id="img"  required accept="image/png/jpg" class="form-control border-input" required></br>'+
 '<Button type="submit" class= "btn btn-info btn-fill btn-wd">Agregar producto</Button>'+
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

  function vender(id){


  swal({
 title: 'Vender producto',
 html:
 '<div class="card-body"> <form action="recepcion_pdf-venta.php" method="post" name="data">'+
 '<input input type="hidden" value="'+id+'" readonly name="swal-input0" id="swal-input0" class="form-control border-input">' +

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
 '<label>Marca</label>' +
 '<input input type="text" name="marc" id="marc" readonly class="form-control border-input">' +
 '</div>'+
'</div>'+

'<div class="col-md-6">'+
  '<div class="form-group">'+
 '<label>Modelo</label>' +
 '<input input type="text" name="mod" id="mod" readonly class="form-control border-input">' +
 '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
 '<label>Serie</label>' +
 '<input input type="text" name="ser" id="ser" readonly class="form-control border-input">' +
 '</div>'+
'</div>'+


'<div class="col-md-6">'+
  '<div class="form-group">'+
 '<label>Costo</label>' +
 '<input input type="number" name="costo" id="costo" readonly class="form-control border-input">' +
 '</div>'+
'</div>'+
'</div>'+

'<h3>Datos de cliente</h3>'+//datos de cliente

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
 '<label>Id cliente</label>' +
 '<select class="form-control form-control-sm" textalign="center" name="tv_venta" id="tv_venta">'+
  <?php
  $ejec7 = mysqli_query($conn, $clientes);
  while($fila=mysqli_fetch_array($ejec7)){?>
  '<?php echo '<option value="'.$fila["id_folio"].'">'.$fila["id_folio"].'</option>'; ?>'+
  <?php } ?>
  '</select>' +
 '</div>'+
'</div>'+

'<div class="col-md-6">'+
  '<div class="form-group">'+
 '<label>Nombre(s)</label>' +
 '<input input type="text" name="nombre" id="nombre" readonly class="form-control border-input">' +
 '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
 '<label>Apellidos</label>' +
 '<input input type="text" name="apellidos" id="apellidos" readonly class="form-control border-input">' +
 '</div>'+
'</div>'+
'<div class="col-md-12">'+
 '<Button type="submit" class= "btn btn-info btn-fill btn-wd">Vender producto</Button>'+
 
 '</form></div>',
 showCancelButton: true,
 confirmButtonColor: '#3085d6',
 cancelButtonColor: '#d33',
 confirmButtonText: '</form>',
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
  url: 'recepcion_fn_actualizar_cliente.php',
  data: {id: id},
  dataType : 'json',
})
.done(function(data){

  $("#nombre").val(data.data.nom);
  $("#apellidos").val(data.data.ape);

})
.fail(function(){
alert('hubo un error')
})

})

};

</script>


  </body>
</html>
