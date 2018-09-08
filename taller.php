<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

$reparados = "SELECT
id_equipo,id_folio, id_personal,nombre,apellidos,celular,correo, equipo, marca, modelo, accesorios, falla, comentarios, fecha_ingreso,fecha_entregar, servicio,ubicacion,presupuesto,mano_obra,abono,restante,costo_total,estado FROM clientes LEFT JOIN reparar_Tv USING(id_folio) where estado = 'Reparada'
union all SELECT id_equipo,id_folio, id_personal,nombre,apellidos,celular,correo, equipo, marca, modelo, accesorios, falla, comentarios, fecha_ingreso,fecha_entregar, servicio,ubicacion,presupuesto,mano_obra,abono,restante,costo_total,estado FROM clientes LEFT JOIN reparar_otros USING(id_folio) where estado = 'Reparada'";


$sinsolucion = "SELECT
equipo, falla, id_equipo, fecha_ingreso, fecha_entregar, fecha_egreso, servicio, estado, ubicacion
FROM
reparar_tv
WHERE
estado = 'Sin solucion';";


?>
<html lang="es">
  <head>

    <!-- Open Graph Meta-->
    <title>Taller</title>
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
      <li><a class="app-menu__item" href="Recepcion.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Recepción</span></a></li>
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
          <h3><i class="fa fa-dashboard"></i>Taller</h3>
          <p>Dar un buen servicio es nuestra prioridad</p>
        </div>
      </div>
        <div class="card-body center" >
          <div class="bs-component" style="margin-bottom: 15px;">
            <div class="btn-group btn-group-toggle" data-toggle="buttons">
              <label class="btn btn-primary active">
                <input id="option1" type="radio" name="options" autocomplete="off" checked=""> Pendientes
              </label>
              <label class="btn btn-primary">
                <input id="option2" type="radio" name="options" autocomplete="off"> En reparación
              </label>
              <label class="btn btn-primary">
                <input id="option3" type="radio" name="options" autocomplete="off"> Revisadas
              </label>
              <label class="btn btn-primary">
                <input id="option4" type="radio" name="options" value="2" autocomplete="off"> Sin solución
              </label>
              <label class="btn btn-primary">
                <input id="option5" type="radio" name="options" value="1" autocomplete="off"> Reparado
              </label>
            </div>
          </div>
        </div>

        <div class="card">

          <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                   <div id="Options1" class="desc" style="display: none;">
                  <table id="a-tables" class="table table-dark table-hover table-responsive">
                      <thead>
                          <!--<th data-field="state" data-checkbox="true"></th>-->
                          <th data-field="id">id_equipo</th>
                        <th data-field="folio" data-sortable="true">Folio</th>
                        <th data-field="nombre" data-sortable="true">Nombre</th>
                        <th data-field="apellido" data-sortable="true">Apellidos</th>

                        <th data-field="marca" data-sortable="true">Marca</th>
                        <th data-field="modelo" data-sortable="true">Modelo</th>

                        <th data-field="fecha_entrega" data-sortable="true">Reparación</th>
                        <th data-field="costo" data-sortable="true">Restante</th>
                        <th data-field="garantia" data-sortable="true">Acción</th>



                      </thead>
                      <?php
                        $ejec1 = mysqli_query($conn, $reparados);
                      while($fila=mysqli_fetch_array($ejec1)){
                          $id_equipo          = $fila['id_equipo'];
                          $id           = $fila['id_folio'];
                          $nombre          = $fila['nombre'];
                          $apellidos        = $fila['apellidos'];

                          $marca           = $fila['marca'];
                          $modelo           = $fila['modelo'];
                          $fecha_entregar        = $fila['fecha_entregar'];
                          $total        = $fila['restante'];
                  ?>
                                      <tr>
                                          <td><?php echo $id_equipo ?></td>
                                          <td><?php echo $id ?></td>
                                          <td><?php echo $nombre ?></td>
                                          <td><?php echo $apellidos ?></td>


                                          <td><?php echo $marca ?></td>
                                          <td><?php echo $modelo ?></td>
                                          <td><?php echo $fecha_entregar ?></td>
                                          <td><?php echo $total ?></td>
                                          <td>
                                          <button onclick="garantia(<?php echo $id?>), enviarorden(<?php echo $id?>);" class="btn btn-simple btn-warning btn-icon edit" title="Generar garantía"><i ></i></button>
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
<!-- Aquí termina la tabla reparados  -->

              <div class="row">

                  <div class="col-md-12">
                    <div class="tile">
                      <div class="tile-body">
 <div id="Options2" class="desc">
          <table id="a-tables" style="display: none;" class="table table-dark table-hover table-responsive">
    <thead>
        <!--<th data-field="state" data-checkbox="true"></th>-->
        <th data-field="id">id_equipo</th>
      <th data-field="equipo" data-sortable="true">equipo</th>
      <th data-field="falla" data-sortable="true">falla</th>
      <th data-field="fecha_ingreso" data-sortable="true">fecha_ingreso</th>
      <th data-field="fecha_entregar" data-sortable="true">fecha_entregar</th>
      <th data-field="fecha_egreso" data-sortable="true">fecha_egreso</th>
      <th data-field="estado" data-sortable="true">estado</th>
      <th data-field="ubicacion" data-sortable="true">ubicacion</th>.
      <th data-field="accion" data-sortable="true">Acción</th>

    </thead>
    <?php
      $ejec2 = mysqli_query($conn, $sinsolucion);
    while($fila=mysqli_fetch_array($ejec2)){
        $id_equipo          = $fila['id_equipo'];
        $equipo           = $fila['equipo'];
        $falla          = $fila['falla'];
        $fecha_ingreso        = $fila['fecha_ingreso'];
        $fecha_entregar        = $fila['fecha_entregar'];
        $fecha_egreso        = $fila['fecha_egreso'];
        $estado        = $fila['estado'];
        $ubicacion        = $fila['ubicacion'];


?>
                    <tr>
                        <td><?php echo $id_equipo ?></td>
                        <td><?php echo $equipo ?></td>
                        <td><?php echo $falla ?></td>
                        <td><?php echo $fecha_ingreso ?></td>
                        <td><?php echo $fecha_entregar ?></td>
                        <td><?php echo $fecha_egreso ?></td>
                        <td><?php echo $estado ?></td>
                        <td><?php echo $ubicacion ?></a></td>
                        <td>
                        <button onclick="cambio(<?php echo $id_equipo?>), enviarorden(<?php echo $id_equipo?>);" class="btn btn-simple btn-warning btn-icon edit"><i ></i></button>
                        <button  class="btn btn-simple btn-success btn-icon edit"><i ></i></button>
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
<!-- aquí termina la tabla equipos sin solución-->

  </main>

<script>

$(document).ready(function() {
    $("input[name$='options']").click(function() {
        var test = $(this).val();

        $("div.desc").hide();
        $("#Cars" + test).show();
    });
});
</script>



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

</body>
</html>
