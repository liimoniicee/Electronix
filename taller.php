<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

$tecnico = "SELECT * from personal where tipo = 'Tecnico';";

$total_equipos ="SELECT id_equipo, marca, modelo, falla, comentarios, fecha_ingreso, servicio, estado, ubicacion, id_folio, id_personal
                from reparar_tv";

$reparados = "SELECT
equipo, id_folio, falla, id_equipo, fecha_ingreso, fecha_entregar, fecha_egreso, servicio, estado, ubicacion
FROM
reparar_tv
WHERE
estado = 'Reparada';";


$pendientes = "SELECT
equipo, id_folio, falla, id_equipo, fecha_ingreso, fecha_entregar, fecha_egreso, servicio, estado, ubicacion
FROM
reparar_tv
WHERE
estado = 'Pendiente';";

$revisados = "SELECT
equipo, id_folio, falla, id_equipo, fecha_ingreso, fecha_entregar, fecha_egreso, servicio, estado, ubicacion
FROM
reparar_tv
WHERE
estado = 'Diagnosticada';";

$en_repar = "SELECT
equipo, id_folio, falla, id_equipo, fecha_ingreso, fecha_entregar, fecha_egreso, servicio, estado, ubicacion
FROM
reparar_tv
WHERE
estado = 'En reparacion';";

$sinsolucion = "SELECT
equipo, id_folio, falla, id_equipo, fecha_ingreso, fecha_entregar, fecha_egreso, servicio, estado, ubicacion
FROM
reparar_tv
WHERE
estado = 'Sin solucion';";

$refaccion = "SELECT
equipo, id_folio, falla, id_equipo, fecha_ingreso, fecha_entregar, fecha_egreso, servicio, estado, ubicacion
FROM
reparar_tv
WHERE
estado = 'Necesita refaccion';";


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
                      <input name='test' type='radio' /> En reparacion
                    </label>

                    <label class="btn btn-primary" id='look-me2'>
                      <input name='test' type='radio' /> Revisados
                    </label>

                    <label class="btn btn-primary" id='look-me3'>
                      <input name='test' type='radio' /> Necesita refacción
                    </label>

                    <label class="btn btn-primary" id='look-me4'>
                      <input name='test' type='radio' /> Sin solución
                    </label>

                    <label class="btn btn-primary" id='look-me5'>
                      <input name='test' type='radio' /> Reparado
                    </label>

                  </form>
                </div>
                  <br><br>
                  <div id='show-me'>
                    <div class="tile">
                      <div class="tile-body">

                  <table id="a-tables" style="font-size:13px" class="table table-dark table-hover table-responsive">
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
                    $id           = $fila['id_folio'];
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
                                    <td><?php echo $id ?></td>
                                    <td><?php echo $id_p ?></td>
                                    <td>
                                    <button onclick="garantia(<?php echo $id?>), enviarorden(<?php echo $id?>);" class="btn btn-simple btn-warning btn-icon edit" title="Generar garantía"><i ></i></button>
                                    <button onclick="costos(<?php echo $id ?>), enviarorden(<?php echo $id ?>);" class="btn btn-simple btn-success btn-icon edit" title="Nueva orden"><i ></i></button>

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
                        <button onclick="asignar_tec(<?php echo $id_equipo?>), mod_asignar_tec(<?php echo $id?>);" title="Asignar tecnico" class="btn btn-simple btn-success btn-icon edit"><i ></i></button>
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
                  $ejec3 = mysqli_query($conn, $en_repar);
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
                        </td>

                  </tr>
                  <?php } ?>

                  <tbody></br>
                  Equipos en reparación
                  </tbody>
                  </table>


                    </div>
                    <!-- Termina tabla 4 -->

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
                                    $ejec4 = mysqli_query($conn, $revisados);
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
                                          <button onclick="reporte(<?php echo $id_equipo?>), enviarreporte(<?php echo $id_equipo?>);" title="Ver reporte" class="btn btn-simple btn-primary btn-icon edit"><i ></i></button>

                                          <button onclick="costos(<?php echo $id?>), enviarorden(<?php echo $id?>);" title="Asignar Costos" class="btn btn-simple btn-success btn-icon edit"><i ></i></button>
                                          </td>

                                    </tr>
                                    <?php } ?>
                                    <tbody></br>
                                    Equipos en revisados
                                    </tbody>
                                    </table>


                  </div>
                    <!-- Termina tabla 4 -->
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
                  $ejec8 = mysqli_query($conn, $refaccion);
                  while($fila=mysqli_fetch_array($ejec8)){
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
                        </td>

                  </tr>
                  <?php } ?>

                  <tbody></br>
                  Equipos que necesitan refaccion
                  </tbody>
                  </table>


                    </div>

                    <!-- Comienza tabla 5 -->

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
                    </td>

              </tr>
              <?php } ?>
              <tbody></br>
                  Equipos revisados
                  </tbody>
                  </table>


                    </div>

                <!-- Comienza tabla 6 -->


                              <div id='show-me-three5' style='display:none; border:2px solid #ccc'>


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
                                    </td>

                              </tr>
                              <?php } ?>
                              <tbody></br>
                                  Equipos reparados
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

    //tercero
    $("#look-me").click(function()
    {
      $("#show-me-three:hidden").show('slow');
     $("#show-me").hide();
     $("#show-me-two").hide();
     $("#show-me-three2").hide();
     $("#show-me-three5").hide();
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
     $("#show-me-three5").hide();
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
     $("#show-me-three5").hide();
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
     $("#show-me-three5").hide();
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

    //septimo
    $("#look-me5").click(function()
    {
      $("#show-me-three5:hidden").show('slow');
     $("#show-me").hide();
     $("#show-me-two").hide();
     $("#show-me-three2").hide();
     $("#show-me-three4").hide();
     $("#show-me-three3").hide();
     $("#show-me-three").hide();
     });
     $("#look-me4").click(function()
    {
      if($('see-me-three5').prop('checked')===false)
     {
      $('#show-me-three5').hide();
     }
    });


   });


  </script>
<script>
  function mod_asignar_tec(id){
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
       $("#swal-input3").val(data.data.nom);
       $("#swal-input4").val(data.data.ape);

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
function enviarreporte(id_equipo){
 $.ajax({
     // la URL para la petición
     url : 'recepcion_fn_reporte.php',
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
       $("#swal-input0").val(data.data.id_equipo);
       $("#swal-input1").val(data.data.falla);
       $("#swal-input2").val(data.data.solu);
       $("#swal-input3").val(data.data.conc);
       $("#swal-input4").val(data.data.part);
       $("#swal-input5").val(data.data.pers);
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
function asignar_tec(id){

swal({
title: 'Garantia',
html:
'<div class="card-body"> <form action="taller_fn_asignar_tecnico.php" method="post" name="data" content="text/html; charset=utf-8" >'+
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
        '<label>Apellidos</label>'+
        '<input type="text" name="swal-input4" id="swal-input4" readonly maxlength="25" required class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
  '<label>Tecnico</label>'+
  '<select class="form-control form-control-sm" textalign="center" name="tecnico" id="tecnico">'+
  <?php
  $ejec7 = mysqli_query($conn, $tecnico);
  while($fila=mysqli_fetch_array($ejec7)){?>
  '<?php echo '<option value="'.$fila["id_personal"].'">'.$fila["nombre"].'</option>'; ?>'+
  <?php } ?>
  '</select>' +
    '</div>'+
'</div>'+
'</div>'+


'<div class="col-md-12">'+
'<Button type="submit" class= "btn btn-info btn-fill btn-wd">Confirmar</Button>'+

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

};

</script>

 <script type="text/javascript">
//ventana actualizar cliente
function costos(id){


swal({
title: 'Asignar costos',
html:
'<div class="card-body"> <form action="taller_fn_costos.php" method="post" name="data" content="text/html; charset=utf-8" >'+

'<input type="hidden" name="swal-input1"  id="swal-input1" class="form-control border-input" readonly >' +//Id Equipo

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Costo de refacción</label>'+
        '<input name="swal-input19"  id="swal-input19" type="number" maxlength="25" placeholder="Con decimal" required class="form-control border-input">'+
    '</div>'+
'</div>'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Costo mano de obra</label>'+
        '<input name="swal-input20"  id="swal-input20"  type="number" maxlength="25" placeholder="Con decimal" required class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Abono del cliente</label>'+
        '<input type="number" name="swal-input21" id="swal-input21"  required placeholder="Escribir con punto decimal" onkeypress="operaciones();" class="form-control border-input">'+
    '</div>'+
'</div>'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Sub Total</label>'+
        '<input name="swal-input22"  id="swal-input22" type="number" name="marca" id="marca" maxlength="25" required readonly class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Total</label>'+
        '<input name="swal-input23"  id="swal-input23" type="number" name="marca" id="marca" maxlength="25" required readonly class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Estado del equipo</label>'+
        '<select class="form-control form-control-sm" required textalign="center" name="swal-input24" id="swal-input24"><option value="Reparada" >Reparado</option><option value="Sin solucion">Sin solucion</option></option><option value="Necesita refaccion">Necesita refaccion</option></select>' +
    '</div>'+
'</div>'+
'</div>'+

'<div class="col-md-12">'+


'<Button type="submit" class= "btn btn-info btn-fill btn-wd">Asignar costos y estado</Button>'+

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
function reporte(id_equipo){


swal({
title: 'Reporte de tecnico',
html:
'<div class="card-body"> <form action="#" method="post" name="data" content="text/html; charset=utf-8" >'+

'<input type="hidden" name="swal-input0"  id="swal-input0" class="form-control border-input" readonly >' +//Id Equipo

'<div class="row">'+
'<div class="col-md-12">'+
  '<div class="form-group">'+
        '<label>Falla revisada</label>'+
        '<textarea type="text" name="swal-input1" id="swal-input1"  readonly class="form-control border-input"></textarea>'+
    '</div>'+
'</div>'+

'<div class="col-md-12">'+
  '<div class="form-group">'+
        '<label>Procedimiento que se realizó</label>'+
        '<textarea type="text" readonly name="swal-input2" id="swal-input2"  class="form-control border-input"></textarea>'+
        '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-12">'+
  '<div class="form-group">'+
        '<label>Estado de reparación</label>'+
        '<input type="text" name="swal-input3" id="swal-input3"  required readonly  class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-12">'+
  '<div class="form-group">'+
        '<label>Parte que necesita</label>'+
        '<input type="text" name="swal-input4" id="swal-input4"  required readonly  class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+


'<div class="col-md-12">'+



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

function operaciones()
{
  var refaccion =document.getElementById('swal-input19').value;
  var mano =document.getElementById('swal-input20').value;
  var abono =document.getElementById('swal-input21').value;

  var suma =parseInt(refaccion)+parseInt(mano);

  var total =parseInt(suma)-parseInt(abono);

  var subtotal =parseInt(document.getElementById('swal-input22').value= suma);
  var totalt =parseInt(document.getElementById('swal-input23').value= total);


}


</script>

  <div class="content-panel">
<div class="col-lg-7">


</div>
</div>

</body>
</html>
