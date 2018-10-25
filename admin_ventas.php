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


$sum_publicadas = "SELECT SUM(precio) FROM refacciones_tv where estado= 'Publicada';";

$sum_tv_ventas = "SELECT SUM(costo) FROM ventas_tv where estado= 'Vendida';";





?>
<html lang="es">
  <head>
<script src="assets\js\push.js/push.min.js" > </script>

<script src="assets\js\plugins/bootstrap-notify.min.js"></script>

<script src="assets\js/highcharts.js"></script>
<script src="assets\js/modules/exporting.js"></script>
<script src="assets\js/modules/export-data.js"></script>


    <!-- Open Graph Meta-->
    <title>Administrador ventas</title>
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

   <?php
          $ejec01 = mysqli_query($conn, $sum_publicadas);
        while($fila=mysqli_fetch_array($ejec01)){
            $num_pub     = $fila['SUM(precio)'];

      }
      ?>

  
     
     <?php
          $ejec01 = mysqli_query($conn, $sum_tv_ventas);
        while($fila=mysqli_fetch_array($ejec01)){
            $num_ven_tv     = $fila['SUM(costo)'];

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
          <h1><i class="fa fa-dashboard"></i>Administrador ventas</h1>
          <p>Dar un buen servicio es nuestra prioridad</p>
        </div>

      </div>
      <div class="card text-black bg-primary mb-3">
        <div class="card-body">

                <div class="col-lg-12">
                  <p class="bs-component">
                    <button class="btn btn-info"  id="watch-me"><i class="ti-settings"></i>Ventas total</button>
                    <button class="btn btn-info"  id="see-me"><i class="ti-money"></i>Ventas tv</button>
                    <button class="btn btn-info" id="look-me"></i>Ventas refacciones vendidas por mes</button>
                    <button class="btn btn-info"  id="look-me2"><i class="ti-settings"></i>Ventas refacciones publicadas por mes</button>

        </p>
      </div>
      
      <div class="col-sm-2">
          <select class="form-control form-control-sm" onChange="mostrarResultados(this.value);">
              <?php
                  for($i=2017;$i<2030;$i++){
                      if($i == 2018){
                          echo '<option value="'.$i.'" selected>'.$i.'</option>';
                      }else{
                          echo '<option value="'.$i.'">'.$i.'</option>';
                      }
                  }
              ?>
          </select>
        </div>
        
 
      </div>
     

   
  

<!-- tabla 1-->

    <div id='show-me'>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>


<script type="text/javascript">

// Create the chart
Highcharts.chart('container', {
chart: {
type: 'column'
},
title: { 
text: 'Estadisticas de Mercado libre al día . <?php echo date("Y-m-d");?>'
},
subtitle: {
text: 'Pasa el raton para ver las estadísticas'
},
xAxis: {
type: 'column'
},
yAxis: {
title: {
text: 'Total refacciones publicadas en Mercadolibre'
}

},
legend: {
enabled: false
},
plotOptions: {
series: {
borderWidth: 0,
dataLabels: {
    enabled: true,
    format: '{point.y:.1f}$'
}
}
},

tooltip: {
headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}$</b> en publicaciones<br/>'
},

"series": [
{
"name": "Gráfica 1",
"colorByPoint": true,
"data": [
               <?php

include 'conexion.php';

$sum_publicadass = "SELECT SUM(precio),fecha_entrada FROM refacciones_tv  WHERE estado='Publicada' LIMIT 1 ;";

$ejecutar = mysqli_query($conn, $sum_publicadass);
$i = 0;
$fecha_actual=date("d/m/Y");
while($row=mysqli_fetch_array($ejecutar)){

$var_marca     =     $row['SUM(precio)'];

    $i++;

?>
    {
        "name": "Total refacciones publicadas en Mercadolibre",
        "y": <?php echo $row['SUM(precio)']; ?> ,
        "drilldown": "Chrome"
    },
  <?php }     ?>
]
},
{
"name": "Grafica 2",
"colorByPoint": true,
"data": [
               <?php

include 'conexion.php';

$sum_vendidass = "SELECT SUM(precio) FROM refacciones_tv where estado= 'Vendida';";

$ejecutar = mysqli_query($conn, $sum_vendidass);
$i = 0;
$fecha_actual=date("d/m/Y");
while($row2=mysqli_fetch_array($ejecutar)){

$var_marca     =     $row2['SUM(precio)'];

    $i++;

?>
    {
        "name": "Total refacciones vendidas en Mercadolibre",
        "y": <?php echo $row2['SUM(precio)']; ?> ,
        "drilldown": "Chrome"
    },
  <?php }     ?>
]
}
]

});


        </script>












 <div id='show-me-two' style='display:none; border:2px solid #ccc'>


<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>




<h3>Total refacciones publicadas en Mercado libre: $<?php echo $num_pub?></h3>

    </div>

<!--
<script>

            $(document).ready(mostrarResultados(2018));
                function mostrarResultados(year){
                    $('.resultados').html('<canvas id="grafico"></canvas>');
                    $.ajax({
                        type: 'POST',
                        url: 'admin_fn_procesa_ventasx.php',
                        data: 'year='+year,
                        dataType: 'JSON',
                        success:function(response){
                            var Datos = {
                                    labels : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                                    datasets : [
                                        {
                                          label: "Ganancias de ventas de television mes",
                                          backgroundColor: '#0C83B6',
                                          borderColor: 'rgb(255, 99, 132)',
                                          data : response
                                        }
                                        
                                    ]
                                }

                          
                            var contexto = document.getElementById('grafico').getContext('2d');
                            window.Barra = new Chart(contexto,{
                                      type: 'bar',
                                            data: Datos,Datos2,
                                                options: {}
                                                  });
                            Barra.clear();
                        }

                        
                    });
                    return false;
                }
    </script>


    </div>
-->
    <!-- tabla 3k-->

  <div id='show-me-three'  style='display:none; border:2px solid #ccc'>


<h3>Total refacciones vendidas en mercado libre: $<?php echo $num_pub ?></h3>
    </div>
    <!-- tabla 4k-->

   



    </div>
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

  </body>


</html>
  <?php
  //notificacion tipo facebook
              $ejec = mysqli_query($conn, $avisos);
            while($fila=mysqli_fetch_array($ejec)){
                $avi1     = $fila['aviso'];
                $fech_avi1     = $fila['fecha'];

          ?>


<?php } ?>
