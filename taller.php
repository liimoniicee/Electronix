<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

$var_tipo = $_SESSION['tipo'];
if($var_tipo != "Administrador" && $var_tipo != "Jefe de taller" ) {
  //echo "<script>alert('No tienes acceso a esta página!')</script>";
   header("Location: Error_restrinccion.html");
 }
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
equipo, id_folio, falla, id_equipo, modelo, fecha_ingreso, fecha_entregar, fecha_egreso, servicio, estado, ubicacion
FROM
reparar_tv
WHERE
estado = 'Pendiente' and ubicacion='Taller';";

$revisados = "SELECT
equipo, modelo, id_folio, falla, id_equipo, fecha_ingreso, fecha_entregar, fecha_egreso, servicio, estado, ubicacion
FROM
reparar_tv
WHERE
estado = 'Diagnosticada' and ubicacion='Taller';";

$en_repar = "SELECT
equipo, id_folio, falla, id_equipo, fecha_ingreso, fecha_entregar, fecha_egreso, servicio, estado, ubicacion
FROM
reparar_tv
WHERE
estado = 'En reparacion' and ubicacion='Taller';";

$sinsolucion = "SELECT
equipo, id_folio, falla, id_equipo, fecha_ingreso, modelo, fecha_entregar, fecha_egreso, servicio, estado, ubicacion
FROM
reparar_tv
WHERE
estado = 'Sin solucion';";

$refaccion = "SELECT *
FROM reparar_tv
WHERE estado in('necesita refaccion', 'autorizacion taller');";

$avisos = "SELECT *
FROM avisos where tipo= 'Taller' and estado='pendiente' order by fecha desc;";

$num_avisos = "SELECT COUNT(*) FROM avisos where tipo= 'Taller' and estado='pendiente'";

?>



<html lang="es">
  <head>

    <!-- Open Graph Meta-->
    <title>Taller</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="refresh" content="300" >
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!-- Font-icon css-->
<link href= "assets/css/themify-icons.css" rel="stylesheet">
<link rel="shortcut icon" href="assets/img/favicon.ico">
  </head>






  <body class="app sidebar-mini rtl">


    <header class="app-header"><a class="app-header__logo" href="index.php">ID de Usuario: <?php echo $var_clave ?></a>
      <!-- Sidebar toggle button--><a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
      <!-- Navbar Right Menu-->
      <ul class="app-nav">
        <li class="app-search">
          <input class="app-search__input" type="search" placeholder="Buscar">
          <button class="app-search__button"><i class="ti-search"></i></button>
        </li>
        <!--Notification Menu-->
        <?php
          $ejec0 = mysqli_query($conn, $num_avisos);
        while($fila=mysqli_fetch_array($ejec0)){
            $num_avi     = $fila['COUNT(*)'];

      }
      ?>
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i  class="ti-bell"></i><?php echo $num_avi ?></a>
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
      <li><a class="app-menu__item active" href="taller.php"><i class="app-menu__icon ti-settings"></i><span class="app-menu__label">Taller</span></a></li>
      <li><a class="app-menu__item" href="ml.php"><i class="app-menu__icon ti-shopping-cart-full"></i><span class="app-menu__label">MercadoLibre</span></a></li>
      <li><a class="app-menu__item" href="traslado.php"><i class="app-menu__icon ti-truck"></i><span class="app-menu__label">Traslados</span></a></li>
      <li><a class="app-menu__item" href="almacen.php"><i class="app-menu__icon ti-archive"></i><span class="app-menu__label">Almacen</span></a></li>
      <li><a class="app-menu__item" href="administrador.php"><i class="app-menu__icon ti-star"></i><span class="app-menu__label">Administración</span></a></li>
</ul>

    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h3><i class="fa fa-dashboard"></i>Taller</h3>
          <p>Dar un buen servicio es nuestra prioridad</p>
        </div>
      </div>

      <div class="card text-black bg-primary mb-3">
              <div class="card-body">

          <div class="row">
           <div class="col-sm-12" align="center">
             <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <form id='form-id'>

                    <label class="btn btn-success active" id='watch-me'>
                      <input name='test' type='radio' checked /> Equipos en taller
                      </label>

                      <label class="btn btn-warning" id='see-me'>
                      <input name='test' type='radio' /> Pendientes
                    </label>

                      <label class="btn btn-danger" id='look-me'>
                      <input name='test' type='radio' /> En reparacion
                    </label>

                    <label class="btn btn-success" id='look-me2'>
                      <input name='test' type='radio' /> Revisados
                    </label>

                    <label class="btn btn-warning" id='look-me3'>
                      <input name='test' type='radio' /> Necesita refacción
                    </label>

                    <label class="btn btn-danger" id='look-me4'>
                      <input name='test' type='radio' /> Sin solución
                    </label>

                    <label class="btn btn-success" id='look-me5'>
                      <input name='test' type='radio' /> Reparado
                    </label>

                  </form>
                </div>
                  <br><br>
                  <!-- comienza tabla 1 -->
                  <div id='show-me'>
                    <div class="tile">
                      <div class="tile-body">

                  <table id="a-tables"  class="table table-dark table-hover table-responsive">
                  <thead>

                    <th data-field="id">id_equipo</th>
                  <th data-field="Marca" data-sortable="true">Marca</th>
                  <th data-field="Modelo" data-sortable="true">Modelo</th>
                  <th data-field="Falla" data-sortable="true">Falla</th>
                  <th data-field="Comentarios" data-sortable="true">Comentarios</th>
                  <th data-field="Fecha" data-sortable="true">Fecha de ingreso</th>
                  <th data-field="Servicio" data-sortable="true">Servicio</th>
                  <th data-field="Estado" data-sortable="true">Estado</th>
                  <th data-field="Ubicacion" data-sortable="true">Ubicación</th>
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
                    $est            = $fila['estado'];
                    $ubi            = $fila['ubicacion'];
                    $id             = $fila['id_folio'];
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
      <td><?php echo $id_p ?></td>
      <td>
      <button onclick='costos(<?php echo $id_equipo?>),enviarorden(<?php echo $id_equipo?>);'  title='Asignar Costos' class='btn btn-simple btn-success btn-icon edit'><i class="ti-money"></i></button>

      <?php
      if($est == "Pendiente"){
      echo "

      <button onclick='asignar_tec($id_equipo), enviarorden($id_equipo);' title='Asignar tecnico' class='btn btn-simple btn-primary btn-icon edit'><i class='ti-user'></i></button>
      ";
    }elseif($est == "Diagnosticada"){
      echo "
      <button onclick='reporte($id_equipo), enviarreporte($id_equipo);' title='Ver reporte' class='btn btn-simple btn-primary btn-icon edit'><i ></i></button>

      ";
    }
    ?>
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

                    <div class="tile">
                      <div class="tile-body">
          <table id="tabla2" class="table table-dark table-hover table-responsive">
    <thead>
    <th data-field="id">ID equipo</th>
                              <th data-field="equipo" data-sortable="true">Equipo</th>
                              <th data-field="equipo" data-sortable="true">Modelo</th>

                              <th data-field="falla" data-sortable="true">Falla</th>
                              <th data-field="fecha_ingreso" data-sortable="true">Fecha ingreso</th>
                              <th data-field="fecha_entregar" data-sortable="true">Fecha reparacion</th>
                              <th data-field="ubicacion" data-sortable="true">Ubicacion</th>
                              <th data-field="accion" data-sortable="true">Acción</th>
    </thead>
    <?php
      $ejec2 = mysqli_query($conn, $pendientes);
    while($fila=mysqli_fetch_array($ejec2)){
        $id_equipo          = $fila['id_equipo'];
        $id           = $fila['id_folio'];
        $equipo           = $fila['equipo'];
        $modelo           = $fila['modelo'];

        $falla          = $fila['falla'];
        $fecha_ingreso        = $fila['fecha_ingreso'];
        $fecha_entregar        = $fila['fecha_entregar'];
        $ubicacion        = $fila['ubicacion'];


?>
                    <tr>
                        <td><?php echo $id_equipo ?></td>
                        <td><?php echo $equipo ?></td>
                        <td><?php echo $modelo ?></td>

                        <td><?php echo $falla ?></td>
                        <td><?php echo $fecha_ingreso ?></td>
                        <td><?php echo $fecha_entregar ?></td>
                        <td><?php echo $ubicacion ?></a></td>
                        <td>
                        <button onclick="asignar_tec(<?php echo $id_equipo?>), enviarorden(<?php echo $id_equipo?>);" title="Asignar tecnico" class="btn btn-simple btn-success btn-icon edit"><i class="ti-user"></i></button>
                        </td>



          </tr>
        <?php } ?>
        <tbody></br>
            Equipos pendientes
      </tbody>
  </table>
      </div>
    </div>
  </div>

                    <!--Termina tabla 2-->

                    <!--Comienza tabla 3-->
                  <div id='show-me-three' style='display:none; border:2px solid #ccc'>
                    <div class="tile">
                      <div class="tile-body">

                  <table id="tabla3" class="table table-dark table-hover table-responsive">
                  <thead>
                  <!--<th data-field="state" data-checkbox="true"></th>-->
                  <th data-field="id">ID equipo</th>
                              <th data-field="equipo" data-sortable="true">Equipo</th>
                              <th data-field="falla" data-sortable="true">Falla</th>
                              <th data-field="fecha_ingreso" data-sortable="true">Fecha ingreso</th>
                              <th data-field="fecha_entregar" data-sortable="true">Fecha reparacion</th>
                              <th data-field="ubicacion" data-sortable="true">Ubicacion</th>
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
              </div>

                    </div>
                    <!-- Termina tabla 4 -->

                <div id='show-me-three2' style='display:none; border:2px solid #ccc'>

                  <div class="tile">
                    <div class="tile-body">

                                    <table id="tabla4" class="table table-dark table-hover table-responsive">
                                    <thead>
                                    <!--<th data-field="state" data-checkbox="true"></th>-->
                                    <th data-field="id">ID equipo</th>
                              <th data-field="equipo" data-sortable="true">Equipo</th>
                              <th data-field="equipo" data-sortable="true">Modelo</th>

                              <th data-field="falla" data-sortable="true">Falla</th>
                              <th data-field="fecha_ingreso" data-sortable="true">Fecha ingreso</th>
                              <th data-field="fecha_entregar" data-sortable="true">Fecha reparacion</th>
                              <th data-field="ubicacion" data-sortable="true">Ubicacion</th>
                              <th data-field="accion" data-sortable="true">Acción</th>

                                    </thead>
                                    <?php
                                    $ejec4 = mysqli_query($conn, $revisados);
                                    while($fila=mysqli_fetch_array($ejec4)){
                                    $id_equipo          = $fila['id_equipo'];
                                    $id           = $fila['id_folio'];
                                    $equipo           = $fila['equipo'];
                                    $modelo           = $fila['modelo'];
                                    $falla          = $fila['falla'];
                                    $fecha_ingreso        = $fila['fecha_ingreso'];
                                    $fecha_entregar        = $fila['fecha_entregar'];
                                    $ubicacion        = $fila['ubicacion'];
                                    $servi        = $fila['servicio'];

                                    ?>
                                      <tr>
                                          <td><?php echo $id_equipo ?></td>
                                          <td><?php echo $equipo ?></td>
                                          <td><?php echo $modelo ?></td>
                                          <td><?php echo $falla ?></td>
                                          <td><?php echo $fecha_ingreso ?></td>
                                          <td><?php echo $fecha_entregar ?></td>
                                          <td><?php echo $ubicacion ?></a></td>
                                          <td><?php echo $servi ?></a></td>
                                          <td>
                                          <button onclick="reporte(<?php echo $id_equipo?>), enviarreporte(<?php echo $id_equipo?>);" title="Ver reporte" class="btn btn-simple btn-primary btn-icon edit"><i class="ti-agenda"></i></button>

                                          
                                          <?php
                          if($servi =="Compra"){
                            echo "
                            <button onclick='valor($id_equipo),enviarorden($id_equipo);'title='Asignar valor' class='btn btn-simple btn-warning btn-icon edit'><i class='ti-money'></i></button>
                            ";
                          }if($servi =="Reparacion"){
                            echo "
                            <button onclick='costos($id_equipo),enviarorden($id_equipo);' title='Asignar Costos' class='btn btn-simple btn-success btn-icon edit'><i class='ti-money'></i></button>

                            ";

                          } ?>

                                          </td>

                                    </tr>
                                    <?php } ?>
                                    <tbody></br>
                                    Equipos en revisados
                                    </tbody>
                                    </table>
                                  </div>
                                </div>

                  </div>
                    <!-- Termina tabla 4 -->
                    <div id='show-me-three3' style='display:none; border:2px solid #ccc'>
                      <div class="tile">
                        <div class="tile-body">

                  <table id="tabla5" class="table table-dark table-hover table-responsive">
                  <thead>
                  <!--<th data-field="state" data-checkbox="true"></th>-->
                  <th data-field="id">ID equipo</th>
                              <th data-field="equipo" data-sortable="true">Equipo</th>
                              <th data-field="equipo" data-sortable="true">Modelo</th>
                              <th data-field="falla" data-sortable="true">Falla</th>
                              <th data-field="fecha_ingreso" data-sortable="true">Fecha ingreso</th>
                              <th data-field="fecha_entregar" data-sortable="true">Fecha reparacion</th>
                              <th data-field="ubicacion" data-sortable="true">Ubicacion</th>
                              <th data-field="accion" data-sortable="true">Acción</th>

                  </thead>
                  <?php
                  $ejec8 = mysqli_query($conn, $refaccion);
                  while($fila=mysqli_fetch_array($ejec8)){
                  $id_equipo          = $fila['id_equipo'];
                  $id           = $fila['id_folio'];
                  $equipo           = $fila['equipo'];
                  $modelo           = $fila['modelo'];
                  $falla          = $fila['falla'];
                  $fecha_ingreso        = $fila['fecha_ingreso'];
                  $fecha_entregar        = $fila['fecha_entregar'];
                  $estado        = $fila['estado'];
                  $ubicacion        = $fila['ubicacion'];


                  ?>
                    <tr>
                        <td><?php echo $id_equipo ?></td>
                        <td><?php echo $equipo ?></td>
                        <td><?php echo $modelo ?></td>
                        <td><?php echo $falla ?></td>
                        <td><?php echo $fecha_ingreso ?></td>
                        <td><?php echo $fecha_entregar ?></td>
                        <td><?php echo $estado ?></td>
                        <td><?php echo $ubicacion ?></a></td>
                        <td>
                          <?php
                          if($estado == "Autorizacion taller"){
                            echo "
                            <button onclick='autorizacion_pieza(<?php echo $id_equipo?>);' title='Autorizacion de pieza' class='btn btn-simple btn-success btn-icon edit'><i class='ti-check-box' ></i></button>
                            ";
                          } ?>
                        </td>

                  </tr>
                  <?php } ?>

                  <tbody></br>
                  Equipos que necesitan refaccion
                  </tbody>
                  </table>

                </div>
              </div>
                    </div>

                    <!-- Comienza tabla 5 -->

              <div id='show-me-three4' style='display:none; border:2px solid #ccc'>
                <div class="tile">
                  <div class="tile-body">

              <table id="tabla6" class="table table-dark table-hover table-responsive">
              <thead>
              <!--<th data-field="state" data-checkbox="true"></th>-->
              <th data-field="id">ID equipo</th>
                              <th data-field="equipo" data-sortable="true">Equipo</th>
                              <th data-field="equipo" data-sortable="true">Modelo</th>
                              <th data-field="falla" data-sortable="true">Falla</th>
                              <th data-field="fecha_ingreso" data-sortable="true">Fecha ingreso</th>
                              <th data-field="fecha_entregar" data-sortable="true">Fecha reparacion</th>
                              <th data-field="ubicacion" data-sortable="true">Ubicacion</th>
                              <th data-field="accion" data-sortable="true">Acción</th>

              </thead>
              <?php
              $ejec5 = mysqli_query($conn, $sinsolucion);
              while($fila=mysqli_fetch_array($ejec5)){
              $id_equipo          = $fila['id_equipo'];
              $id           = $fila['id_folio'];
              $equipo           = $fila['equipo'];
              $modelo           = $fila['modelo'];
              $falla          = $fila['falla'];
              $fecha_ingreso        = $fila['fecha_ingreso'];
              $fecha_entregar        = $fila['fecha_entregar'];
              $ubicacion        = $fila['ubicacion'];
              ?>
                <tr>
                    <td><?php echo $id_equipo ?></td>
                    <td><?php echo $equipo ?></td>
                    <td><?php echo $modelo ?></td>
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
              </div>
                    </div>

                <!-- Comienza tabla 6 -->


                              <div id='show-me-three5' style='display:none; border:2px solid #ccc'>
                                <div class="tile">
                                  <div class="tile-body">

                              <table id="tabla7" class="table table-dark table-hover table-responsive">
                              <thead>
                              <!--<th data-field="state" data-checkbox="true"></th>-->
                              <th data-field="id">ID equipo</th>
                              <th data-field="equipo" data-sortable="true">Equipo</th>
                              <th data-field="falla" data-sortable="true">Falla</th>
                              <th data-field="fecha_ingreso" data-sortable="true">Fecha ingreso</th>
                              <th data-field="fecha_entregar" data-sortable="true">Fecha reparacion</th>
                              <th data-field="ubicacion" data-sortable="true">Ubicacion</th>
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
                              </div>

                                    </div>
                  <!-- Termina tabla 6-->
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
       $("#swal-input21").val(data.data.abono);
       $("#swal-input19").val(data.data.presupuesto);
       $("#swal-input20").val(data.data.mano_obra);
       $("#swal-input23").val(data.data.restante);
       $("#swal-input25").val(data.data.valor);
       $("#swal-servicio").val(data.data.servicio);





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
title: 'Asignar técnico',
html:
'<div class="card-body"> <form action="taller_fn_asignar_tecnico.php" method="post" name="data" content="text/html; charset=utf-8" >'+
'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Id equipo</label>'+
        '<input type="text" name="swal-input1" id="swal-input1"  readonly class="form-control border-input">'+
    '</div>'+
'</div>'+


'<div class="col-md-6">'+
  '<div class="form-group">'+
  '<label>Tecnico</label>'+
  '<select class="form-control form-control-sm" textalign="center" required name="tecnico" id="tecnico">'+
  '<option value="" ></option>'+
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

'<input type="hidden" name="swal-input1" value="'+id+'"  id="swal-input1" class="form-control border-input" readonly >' +//Id Equipo
'<h5>Escribir todos los campos sin excepción.</h5>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Costo de refacción</label>'+
        '<input name="swal-input19"  id="swal-input19"  type="number" maxlength="25" onchange="operaciones();" placeholder="Con decimal" required class="form-control border-input">'+
    '</div>'+
'</div>'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Costo mano de obra</label>'+
        '<input name="swal-input20"  id="swal-input20"  type="number" maxlength="25"  onchange="operaciones();" placeholder="Con decimal" required class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Abono del cliente</label>'+
        '<input type="number" name="swal-input21" id="swal-input21"  readonly  class="form-control border-input">'+
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
        '<select class="form-control form-control-sm" required textalign="center" name="swal-input24" id="swal-input24"><option value="" ></option><option value="Reparada" >Reparada</option><option value="Sin solucion">Sin solucion</option></option><option value="Necesita refaccion">Necesita refaccion</option></select>' +
    '</div>'+
'</div>'+
'</div>'+

'<div class="col-md-12">'+
  '<div class="form-group">'+
        '<label>Valor de equipo</label>'+
        '<input name="swal-input25"  id="swal-input25"  type="number" maxlength="25" placeholder="Con decimal" required class="form-control border-input">'+
    '</div>'+
'</div>'+

'<Button type="submit" class= "btn btn-info btn-fill btn-wd">Asignar costos, estado y solicitud de traslado</Button>'+

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
//ventana actualizar cliente
function valor(id){


swal({
title: 'Asignar valor al equipo',
html:
'<div class="card-body"> <form action="taller_fn_valor.php" method="post" name="data" content="text/html; charset=utf-8" >'+

'<input type="hidden" name="swal-servicio" id="swal-servicio" class="form-control border-input" readonly >' +//Id Equipo
'<input type="hidden" name="swal-input1" value="'+id+'"  id="swal-input1" class="form-control border-input" readonly >' +//Id Equipo
'<h5>Valor al equipo que se va a comprar.</h5>'+

'<div class="row">'+
'<div class="col-md-12">'+
  '<div class="form-group">'+
        '<label>Valor de equipo</label>'+
        '<input name="swal-input25"  id="swal-input25"  type="number" maxlength="25" placeholder="Con decimal" required class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-12">'+


'<Button type="submit" class= "btn btn-info btn-fill btn-wd">Asignar valor</Button>'+

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

   suma =parseInt(refaccion)+parseInt(mano);

   total =parseInt(suma)-parseInt(abono);

   subtotal =parseInt(document.getElementById('swal-input22').value= suma);
   totalt =parseInt(document.getElementById('swal-input23').value= total);


}


</script>

  <div class="content-panel">
<div class="col-lg-7">


</div>
</div>

</body>
</html>

  <?php
  //notificacion tipo facebook
              $ejec = mysqli_query($conn, $avisos);
            while($fila=mysqli_fetch_array($ejec)){
                $avi     = $fila['aviso'];
                $fech_avi     = $fila['fecha'];

          ?>

<script>

Push.create("<?php echo $fech_avi; ?>", {
  body:"<?php echo $avi; ?>",
  icon:"assets/img/alert1.png",
  timeout:10000

});

</script>
<script>
$(document).ready(function() {
    $('#tabla2').DataTable();
    $('#tabla3').DataTable();
    $('#tabla4').DataTable();
    $('#tabla5').DataTable();
    $('#tabla6').DataTable();
    $('#tabla7').DataTable();
} );
</script>
<?php } ?>
