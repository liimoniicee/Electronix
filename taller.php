<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

$total_equipos ="SELECT id_equipo, marca, modelo, falla, comentarios, fecha_ingreso, servicio, estado, ubicacion, id_folio, id_personal
                from reparar_tv";

$reparados = "SELECT
id_equipo,id_folio, id_personal,nombre,apellidos,celular,correo, equipo, marca, modelo, accesorios, falla, comentarios, fecha_ingreso,fecha_entregar, servicio,ubicacion,presupuesto,mano_obra,abono,restante,costo_total,estado FROM clientes LEFT JOIN reparar_Tv USING(id_folio) where estado = 'Reparada'
union all SELECT id_equipo,id_folio, id_personal,nombre,apellidos,celular,correo, equipo, marca, modelo, accesorios, falla, comentarios, fecha_ingreso,fecha_entregar, servicio,ubicacion,presupuesto,mano_obra,abono,restante,costo_total,estado FROM clientes LEFT JOIN reparar_otros USING(id_folio) where estado = 'Reparada'";

$pendientes = "SELECT
equipo, id_folio, falla, id_equipo, fecha_ingreso, fecha_entregar, fecha_egreso, servicio, estado, ubicacion
FROM
reparar_tv
WHERE
estado = 'Pendiente';";

$en_repar = "SELECT
equipo, id_folio, falla, id_equipo, fecha_ingreso, fecha_entregar, fecha_egreso, servicio, estado, ubicacion
FROM
reparar_tv
WHERE
estado = 'En reparacion';";

$revisados = "SELECT
equipo, id_folio, falla, id_equipo, fecha_ingreso, fecha_entregar, fecha_egreso, servicio, estado, ubicacion
FROM
reparar_tv
WHERE
estado = 'Diagnosticada';";

$sinsolucion = "SELECT
equipo, id_folio, falla, id_equipo, fecha_ingreso, fecha_entregar, fecha_egreso, servicio, estado, ubicacion
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


        <div class="card">

          <div class="row">
           <div class="col-sm-12" align="center">
             <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <form id='form-id'>

                    <label class="btn btn-primary active" id='watch-me'>
                      <input name='test' type='radio' checked /> Equipos en taller
                      </label>

                      <label class="btn btn-primary" id='see-me'>
                      <input name='test' type='radio' /> Pendientes
                    </label>

                      <label class="btn btn-primary" id='look-me'>
                      <input name='test' type='radio' /> Revisadas
                    </label>

                    <label class="btn btn-primary" id='look-me2'>
                      <input name='test' type='radio' /> En reparación
                    </label>

                    <label class="btn btn-primary" id='look-me3'>
                      <input name='test' type='radio' /> Sin solución
                    </label>

                    <label class="btn btn-primary" id='look-me4'>
                      <input name='test' type='radio' /> Reparado
                    </label>

                  </form>
                </div>
                  <br><br>
                  <div id='show-me'>
                    <div class="tile">
                      <div class="tile-body">

                  <table id="a-tables" class="table table-dark table-hover table-responsive">
                  <thead>
                    <!--<th data-field="state" data-checkbox="true"></th>-->
                    <th data-field="id">id_equipo</th>
                  <th data-field="Marca" data-sortable="true">Marca</th>
                  <th data-field="Modelo" data-sortable="true">Modelo</th>
                  <th data-field="Falla" data-sortable="true">Falla</th>
                  <th data-field="Comentarios" data-sortable="true">Comentarios</th>
                  <th data-field="Fecha" data-sortable="true">Fecha de ingreso</th>
                  <th data-field="Servicio" data-sortable="true">Servicio</th>
                  <th data-field="Estado" data-sortable="true">Estado</th>
                  <th data-field="Ubicacion" data-sortable="true">Ubicación</th>
                  <th data-field="Folio" data-sortable="true">Folio</th>
                  <th data-field="Personal" data-sortable="true">Personal</th>
                  <th data-field="Acción" data-sortable="true">Acción</th>

                  </thead>
                  <?php
                  $ejec1 = mysqli_query($conn, $total_equipos);
                  while($fila=mysqli_fetch_array($ejec1)){
                    $id_equipo      = $fila['id_equipo'];
                    $marc           = $fila['marca'];
                    $mod            = $fila['modelo'];
                    $falla          = $fila['falla'];
                    $come           = $fila['comentarios'];
                    $fech_ing       = $fila['fecha_ingreso'];
                    $servi          = $fila['servicio'];
                    $est         = $fila['estado'];
                    $ubi      = $fila['ubicacion'];
                    $id_f           = $fila['id_folio'];
                    $id_p           = $fila['id_personal'];

                  ?>
                                <tr>
                                    <td><?php echo $id_equipo ?></td>
                                    <td><?php echo $marc ?></td>
                                    <td><?php echo $mod ?></td>
                                    <td><?php echo $falla ?></td>
                                    <td><?php echo $come ?></td>
                                    <td><?php echo $fech_ing ?></td>
                                    <td><?php echo $servi ?></td>
                                    <td><?php echo $est ?></td>
                                    <td><?php echo $ubi ?></td>
                                    <td><?php echo $id_f ?></td>
                                    <td><?php echo $id_p ?></td>
                                    <td>
                                    <button onclick="garantia(<?php echo $id_f?>), enviarorden(<?php echo $id_f?>);" class="btn btn-simple btn-warning btn-icon edit" title="Generar garantía"><i ></i></button>
                                    </td>

                      </tr>
                    <?php } ?>
                    <tbody></br>
                        Todos los equipos disponibles
                  </tbody>
                  </table>
                  </div>
                  </div>

                  </div>


<!-- comienza tabla 2 -->
                  <div id='show-me-two' style='display:none; border:2px solid #ccc'>


          <table id="a-tables" class="table table-dark table-hover table-responsive">
    <thead>
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
      $ejec2 = mysqli_query($conn, $pendientes);
    while($fila=mysqli_fetch_array($ejec2)){
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
            Equipos pendientes
      </tbody>
  </table>
      </div>

                    <!--Termina tabla 2-->

                    <!--Comienza tabla 3-->
                  <div id='show-me-three' style='display:none; border:2px solid #ccc'>


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
                  $ejec3 = mysqli_query($conn, $revisados);
                  while($fila=mysqli_fetch_array($ejec3)){
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
                  Equipos revisados
                  </tbody>
                  </table>


                    </div>

                <div id='show-me-three2' style='display:none; border:2px solid #ccc'>



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
                                    $ejec4 = mysqli_query($conn, $en_repar);
                                    while($fila=mysqli_fetch_array($ejec4)){
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
                                    Equipos en Reparación
                                    </tbody>
                                    </table>


                  </div>
                    <!-- Termina tabla 4 -->
                    <!-- Comienza tabla 5 -->

              <div id='show-me-three3' style='display:none; border:2px solid #ccc'>


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
              $ejec5 = mysqli_query($conn, $sinsolucion);
              while($fila=mysqli_fetch_array($ejec5)){
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
              Equipos Sin solución
              </tbody>
              </table>

                </div>
                <!-- Termina tabla 5 -->
                <!-- Comienza tabla 6 -->

                <div id='show-me-three4' style='display:none; border:2px solid #ccc'>


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
                $ejec6 = mysqli_query($conn, $reparados);
                while($fila=mysqli_fetch_array($ejec6)){
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
                Equipos Sin solución
                </tbody>
                </table>



                  </div>
                  <!-- Termina tabla 6-->
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

    //tercero
    $("#look-me").click(function()
    {
      $("#show-me-three:hidden").show('slow');
     $("#show-me").hide();
     $("#show-me-two").hide();
     $("#show-me-three2").hide();
     $("#show-me-three3").hide();
     $("#show-me-three4").hide();
     });
     $("#look-me").click(function()
    {
      if($('see-me-three').prop('checked')===false)
     {
      $('#show-me-three').hide();
     }
    });

    //cuarto
    $("#look-me2").click(function()
    {
      $("#show-me-three2:hidden").show('slow');
     $("#show-me").hide();
     $("#show-me-two").hide();
     $("#show-me-three").hide();
     $("#show-me-three3").hide();
     $("#show-me-three4").hide();
     });
     $("#look-me2").click(function()
    {
      if($('see-me-three2').prop('checked')===false)
     {
      $('#show-me-three2').hide();
     }
    });

      //quinto
    $("#look-me3").click(function()
    {
      $("#show-me-three3:hidden").show('slow');
     $("#show-me").hide();
     $("#show-me-two").hide();
     $("#show-me-three2").hide();
     $("#show-me-three").hide();
     $("#show-me-three4").hide();
     });
     $("#look-me3").click(function()
    {
      if($('see-me-three3').prop('checked')===false)
     {
      $('#show-me-three3').hide();
     }
    });

    //sexto
    $("#look-me4").click(function()
    {
      $("#show-me-three4:hidden").show('slow');
     $("#show-me").hide();
     $("#show-me-two").hide();
     $("#show-me-three2").hide();
     $("#show-me-three3").hide();
     $("#show-me-three").hide();
     });
     $("#look-me4").click(function()
    {
      if($('see-me-three4').prop('checked')===false)
     {
      $('#show-me-three4').hide();
     }
    });

   });


  </script>

  <div class="content-panel">
<div class="col-lg-7">


</div>
</div>

</body>
</html>
