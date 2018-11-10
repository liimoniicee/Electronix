<!DOCTYPE html>
<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

$reparados ="SELECT *
from reparar_tv r, clientes c where r.id_folio = c.id_folio and r.estado='Reparada'";


$pendientes ="SELECT *
                from reparar_tv r, clientes c where r.id_folio = c.id_folio and r.estado='Pendiente'";



$revisados ="SELECT *
from reparar_tv r, clientes c where r.id_folio = c.id_folio and r.estado='Diagnosticada'";

$en_repar ="SELECT *
from reparar_tv r, clientes c where r.id_folio = c.id_folio and r.estado='En reparacion'";

$sinsolucion ="SELECT *
from reparar_tv r, clientes c where r.id_folio = c.id_folio and r.estado='Sin solucion'";

$refaccion ="SELECT *
from reparar_tv r, clientes c where r.id_folio = c.id_folio and r.estado='Necesita refaccion'";

$avisos = "SELECT *
FROM avisos where tipo= 'Administrador' and estado='pendiente' order by fecha desc;";

$num_avisos = "SELECT COUNT(*) FROM avisos where tipo= 'Taller' and estado='pendiente'";

$tecnico = "SELECT * from personal where tipo = 'Tecnico';";

$clientes = "SELECT * from clientes;";

?>


<html lang="es">
  <head>
<script src="assets\js\push.js/push.min.js" > </script>

<script src="assets\js\plugins/bootstrap-notify.min.js"></script>


    <!-- Open Graph Meta-->
    <title>Administrador</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" type="text/css" href="assets/css/chartist.css">

    <!-- Font-icon css-->
  <link href= "assets/css/themify-icons.css" rel="stylesheet">
<link rel="shortcut icon" href="assets/img/favicon.ico">
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
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
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="ti-bell"></i></a>
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
      <li><a class="app-menu__item" href="Recepcion.php"><i class="app-menu__icon ti-headphone-alt"></i><span class="app-menu__label">Recepción</span></a></li>
      <li><a class="app-menu__item" href="taller.php"><i class="app-menu__icon ti-settings"></i><span class="app-menu__label">Taller</span></a></li>
      <li><a class="app-menu__item" href="ml.php"><i class="app-menu__icon ti-shopping-cart-full"></i><span class="app-menu__label">MercadoLibre</span></a></li>
      <li><a class="app-menu__item" href="traslado.php"><i class="app-menu__icon ti-truck"></i><span class="app-menu__label">Traslados</span></a></li>
      <li><a class="app-menu__item" href="almacen.php"><i class="app-menu__icon ti-archive"></i><span class="app-menu__label">Almacen</span></a></li>
      <li><a class="app-menu__item active" href="administrador.php"><i class="app-menu__icon ti-star"></i><span class="app-menu__label">Administración</span></a></li>
</ul>




    </aside>
      <main class="app-content">
        <div class="app-title">
          <div>
            <h3><i class="fa fa-dashboard"></i>Administrador - Editar equipos en taller</h3>
            <p>Dar un buen servicio es nuestra prioridad</p>
          </div>
        </div>

        <div class="card text-black bg-primary mb-3">
                <div class="card-body">

            <div class="row">
             <div class="col-sm-12" align="center">
               <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <form id='form-id'>

                      <label class="btn btn-danger active" id='watch-me'>
                        <input name='test' type='radio' checked /> Pendientes
                        </label>

                        <label class="btn btn-info" id='see-me'>
                        <input name='test' type='radio' /> En reparación
                      </label>

                        <label class="btn btn-success" id='look-me'>
                        <input name='test' type='radio' /> Revisados
                      </label>

                      <label class="btn btn-warning" id='look-me2'>
                        <input name='test' type='radio' /> Necesita refacción
                      </label>

                      <label class="btn btn-danger" id='look-me3'>
                        <input name='test' type='radio' /> Sin solución
                      </label>

                          <label class="btn btn-info" id='look-me4'>
                        <input name='test' type='radio' /> Reparados
                      </label>


                    </form>
                  </div>
                    <br><br>
                    <!-- comienza tabla 1 -->
              


<!-- comienza tabla 2 -->
                  <div id='show-me'>
                      <div class="tile">
                        <div class="tile-body">

                    <table id="a-tables"  class="table table-dark table-hover table-responsive">
                    <thead>

                      <th width="8%">Id_equipo</th>
                      <th width="8%">Id cliente</th>
                    <th width="7%">Marca</th>
                    <th width="8%">Modelo</th>
                    <th width="7%">Nombre</th>
                    <th width="7%">Apellidos</th>
                    <th width="7%">Direccion</th>
                    <th width="7%">Coreo</th>
                    <th width="6%">Celular</th>
                    <th width="7%">Estado</th>
                    <th width="7%">Ubicación</th>
                    <th width="7%">Personal</th>
                    <th width="7%">Acción</th>

                    </thead>
                    <?php
                    $ejec1 = mysqli_query($conn, $pendientes);
                    while($fila=mysqli_fetch_array($ejec1)){
                      $id_equipo      = $fila['id_equipo'];
                      $marc           = $fila['marca'];
                      $mod            = $fila['modelo'];
                      $falla          = $fila['nombre'];
                      $come           = $fila['apellidos'];
                      $fech_ing       = $fila['direccion'];
                      $servi          = $fila['correo'];
                      $celu          = $fila['celular'];
                      $est            = $fila['estado'];
                      $ubi            = $fila['ubicacion'];
                      $id             = $fila['id_folio'];
                      $id_p           = $fila['id_personal'];
        ?>
        <tr>
        <td><?php echo $id_equipo ?></td>
        <td><?php echo $id ?></td>
        <td><?php echo $marc ?></td>
        <td><?php echo $mod ?></td>
        <td><?php echo $falla ?></td>
        <td><?php echo $come ?></td>
        <td><?php echo $fech_ing ?></td>
        <td><?php echo $servi ?></td>
        <td><?php echo $celu ?></td>
        <td><?php echo $est ?></td>
        <td><?php echo $ubi ?></td>
        <td><?php echo $id_p ?></td>
        <td>
                 <button onclick="modificar(<?php echo $id_equipo?>), enviarreporte(<?php echo $id_equipo?>);" title="Modificar" class="btn btn-simple btn-primary btn-icon edit"><i class="ti-agenda"></i></button>

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
                    <!--Termina tabla 2-->

                    <!--Comienza tabla 3-->
                  <div id='show-me-two' style='display:none; border:2px solid #ccc'>
                    <div class="tile">
                      <div class="tile-body">

                  <table id="tabla3" class="table table-dark table-hover table-responsive">
                  <thead>

                      <th width="8%">Id_equipo</th>
                      <th width="8%">Id cliente</th>
                    <th width="7%">Marca</th>
                    <th width="8%">Modelo</th>
                    <th width="7%">Nombre</th>
                    <th width="7%">Apellidos</th>
                    <th width="7%">Direccion</th>
                    <th width="7%">Coreo</th>
                    <th width="6%">Celular</th>
                    <th width="7%">Estado</th>
                    <th width="7%">Ubicación</th>
                    <th width="7%">Personal</th>
                    <th width="7%">Acción</th>

                    </thead>
                    <?php
                    $ejec1 = mysqli_query($conn, $en_repar);
                    while($fila=mysqli_fetch_array($ejec1)){
                      $id_equipo      = $fila['id_equipo'];
                      $marc           = $fila['marca'];
                      $mod            = $fila['modelo'];
                      $falla          = $fila['nombre'];
                      $come           = $fila['apellidos'];
                      $fech_ing       = $fila['direccion'];
                      $servi          = $fila['correo'];
                      $celu          = $fila['celular'];
                      $est            = $fila['estado'];
                      $ubi            = $fila['ubicacion'];
                      $id             = $fila['id_folio'];
                      $id_p           = $fila['id_personal'];
        ?>
        <tr>
        <td><?php echo $id_equipo ?></td>
        <td><?php echo $id ?></td>

        <td><?php echo $marc ?></td>
        <td><?php echo $mod ?></td>
        <td><?php echo $falla ?></td>
        <td><?php echo $come ?></td>
        <td><?php echo $fech_ing ?></td>
        <td><?php echo $servi ?></td>
        <td><?php echo $celu ?></td>
        <td><?php echo $est ?></td>
        <td><?php echo $ubi ?></td>
        <td><?php echo $id_p ?></td>
        <td>
                        <button onclick="modificar(<?php echo $id_equipo?>), enviarreporte(<?php echo $id_equipo?>);" title="Modificar" class="btn btn-simple btn-primary btn-icon edit"><i class="ti-agenda"></i></button>

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

                <div id='show-me-three' style='display:none; border:2px solid #ccc'>

                  <div class="tile">
                    <div class="tile-body">

                                    <table id="tabla4" class="table table-dark table-hover table-responsive">
                                    <thead>

      <th width="8%">Id_equipo</th>
                      <th width="8%">Id cliente</th><th width="7%">Marca</th>
<th width="8%">Modelo</th>
<th width="7%">Nombre</th>
<th width="7%">Apellidos</th>
<th width="7%">Direccion</th>
<th width="7%">Coreo</th>
<th width="6%">Celular</th>
<th width="7%">Estado</th>
<th width="7%">Ubicación</th>
<th width="7%">Personal</th>
<th width="7%">Acción</th>

</thead>
<?php
$ejec1 = mysqli_query($conn, $revisados);
while($fila=mysqli_fetch_array($ejec1)){
$id_equipo      = $fila['id_equipo'];
$marc           = $fila['marca'];
$mod            = $fila['modelo'];
$falla          = $fila['nombre'];
$come           = $fila['apellidos'];
$fech_ing       = $fila['direccion'];
$servi          = $fila['correo'];
$celu          = $fila['celular'];
$est            = $fila['estado'];
$ubi            = $fila['ubicacion'];
$id             = $fila['id_folio'];
$id_p           = $fila['id_personal'];
?>
<tr>
<td><?php echo $id_equipo ?></td>
<td><?php echo $id ?></td>

<td><?php echo $marc ?></td>
<td><?php echo $mod ?></td>
<td><?php echo $falla ?></td>
<td><?php echo $come ?></td>
<td><?php echo $fech_ing ?></td>
<td><?php echo $servi ?></td>
<td><?php echo $celu ?></td>
<td><?php echo $est ?></td>
<td><?php echo $ubi ?></td>
<td><?php echo $id_p ?></td>

                                          <td>
                                          <button onclick="modificar(<?php echo $id_equipo?>), enviarreporte(<?php echo $id_equipo?>);" title="Modificar" class="btn btn-simple btn-primary btn-icon edit"><i class="ti-agenda"></i></button>

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
                    <div id='show-me-three2' style='display:none; border:2px solid #ccc'>
                      <div class="tile">
                        <div class="tile-body">

                  <table id="tabla5" class="table table-dark table-hover table-responsive">
                  <thead>

      <th width="8%">Id_equipo</th>
                      <th width="8%">Id cliente</th>
<th width="7%">Marca</th>
<th width="8%">Modelo</th>
<th width="7%">Nombre</th>
<th width="7%">Apellidos</th>
<th width="7%">Direccion</th>
<th width="7%">Coreo</th>
<th width="6%">Celular</th>
<th width="7%">Estado</th>
<th width="7%">Ubicación</th>
<th width="7%">Personal</th>
<th width="7%">Acción</th>

</thead>
<?php
$ejec1 = mysqli_query($conn, $refaccion);
while($fila=mysqli_fetch_array($ejec1)){
$id_equipo      = $fila['id_equipo'];
$marc           = $fila['marca'];
$mod            = $fila['modelo'];
$falla          = $fila['nombre'];
$come           = $fila['apellidos'];
$fech_ing       = $fila['direccion'];
$servi          = $fila['correo'];
$celu          = $fila['celular'];
$est            = $fila['estado'];
$ubi            = $fila['ubicacion'];
$id             = $fila['id_folio'];
$id_p           = $fila['id_personal'];
?>
<tr>
<td><?php echo $id_equipo ?></td>
<td><?php echo $id ?></td>

<td><?php echo $marc ?></td>
<td><?php echo $mod ?></td>
<td><?php echo $falla ?></td>
<td><?php echo $come ?></td>
<td><?php echo $fech_ing ?></td>
<td><?php echo $servi ?></td>
<td><?php echo $celu ?></td>
<td><?php echo $est ?></td>
<td><?php echo $ubi ?></td>
<td><?php echo $id_p ?></td>
<td>
                        <button onclick="modificar(<?php echo $id_equipo?>), enviarreporte(<?php echo $id_equipo?>);" title="Modificar" class="btn btn-simple btn-primary btn-icon edit"><i class="ti-agenda"></i></button>

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

              <div id='show-me-three3' style='display:none; border:2px solid #ccc'>
                <div class="tile">
                  <div class="tile-body">

              <table id="tabla6" class="table table-dark table-hover table-responsive">
              <thead>

      <th width="8%">Id_equipo</th>
                      <th width="8%">Id cliente</th>
<th width="7%">Marca</th>
<th width="8%">Modelo</th>
<th width="7%">Nombre</th>
<th width="7%">Apellidos</th>
<th width="7%">Direccion</th>
<th width="7%">Coreo</th>
<th width="6%">Celular</th>
<th width="7%">Estado</th>
<th width="7%">Ubicación</th>
<th width="7%">Personal</th>
<th width="7%">Acción</th>

</thead>
<?php
$ejec1 = mysqli_query($conn, $sinsolucion);
while($fila=mysqli_fetch_array($ejec1)){
$id_equipo      = $fila['id_equipo'];
$marc           = $fila['marca'];
$mod            = $fila['modelo'];
$falla          = $fila['nombre'];
$come           = $fila['apellidos'];
$fech_ing       = $fila['direccion'];
$servi          = $fila['correo'];
$celu          = $fila['celular'];
$est            = $fila['estado'];
$ubi            = $fila['ubicacion'];
$id             = $fila['id_folio'];
$id_p           = $fila['id_personal'];
?>
<tr>
<td><?php echo $id_equipo ?></td>
<td><?php echo $id ?></td>

<td><?php echo $marc ?></td>
<td><?php echo $mod ?></td>
<td><?php echo $falla ?></td>
<td><?php echo $come ?></td>
<td><?php echo $fech_ing ?></td>
<td><?php echo $servi ?></td>
<td><?php echo $celu ?></td>
<td><?php echo $est ?></td>
<td><?php echo $ubi ?></td>
<td><?php echo $id_p ?></td>
<td>
                    <button onclick="modificar(<?php echo $id_equipo?>), enviarreporte(<?php echo $id_equipo?>);" title="Modificar" class="btn btn-simple btn-primary btn-icon edit"><i class="ti-agenda"></i></button>

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


                              <div id='show-me-three4' style='display:none; border:2px solid #ccc'>
                                <div class="tile">
                                  <div class="tile-body">

                              <table id="tabla7" class="table table-dark table-hover table-responsive">
                              <thead>

                            <th width="8%">Id_equipo</th>
                      <th width="8%">Id cliente</th>
                    <th width="7%">Marca</th>
                    <th width="8%">Modelo</th>
                    <th width="7%">Nombre</th>
                    <th width="7%">Apellidos</th>
                    <th width="7%">Direccion</th>
                    <th width="7%">Coreo</th>
                    <th width="6%">Celular</th>
                    <th width="7%">Estado</th>
                    <th width="7%">Ubicación</th>
                    <th width="7%">Personal</th>
                    <th width="7%">Acción</th>

                    </thead>
                    <?php
                    $ejec1 = mysqli_query($conn, $reparados);
                    while($fila=mysqli_fetch_array($ejec1)){
                      $id_equipo      = $fila['id_equipo'];
                      $marc           = $fila['marca'];
                      $mod            = $fila['modelo'];
                      $falla          = $fila['nombre'];
                      $come           = $fila['apellidos'];
                      $fech_ing       = $fila['direccion'];
                      $servi          = $fila['correo'];
                      $celu          = $fila['celular'];
                      $est            = $fila['estado'];
                      $ubi            = $fila['ubicacion'];
                      $id             = $fila['id_folio'];
                      $id_p           = $fila['id_personal'];
        ?>
        <tr>
        <td><?php echo $id_equipo ?></td>
        <td><?php echo $id ?></td>

        <td><?php echo $marc ?></td>
        <td><?php echo $mod ?></td>
        <td><?php echo $falla ?></td>
        <td><?php echo $come ?></td>
        <td><?php echo $fech_ing ?></td>
        <td><?php echo $servi ?></td>
        <td><?php echo $celu ?></td>
        <td><?php echo $est ?></td>
        <td><?php echo $ubi ?></td>
        <td><?php echo $id_p ?></td>
        <td>
                                    <button onclick="modificar(<?php echo $id_equipo?>), enviarreporte(<?php echo $id_equipo?>);" title="Modificar" class="btn btn-simple btn-primary btn-icon edit"><i class="ti-agenda"></i></button>

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



    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="assets/js/sweetalert2.js"></script>

    <script src="assets/js/chartjs/Chart.bundle.js"></script>
    <script src="assets/js/chartjs/Chart.bundle.min.js"></script>
    <script src="assets/js/chartjs/Chart.js"></script>
    <script src="assets/js/chartjs/Chart.min.js"></script>
    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    <script src="assets/js/jquery.js"></script>
    <!-- Data table plugin-->
    <script type="text/javascript" src="assets/js/plugins/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript">$('#a-tables').DataTable();</script>


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
      $(document).ready(function() {
          $('#tabla3').DataTable();
          $('#tabla4').DataTable();
          $('#tabla5').DataTable();
          $('#tabla6').DataTable();
          $('#tabla7').DataTable();
      } );
      </script>

  </body>


</html>




<script>
//Script para mandar ID para generar la orden
function enviarreporte(id){
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
       $("#id_cliente").val(data.data.id);

       $("#id_equipo").val(data.data.id_e);
       $("#equipo").val(data.data.equi);
       $("#marca").val(data.data.mar);
       $("#modelo").val(data.data.mod);
       $("#serie").val(data.data.ser);
       $("#accesorios").val(data.data.accesorios);
       $("#falla").val(data.data.falla);
       $("#comentarios").val(data.data.comentarios);

       $("#fecha_in").val(data.data.fecha_ingreso);
       $("#fecha_re").val(data.data.fecha_entregar);
       $("#fecha_eg").val(data.data.fecha_egreso);
       $("#servicio").val(data.data.servicio);

       $("#refaccion").val(data.data.presupuesto);
       $("#mano").val(data.data.mano_obra);
       $("#abono").val(data.data.abono);
       $("#restante").val(data.data.restante);

       $("#total").val(data.data.costo_total);
       $("#valor").val(data.data.valor);
       $("#estado").val(data.data.estado);
       $("#ubicacion").val(data.data.ubicacion);



    





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
//ventana actualizar cliente
function modificar(id){


swal({
title: 'Modificar ',
html:
'<div class="card-body"> <form action="admin_editar_taller_fn.php" method="post" name="data" content="text/html; charset=utf-8" >'+

'<input type="hidden" name="swal-input1" value="'+id+'"  id="swal-input1" class="form-control border-input" readonly >' +//Id Equipo
'<h5>Información del equipo</h5>'+
//inicia fila 1
'<div class="row">'+
'<div class="col-md-3">'+
  '<div class="form-group">'+
        '<label>Id equipo</label>'+
        '<input type="number" name="id_equipo" id="id_equipo"  readonly  class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-3">'+
  '<div class="form-group">'+
        '<label>Equipo</label>'+
        '<input name="equipo"  id="equipo" type="text"  required  class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-3">'+
  '<div class="form-group">'+
        '<label>Marca</label>'+

        '<input name="marca"  id="marca" type="text"   required  class="form-control border-input">'+


'</div>'+
'</div>'+

'<div class="col-md-3">'+
  '<div class="form-group">'+
        '<label>Modelo</label>'+

        '<input name="modelo"  id="modelo" type="text"   required  class="form-control border-input">'+


'</div>'+
'</div>'+
'</div>'+

//termina fila 1

//inicia fila 2
'<div class="row">'+
'<div class="col-md-3">'+
  '<div class="form-group">'+
  '<label>Serie</label>'+
        '<input name="serie"  id="serie" type="text"   required  class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-3">'+
  '<div class="form-group">'+
        '<label>Accesorios</label>'+
        '<input name="accesorios"  id="accesorios" type="text" required  class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-3">'+
  '<div class="form-group">'+
        '<label>Falla</label>'+
        '<input name="falla"  id="falla" type="text"  required  class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-3">'+
  '<div class="form-group">'+
        '<label>Comentarios</label>'+
        '<input name="comentarios"  id="comentarios" type="text"    class="form-control border-input">'+


'</div>'+
'</div>'+
'</div>'+

//termina fila 2
'<h5>Fechas y tipo de servicio</h5>'+

//inicia fila 3
'<div class="row">'+
'<div class="col-md-3">'+
  '<div class="form-group">'+
        '<label>Fecha de ingreso</label>'+
        '<input type="text" name="fecha_in" id="fecha_in" type="text" readonly  class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-3">'+
  '<div class="form-group">'+
        '<label>Fecha inicio reparación</label>'+
        '<input name="fecha_re"  id="fecha_re" type="text"    readonly class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-3">'+
  '<div class="form-group">'+
        '<label>Fecha de entrega</label>'+

        '<input name="fecha_eg"  id="fecha_eg"    readonly class="form-control border-input">'+


'</div>'+
'</div>'+

'<div class="col-md-3">'+
  '<div class="form-group">'+
        '<label>Tipo de servicio</label>'+
        '<select class="form-control form-control-sm" text-align="center" required name="servicio" id="servicio"><option value=""></option><option value="Reparacion">Reparación</option><option value="Compra">Compra</option><option value="Revision">Revisión</option><option value="Garantia">Garantía</option><option value="Domicilio">Domicilio</option></select>' +
    '</div>'+
'</div>'+
'</div>'+

//termina fila 3
'<h5>Costos, estados y ubicación</h5>'+

//inicia fila 4
'<div class="row">'+
'<div class="col-md-3">'+
  '<div class="form-group">'+
        '<label>Costo refacción</label>'+
        '<input type="number" name="refaccion" id="refaccion" onchange="operaciones();" required  class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-3">'+
  '<div class="form-group">'+
        '<label>Mano de obra</label>'+
        '<input name="mano"  id="mano" type="number" required onchange="operaciones();"  class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-3">'+
  '<div class="form-group">'+
        '<label>Abono</label>'+
        '<input name="abono"  id="abono" type="number"   required onchange="operaciones();"  class="form-control border-input">'+


'</div>'+
'</div>'+

'<div class="col-md-3">'+
  '<div class="form-group">'+
        '<label>Restante</label>'+
        '<input name="restante"  id="restante" type="text" readonly required  class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

//termina fila 4

//inicia fila 5
'<div class="row">'+
'<div class="col-md-3">'+
  '<div class="form-group">'+
        '<label>Costo total</label>'+
        '<input type="number" name="total" id="total"  readonly required  class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-3">'+
  '<div class="form-group">'+
        '<label>Valor del equipo</label>'+
        '<input name="valor"  id="valor" type="number"  required  class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-3">'+
  '<div class="form-group">'+
        '<label>Estado </label>'+
        '<select class="form-control form-control-sm" required textalign="center" name="estado" id="estado"><option value="" ></option><option value="Pendiente" >Pendiente</option><option value="Entregado" >Entregado</option><option value="Diagnosticada" >Diagnosticada</option><option value="A cambio" >A cambio</option><option value="Reparada" >Reparado</option><option value="Sin solucion">Sin solucion</option></option><option value="Necesita refaccion">Necesita refaccion</option><option value="Devuelto">Devuelto</option><option value="Obsequiada">Obsequiada</option><option value="Adjudicada">Adjudicada</option></select>' +


'</div>'+
'</div>'+

'<div class="col-md-3">'+
  '<div class="form-group">'+
        '<label>Ubicación</label>'+
        '<select class="form-control form-control-sm" text-align="center" required name="ubicacion" id="ubicacion"><option value=""></option><option value="Recepcion">Recepcion</option><option value="Taller">Taller</option><option value="Almacen">Almacen</option><option value="Cliente">Cliente</option></select>' +
    '</div>'+
'</div>'+
'</div>'+

//termina fila 5

//inicia fila 6
'<div class="row">'+
'<div class="col-md-3">'+
  '<div class="form-group">'+
  /*
        '<label>Id Cliente</label>'+
        '<input name="cliente"  id="cliente" type="number"  required value="<?php echo $id ?>" readonly class="form-control border-input">'+
*/
'</div>'+
'</div>'+


'<div class="col-md-3">'+
  '<div class="form-group">'+
        '<label>Asignar tecnico</label>'+

'<select class="form-control form-control-sm" textalign="center"  name="tecnico" id="tecnico">'+
  '<option value="" ></option>'+
  <?php
  $ejec7 = mysqli_query($conn, $tecnico);
  while($fila=mysqli_fetch_array($ejec7)){?>
  '<?php echo '<option value="'.$fila["id_personal"].'">'.$fila["nombre"].'</option>'; ?>'+
  <?php } ?>
  '</select>' +

'</div>'+
'</div>'+


//termina fila 6

'<div class="col-md-12">'+
'<Button type="submit" class= "btn btn-info btn-fill btn-wd">Actualizar</Button>'+

'</div>'+


'</form></div>',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: '</form> Actualizar solicitud',
cancelButtonClass: 'btn btn-danger btn-fill btn-wd',
showConfirmButton: false,
customClass: 'swal-wide',
focusConfirm: false,
buttonsStyling: false,
reverseButtons: true
})

};
</script>




<script type="text/javascript">

function operaciones()
{
  var refaccion =document.getElementById('refaccion').value;
  var mano =document.getElementById('mano').value;
  var abono =document.getElementById('abono').value;

   suma =parseInt(refaccion)+parseInt(mano);

   total =parseInt(suma)-parseInt(abono);

   subtotal =parseInt(document.getElementById('total').value= suma);
   totalt =parseInt(document.getElementById('restante').value= total);


}


</script>


<style>
.swal-wide{
    width:70% !important;
}
</style>


  <?php
  //notificacion tipo facebook
              $ejec = mysqli_query($conn, $avisos);
            while($fila=mysqli_fetch_array($ejec)){
                $avi1     = $fila['aviso'];
                $fech_avi1     = $fila['fecha'];

          ?>


<?php } ?>
