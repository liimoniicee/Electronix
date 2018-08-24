<!DOCTYPE html>
<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];


$consulta = "SELECT
id_folio, nombre, apellidos, celular, correo, puntos
FROM
clientes;";

?>
<html lang="es">
  <head>

    <!-- Open Graph Meta-->
    <title>Recepcion</title>
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
          <p class="app-sidebar__user-name"><?php echo $var_name ?></p>

        </div>
      </div>
      <ul class="app-menu">
      <li><a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Inicio</span></a></li>
      <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">Recepcion</span><i class="treeview-indicator fa fa-angle-right"></i></a>
      <ul class="treeview-menu">
            <li><a class="treeview-item" onclick="alerta();" href="#"><i  class="icon fa fa-circle-o"></i> Nuevo cliente</a></li>
            <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i> Equipos sin solución</a></li>

            <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Avisos</a></li>
            <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Ventas</a></li>
          </ul>
      <li><a class="app-menu__item" href="index.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Clientes</span></a></li>
      <li><a class="app-menu__item" href="index.html"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Taller</span></a></li>
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
        <div>
          <h1><i class="fa fa-dashboard"></i>Registro de nuevo cliente</h1>
          <p>Dar un buen servicio es nuestra prioridad</p>
        </div>

      </div>





<div class="card text-white bg-primary mb-3">
  <div class="card-body">


          <div class="col-lg-12">
            <p class="bs-component">
              <button class="btn btn-primary" type="button" onclick="alerta();">Nuevo cliente</button>
              <button class="btn btn-success" type="button" onclick="location='e_reparados.php'">Equipos reparados</button>
              <button class="btn btn-danger" type="button" onclick="location='e_sin_repar.php'">Equipos sin solución</button>
              <button class="btn btn-info" type="button" onclick="location='avisos.php'">Avisos</button>
              <button class="btn btn-warning" type="button">Ventas</button>

            </p>
              <div class="row">
                <div class="col-lg-3">
          <input id="search" type="text" class='form-control' placeholder="Buscar clientes dentro de la tabla">
        </div>
</div>
          <table id="a-table" class="table table-striped table-dark">
    <thead>
        <!--<th data-field="state" data-checkbox="true"></th>-->
        <th data-field="id">id</th>
      <th data-field="fecha" data-sortable="true">Nombre</th>
      <th data-field="estatus" data-sortable="true">Apellidos</th>
      <th data-field="estatus" data-sortable="true">Celular</th>
      <th data-field="estatus" data-sortable="true">Correo</th>

    </thead>
    <?php
      $ejecutar = mysqli_query($conn, $consulta);
    while($fila=mysqli_fetch_array($ejecutar)){
        $id          = $fila['id_folio'];
        $nom           = $fila['nombre'];
        $ape          = $fila['apellidos'];
        $cel        = $fila['celular'];
        $cor        = $fila['correo'];


?>
                    <tr>
                        <td><?php echo $id ?></td>
                        <td><?php echo $nom ?></td>
                        <td><?php echo $ape ?></td>
                        <td><?php echo $cel ?></td>
                        <td><a href="#"><?php echo $cor ?></a></td>


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
    <script type="text/javascript">

    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="assets/js/sweetalert2.js"></script>

    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>

    <div class="content-panel">
 <div class="col-lg-7">

  <script type="text/javascript">

    function alerta(){


    swal({
   title: 'Agregar cliente',
   html:

   '<div class="col-lg-7"> <form action="new_cliente.php" method="post" name="data">'+
   '<label>Nombre(s)</label>' +
   '<input input type="text" name="nom" id="nom" class="form-control border-input maxlength="25" required>' +
   '<label>Apellidos</label>' +
   '<input input type="text" name="ape" id="ape" class="form-control border-input maxlength="25" required>' +
   '<label>Direccion</label>' +
   '<input input type="text" name="dire" id="dire" class="form-control border-input maxlength="25" required>' +
   '<label>Correo</label>' +
   '<input input type="email" name="cor" id="cor" class="form-control border-input requiered">' +
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


  <script>
  //script para seleccionar fila en tabla

  $(function () {
  $('#a-table tr>*').click(function (e) {
      var a = $(this).closest('tr').find('a')
      e.preventDefault()
      location.href = a.attr('href')
  })
})
  </script>

<!-- Script para buscar en tabla. -->
<script>
// captura el evento keyup cuando escribes en el input
  $("#search").keyup(function(){
      _this = this;
      // Muestra los tr que concuerdan con la busqueda, y oculta los demás.
      $.each($("#a-table tbody tr"), function() {
          if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
             $(this).hide();
          else
             $(this).show();
      });
  });
</script>
  </body>
</html>
