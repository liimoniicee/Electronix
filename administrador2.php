<!DOCTYPE html>
<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

$avisos = "SELECT
*
FROM avisos where tipo= 'Administrador' and estado='pendiente'order by fecha desc;";

$num_avisos = "SELECT COUNT(*) FROM avisos where tipo= 'Administrador' and estado='pendiente' order by fecha desc;";


?>
<html lang="es">
  <head>
<script src="assets\js\push.js/push.min.js" > </script>

<script src="assets\js\plugins/bootstrap-notify.min.js"></script>

<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://code.highcharts.com/modules/exporting.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


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
          <h1><i class="fa fa-dashboard"></i>Recepción</h1>
          <p>Dar un buen servicio es nuestra prioridad</p>
        </div>

      </div>
      <div class="card text-black bg-primary mb-3">
        <div class="card-body">

                <div class="col-lg-12">
                  <p class="bs-component">
                    <button class="btn btn-info" onclick="location='admin_ctrl_empleados.php'"><i class="ti-settings"></i>Control de empleados</button>
                    <button class="btn btn-info" onclick="location='admin_ventas.php'"><i class="ti-money"></i>Ventas</button>
                    <button class="btn btn-info" onclick="location='admin_editar_solicitudes.php'"><i class="ti-settings"></i>Editar solicitudes</button>
                    <button class="btn btn-info" onclick="aviso();"><i class="ti-shopping-cart"></i>Compras</button>
                    <button class="btn btn-info" onclick="location='#'"><i class="ti-list"></i>Contratos</button>
                    <button class="btn btn-info" onclick="location='#'"><i class="ti-alert"></i>avisos</button>
        </p>
      </div>
      <div class="card-body">
        
      </div>
      <div class="card">
      <div class="resultados"><canvas id="grafico"></canvas></div>


<div id="container" ></div>




    </div>
    
<script type="text/javascript">

Highcharts.chart('container', {
chart: {
    type: 'column'
},
title: {
    text: 'Monthly Average Rainfall'
},
subtitle: {
    text: 'Source: WorldClimate.com'
},
xAxis: {
    categories: [
        'Jan',
        'Feb',
        'Mar',
        'Apr',
        'May',
        'Jun',
        'Jul',
        'Aug',
        'Sep',
        'Oct',
        'Nov',
        'Dec'
    ],
    crosshair: true
},
yAxis: {
    min: 0,
    title: {
        text: 'Rainfall (mm)'
    }
},
tooltip: {
    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
        '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
    footerFormat: '</table>',
    shared: true,
    useHTML: true
},
plotOptions: {
    column: {
        pointPadding: 0.2,
        borderWidth: 0
    }
},
series: [{
    name: 'Tokyo',
    data: [99, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

}, {
    name: 'New York',
    data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

}, {
    name: 'London',
    data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

}, {
    name: 'Berlin',
    data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

}]
});
</script>
  </body>





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

    <script src="assets/js/chartjs/Chart.bundle.js"></script>
    <script src="assets/js/chartjs/Chart.bundle.min.js"></script>
    <script src="assets/js/chartjs/Chart.js"></script>
    <script src="assets/js/chartjs/Chart.min.js"></script>
    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>
    <script src="assets/js/jquery.js"></script>


	



</html>
  <?php
  //notificacion tipo facebook
              $ejec = mysqli_query($conn, $avisos);
            while($fila=mysqli_fetch_array($ejec)){
                $avi1     = $fila['aviso'];
                $fech_avi1     = $fila['fecha'];

          ?>


<?php } ?>