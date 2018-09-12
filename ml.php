<!DOCTYPE html>
<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];



$consulta = "SELECT id_equipo,equipo, marca,modelo, falla, comentarios
FROM reparar_tv
WHERE estado='En reparacion' and id_personal='$var_clave';";

$consulta1 = "SELECT id_equipo,equipo, marca,modelo, falla, comentarios
FROM reparar_tv
WHERE estado='En reparacion' ";

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


  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="tecnico.php">ID de Usuario: <?php echo $var_name ?></a>
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
          <p class="app-sidebar__user-name"><?php echo $var_name ?></p>

        </div>
      </div>
      <ul class="app-menu">
      <li><a class="app-menu__item" href="tecnico.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Tareas</span></a></li>







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
              <button class="btn btn-info" type="button" onclick="alerta();">Nuevas</button>
              <button class="btn btn-success" type="button" onclick="location='recepcion_e_reparados.php'">Pendientes</button>
              <button class="btn btn-danger" type="button" onclick="location='recepcion_e_sin_repar.php'">Publicadas</button>
              <button class="btn btn-info" type="button" onclick="alerta();">Vendidas</button>
              <button class="btn btn-success" type="button" onclick="location='recepcion_e_reparados.php'">Ver todas</button>
              <button class="btn btn-danger" type="button" onclick="location='recepcion_e_sin_repar.php'">Solicitudes de taller</button>
              <button class="btn btn-danger" type="button" onclick="location='recepcion_e_sin_repar.php'">Ventas</button>
  </p>
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
//ventana de nuevo cliente
    function reporte(id_equipo){

var id = id_equipo;
    swal({
   title: 'Enviar reporte',
   html:
'<div class="card-body"> <form action="tecnico_fn_reporte.php" method="post" name="data" enctype="multipart/form-data">'+

'<div class="col-md-12">'+
'<div class="form-group">'+
'<input type="text" name="swal-input0"  id="swal-input0" value="'+id+'"  class="form-control border-input" readonly >' +//Id Equipo

        '<label>Falla encontrada</label>'+
        '<textarea type="text" name="swal-input1" id="swal-input1" required class="form-control border-input"></textarea>'+

        '<label>Procedimiento realizado</label>'+
        '<textarea type="text" name="swal-input2" id="swal-input2" required class="form-control border-input"></textarea>'+

        '<label>Estado de la reparación</label>'+

        '<select class="form-control form-control-sm" text-align="center" required name="swal-input3" id="swal-input3">'+
        '<option value="Reparado">Reparado</option>'+
        '<option value="Sin solucion">Sin solución</option>'+
        '<option value="Necesita refaccion">Necesita refacción</option>'+
        '</select>' +

        '<label>Estado en que llega</label>' +
 '<input input type="text" name="swal-input5" id="swal-input5" placeholder="Eje. Humedad, suciedad, tierra, etc" class="form-control border-input" maxlength="80" required>' +

 '<label>Imagen 1</label>' +
 '<input input type="file" name="swal-input6" id="swal-input6"  required accept="image/png/jpg" class="form-control border-input" required></br>'+

 '<label>Imagen 2</label>' +
 '<input input type="file" name="swal-input7" id="swal-input7"   accept="image/png/jpg" class="form-control border-input" ></br>'+

 '<label>Imagen 3</label>' +
 '<input input type="file" name="swal-input8" id="swal-input8"   accept="image/png/jpg" class="form-control border-input" ></br>'+


'<div class="col-md-12 entradas" style="display:none;">'+
'<label># de pieza que necesita</label>'+
'<input type="text" name="swal-input4" value="NA" id="swal-input4" class="form-control border-input"  ><br></br>'+
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
  $("#swal-input3").change(function(){
    if(this.value == 'Necesita refaccion'){
      $(".entradas").show();
    }else{
      $(".entradas").hide();
    }
  })

  };
  </script>

</div>
</div>

  </body>
</html>
