<?php
include'check_sesion.php';
include'fuctions.php';
include'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];
$var_tipo = $_SESSION['tipo'];

if($var_tipo != "Administrador" && $var_tipo != "Recepcion" ) {
 //echo "<script>alert('No tienes acceso a esta página!')</script>";
   echo "<script>window.open('Error_restrinccion.html','_self')</script>";
 }
$recepcion ="SELECT r.colonia
FROM personal p, recepciones r
WHERE p.id_personal =$var_clave
AND p.rec_id_recepcion = r.id_recepcion;";

$aprovacion="SELECT * from
solicitudes_refacciones where estado = 'Encontrada'";

$consulta = "SELECT
id_folio, nombre, apellidos,direccion, celular, correo, puntos
FROM
clientes ORDER BY fecha desc";

$reparada = "SELECT
id_equipo,id_folio, id_personal,nombre,apellidos,celular,correo, equipo, marca, modelo, accesorios, falla, comentarios, fecha_ingreso,fecha_entregar, servicio,ubicacion,presupuesto,mano_obra,abono,restante,costo_total,estado
FROM clientes
LEFT JOIN reparar_Tv
USING(id_folio) where estado = 'Reparada'";


$sinsolucion = "SELECT
id_equipo,id_folio, id_personal,nombre,apellidos,celular,correo, equipo, marca, modelo, accesorios, falla, comentarios, fecha_ingreso,fecha_entregar, servicio,ubicacion,presupuesto,mano_obra,abono,restante,costo_total,estado FROM clientes LEFT JOIN reparar_Tv USING(id_folio) where estado = 'Sin solucion'";


$valorados = "SELECT
id_equipo,id_folio, id_personal,nombre,apellidos,celular,correo, equipo, marca, modelo, accesorios, falla, comentarios, fecha_ingreso,fecha_entregar, servicio,ubicacion,presupuesto,mano_obra,abono,restante,costo_total,estado FROM clientes LEFT JOIN reparar_Tv USING(id_folio) where estado = 'Valorada'";


$venta="SELECT * from ventas_tv where estado='En venta'";

$avisos = "SELECT * FROM avisos where tipo= 'Recepcion' and estado='pendiente'  order by fecha desc;";

$num_avisos = "SELECT COUNT(*) FROM avisos where tipo= 'Recepcion' and estado='pendiente'";
?>
<!DOCTYPE html>
<html lang="es">
  <head>
<script src="assets\js\push.js/push.min.js" > </script>

<script src="assets\js\plugins/bootstrap-notify.min.js"></script>

    <!-- Open Graph Meta-->
    <title>Recepcion</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="refresh" content="300" >

    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">

    <!-- Font-icon css-->
  <link href= "assets/css/themify-icons.css" rel="stylesheet">
<link rel="shortcut icon" href="assets/img/favicon.ico">
  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.php">ID de Usuario: <?php echo $var_clave ?></a>
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
        <a class="app-nav__item" href="checkout_empleados.php"><i class="ti-shift-left"></i></a>


      </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">



      </div>
      <ul class="app-menu">
      <li><a class="app-menu__item" href="#"><i class="app-menu__icon ti-user"></i><span class="app-menu__label"> <?php echo $var_name ?></span></a></li>
      <li><a class="app-menu__item active" href="recepcion.php"><i class="app-menu__icon ti-headphone-alt"></i><span class="app-menu__label">Recepción</span></a></li>
      <li><a class="app-menu__item" href="taller.php"><i class="app-menu__icon ti-settings"></i><span class="app-menu__label">Taller</span></a></li>
      <li><a class="app-menu__item" href="ml.php"><i class="app-menu__icon ti-shopping-cart-full"></i><span class="app-menu__label">MercadoLibre</span></a></li>
      <li><a class="app-menu__item" href="traslado.php"><i class="app-menu__icon ti-truck"></i><span class="app-menu__label">Traslados</span></a></li>
      <li><a class="app-menu__item" href="almacen.php"><i class="app-menu__icon ti-archive"></i><span class="app-menu__label">Almacen</span></a></li>
      <li><a class="app-menu__item" href="administrador.php"><i class="app-menu__icon ti-star"></i><span class="app-menu__label">Administración</span></a></li>
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


  <div class="col-sm-12" align="center">
             <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <form id='form-id'>

                    <label class="btn btn-danger active" onclick="nuevo();" >
                      <a  /> Nuevo cliente
                      </label>

                      <label class="btn btn-info" id='watch-me'>
                      <input name='test' type='radio' /> Lista de clientes
                      </label>

                      <label class="btn btn-success" id='see-me'>
                      <input name='test' type='radio' /> Equipos reparados
                    </label>

                      <label class="btn btn-warning" id='look-me'>
                      <input name='test' type='radio' /> Equipos sin solucion
                    </label>

                    <label class="btn btn-danger" id='look-me2'>
                      <input name='test' type='radio' /> Equipos valorados
                    </label>

                    <label class="btn btn-info" id='look-me3'>
                      <input name='test' type='radio' /> Pendientes de aprovación
                    </label>

                        <button class="btn btn-success" type="button" onclick="aviso();">Nuevo aviso</button>

                        <button class="btn btn-warning" type="button" onclick="location.href='recepcion_ventas.php'" >Ventas</button>



                  </form>
                </div>






 <div id='show-me'>
                    <div class="tile">
                      <div class="tile-body">
          <table id="a-tables" class="table table-hover table-dark table-responsive">
    <thead>

        <th data-field="id">id</th>
      <th data-field="fecha" data-sortable="true">Nombre</th>
      <th data-field="estatus" data-sortable="true">Apellidos</th>
      <th data-field="estatus" data-sortable="true">Direccion</th>
      <th data-field="estatus" data-sortable="true">Celular</th>
      <th data-field="estatus" data-sortable="true">Correo</th>
      <th class="disabled-sorting">Acción</th>

    </thead>
    <?php
      $ejecutar = mysqli_query($conn, $consulta);
    while($fila=mysqli_fetch_array($ejecutar)){
        $id          = $fila['id_folio'];
        $nom           = $fila['nombre'];
        $ape          = $fila['apellidos'];
        $dir          = $fila['direccion'];
        $cel        = $fila['celular'];
        $cor        = $fila['correo'];


?>
                    <tr>
                        <td width="8%"><?php echo $id ?></td>
                        <td width="14%"><?php echo $nom ?></td>
                        <td width="14%"><?php echo $ape ?></td>
                        <td width="14%"><?php echo $dir ?></td>
                        <td width="14%"><?php echo $cel ?></td>
                        <td width="14%"><?php echo $cor ?></td>
                        <td width="14%">
                          <?php
                          echo "
                        <a href='#' onclick='alerta1($id), enviarmod( $id);' title='Actualizar cliente' ><i class='btn-sm btn-warning ti-pencil-alt'></i></a>
                        <a href='#' onclick='orden($id), enviarmod( $id);' title='Nueva orden'><i class='btn-sm btn-success ti-plus'></i></a>
                        <a href='recepcion_historial_cliente.php?id=$id'  title='Historial'><i class='btn-sm btn-secondary ti-agenda'></i></a>
                      </td>"; ?>

          </tr>
        <?php } ?>
        <tbody></br>
            Resultado de clientes
      </tbody>
  </table>
</div></div></div>


 <div id='show-me-two' style='display:none; border:2px solid #ccc'>
                    <div class="tile">
                      <div class="tile-body">

<table id="tabla2" class="table table-dark table-hover table-responsive">
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
      <th data-field="ubicacion" data-sortable="true">Ubicacion</th>

      <th data-field="garantia" data-sortable="true">Acción</th>



    </thead>
    <?php
      $ejecutar = mysqli_query($conn, $reparada);
    while($fila=mysqli_fetch_array($ejecutar)){
        $id_equipo          = $fila['id_equipo'];
        $id           = $fila['id_folio'];
        $nombre          = $fila['nombre'];
        $apellidos        = $fila['apellidos'];
        $marca           = $fila['marca'];
        $modelo           = $fila['modelo'];
        $fecha_entregar        = $fila['fecha_entregar'];
        $total        = $fila['restante'];
        $ubicacion        = $fila['ubicacion'];
        $servicio        = $fila['servicio'];

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
                        <td><?php echo $ubicacion ?></td>

                        <td>
                        <!--
                        <a class="hey" data-gall="myGallery" href="assets/galeria/1.jpg" title="Ver galería"><img src="assets/galeria/gallery.png" alt="img-01" ></a>
                        <a class="hey" data-gall="myGallery" href="assets/galeria/2.jpg"   title="Ver galería"></a>
                        <a class="hey" data-gall="myGallery" href="assets/galeria/3.jpg" type="hidden" title="Ver galería"></a>
-->

                        <?php

                        if($ubicacion == "Recepcion"){

                          if($servicio =="Garantia"){
                            echo "
                            <button onclick='reporte($id_equipo), enviarreporte($id_equipo);' title='Ver reporte' class='btn btn-simple btn-primary btn-icon edit'><i class='ti-agenda'></i></button>

                            <button onclick='traslado($id), enviarorden($id_equipo);' class='btn btn-simple btn-success btn-icon edit' title='Solicitar traslado'><i class='ti-truck' ></i></button>

                            <button onclick='entregar($id), enviarorden($id_equipo);' class='btn btn-simple btn-danger btn-icon edit' title='Entregar equipo'><i class='ti-agenda' ></i></button>

                            ";
                          }
                          if($servicio =="Reparacion"){
                            echo "
                            <button onclick='reporte($id_equipo), enviarreporte($id_equipo);' title='Ver reporte' class='btn btn-simple btn-primary btn-icon edit'><i class='ti-agenda'></i></button>

                            <button onclick='traslado($id), enviarorden($id_equipo);' class='btn btn-simple btn-success btn-icon edit' title='Solicitar traslado'><i class='ti-truck' ></i></button>
                            <button onclick='garantia($id), enviarorden($id_equipo);' class='btn btn-simple btn-warning btn-icon edit' title='Generar garantía'><i class='ti-receipt' ></i></button>

                            ";
                          }

                      }else{  echo "


                    <button onclick='reporte($id_equipo), enviarreporte($id_equipo);' title='Ver reporte' class='btn btn-simple btn-primary btn-icon edit'><i class='ti-agenda'></i></button>

                    ";
                    }
                      ?>
                        </td>

          </tr>
        <?php } ?>
        <tbody></br>
            Resultado de equipos reparados
      </tbody>
  </table>
  </div></div></div>


  <div id='show-me-three'  style='display:none; border:2px solid #ccc'>
                    <div class="tile">
                      <div class="tile-body">

                      <table id="tabla3" class="table table-dark table-hover table-responsive">
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
      <th data-field="ubicacion" data-sortable="true">Ubicacion</th>
      <th data-field="garantia" data-sortable="true">Acción</th>

    </thead>
    <?php
      $ejecutar = mysqli_query($conn, $sinsolucion);
    while($fila=mysqli_fetch_array($ejecutar)){
      $id_equipo          = $fila['id_equipo'];
        $id           = $fila['id_folio'];
        $nombre          = $fila['nombre'];
        $apellidos        = $fila['apellidos'];

        $marca           = $fila['marca'];
        $modelo           = $fila['modelo'];
        $fecha_entregar        = $fila['fecha_entregar'];
        $total        = $fila['restante'];
        $ubicacion        = $fila['ubicacion'];
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
                        <td><?php echo $ubicacion ?></td>
                        <td>

<?php

if($ubicacion == "Recepcion"){
  echo "
  <button onclick='reporte($id_equipo), enviarreporte($id_equipo);' title='Ver reporte' class='btn btn-simple btn-primary btn-icon edit'><i class='ti-agenda'></i></button>


  <button onclick='cambio($id), enviarorden($id_equipo);' class='btn btn-simple btn-success btn-icon edit' title='Cambiar equipo por venta'><i class='ti-exchange-vertical' ></i></button>

  <button onclick='devolucion($id), enviarorden($id_equipo);' class='btn btn-simple btn-danger btn-icon edit' title='Devolución'><i class='ti-back-left' ></i></button>


  ";
}else{  echo "
<button onclick='reporte($id_equipo), enviarreporte($id_equipo);' title='Ver reporte' class='btn btn-simple btn-primary btn-icon edit'><i class='ti-agenda'></i></button>
        ";
}
?>
</td>
          </tr>
        <?php } ?>
        <tbody></br>
            Resultado de equipos sin solucion
      </tbody>
  </table>
</div></div></div>

  <div id='show-me-three2' style='display:none; border:2px solid #ccc'>
  <div class="tile">
                      <div class="tile-body">

          <table id="tabla4" class="table table-dark table-hover table-responsive">
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
      <th data-field="ubicacion" data-sortable="true">Ubicacion</th>
      <th data-field="garantia" data-sortable="true">Acción</th>

    </thead>
    <?php
      $ejecutar = mysqli_query($conn, $valorados);
    while($fila=mysqli_fetch_array($ejecutar)){
      $id_equipo          = $fila['id_equipo'];
        $id           = $fila['id_folio'];
        $nombre          = $fila['nombre'];
        $apellidos        = $fila['apellidos'];

        $marca           = $fila['marca'];
        $modelo           = $fila['modelo'];
        $fecha_entregar        = $fila['fecha_entregar'];
        $total        = $fila['restante'];
        $ubicacion        = $fila['ubicacion'];
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
                        <td><?php echo $ubicacion ?></td>
                        <td>
                        <button onclick='reporte(<?php echo "$id_equipo" ; ?>), enviarreporte(<?php echo "$id_equipo" ; ?>);' title='Ver reporte' class='btn btn-simple btn-primary btn-icon edit'><i class='ti-agenda'></i></button>

<?php

if($ubicacion == "Recepcion"){
  echo "

  <button onclick='pagar($id), enviarorden($id_equipo);' class='btn btn-simple btn-success btn-icon edit' title='Pagar'><i class='ti-money' ></i></button>
  <button onclick='devolucion($id), enviarorden($id_equipo);' class='btn btn-simple btn-danger btn-icon edit' title='Devolución'><i class='ti-back-left' ></i></button>


  ";
}else{  echo "
        ";
}
?>
</td>
          </tr>
        <?php } ?>
        <tbody></br>
            Resultado de valorados
      </tbody>
  </table>
</div></div></div>


 <div id='show-me-three3'>
                    <div class="tile">
                      <div class="tile-body">
          <table id="tabla5" class="table table-hover table-dark table-responsive">
    <thead>

        <th data-field="id">ID Solicitud</th>
      <th data-field="fecha" data-sortable="true">Tipo de tarjeta</th>
      <th data-field="estatus" data-sortable="true">Ubicación</th>
      <th data-field="estatus" data-sortable="true">Precio</th>    
      <th class="disabled-sorting">Acción</th>

    </thead>
    <?php
     $ejecutar = mysqli_query($conn, $aprovacion);
     while($fila=mysqli_fetch_array($ejecutar)){
        $id_solicitud          = $fila['id_solicitud'];
        $tipo           = $fila['tipo'];
        $ubicacion          = $fila['ubicacion'];
        $precio          = $fila['precio'];
        $id_equipo          = $fila['id_equipo'];

   


?>
                    <tr>
                        <td width="8%"><?php echo $id_solicitud ?></td>
                        <td width="14%"><?php echo $tipo ?></td>
                        <td width="14%"><?php echo $ubicacion ?></td>
                        <td width="14%"><?php echo $precio ?></td>
                    
                        <td width="14%">
                          <?php
                          echo "
                        <a href='#' onclick='abono($id), enviarmod( $id),enviarorden($id_equipo);' class='btn btn-simple btn-success btn-icon' title='Abonar refacción' ><i class='ti-money'></i></a>
         
                      </td>"; ?>

          </tr>
        <?php } ?>
        <tbody></br>
            Equipos pendientes de aprovacion
      </tbody>
  </table>
</div></div></div>

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

 <script type="text/javascript">
function enviarmod(id){
  $.ajax({
      // la URL para la petición
      url : 'recepcion_fn_actualizar_cliente.php',
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
        $("#swal-input0").val(data.data.id);
        $("#swal-input1").val(data.data.nom);
        $("#swal-input2").val(data.data.ape);
        $("#swal-input3").val(data.data.dir);
        $("#swal-input4").val(data.data.cor);
        $("#swal-input5").val(data.data.cel);

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
       $("#swal-input00").val(data.data.id_equipo);
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
       $("#swal-input50").val(data.data.valor);
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


 <script type="text/javascript">
 //Script para mandar ID para generar la orden
function actualizar(id){
  $.ajax({
      // la URL para la petición
      url : 'recepcion_fn_actualizar_cliente.php',
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
        $("#swal-input1").val(data.data.nom);
        $("#swal-input2").val(data.data.ape);



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
function aprobacion(id){
$.ajax({

    // la URL para la petición
    url : 'ml_fn_aprovacion.php',
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
      $("#swal-solicitud").val(data.data.id_solicitud);
      $("#swal-input0").val(data.data.tipo);
      $("#swal-input1").val(data.data.etiqueta);
      $("#swal-input2").val(data.data.solicitud);
      $("#swal-input3").val(data.data.estado);
      $("#swal-input4").val(data.data.ubicacion);
      $("#swal-precio").val(data.data.precio);
      $("#swal-input6").val(data.data.id_personal);
      $("#swal-input7").val(data.data.id_equipo);
      $("#swal-input8").val(data.data.fecha);
 





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
function cambio(id){


swal({
title: 'Cambio',
html:
'<div class="card-body"> <form target="_blank" action="recepcion_pdf-cambio.php" method="post" name="data" content="text/html; charset=utf-8" >'+
//Manda Llamar id,nombre y apellido
'<h5>Equipo que deja a cambio</h5>'+
        '<input type="hidden" name="swal-input00" id="swal-input00" value="'+id+'" readonly class="form-control border-input">'+
        '<input type="text" name="swal-input1" id="swal-input1" readonly class="form-control border-input">'+
        '<input type="hidden" name="swal-input3" id="swal-input3" readonly class="form-control border-input">'+
        '<input type="hidden" name="swal-input4" id="swal-input4" readonly class="form-control border-input">'+
        '<input type="hidden" name="swal-input6" id="swal-input6" readonly class="form-control border-input">'+
        '<input type="hidden" name="swal-input9" id="swal-input9" readonly class="form-control border-input">'+
        '<input type="hidden" name="swal-input12" id="swal-input12" readonly class="form-control border-input">'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
  '<label>Marca</label>'+
        '<input type="text" name="swal-input7" id="swal-input7" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+


'<div class="col-md-6">'+
  '<div class="form-group">'+
  '<label>Modelo</label>'+
        '<input type="text" name="swal-input8" id="swal-input8" readonly maxlength="25" required class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<h5>Equipo que compra</h5>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
  '<label>ID Venta</label>'+
  '<select class="form-control form-control-sm" textalign="center"  required name="tv_venta" id="tv_venta">'+
  '<option value="" ></option>'+
  <?php
  $ejec7 = mysqli_query($conn, $venta);
  while($fila=mysqli_fetch_array($ejec7)){?>
  '<?php echo '<option value="'.$fila["idventa_tv"].'">'.$fila["idventa_tv"].'</option>'; ?>'+
  <?php } ?>
  '</select>' +
    '</div>'+
'</div>'+

'<div class="col-md-6">'+
  '<div class="form-group">'+
  '<label>Marca</label>'+
        '<input type="text" name="marca" id="marca" readonly maxlength="25" required class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-6">'+
  '<div class="form-group">'+
  '<label>Modelo</label>'+
        '<input type="text" name="modelo" id="modelo" readonly maxlength="25" required class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+





'<h5>Costos</h5>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
 '<label>Tipo de compra</label>' +
 '<select class="form-control form-control-sm" textalign="center" onchange="operaciones();"  required name="compra" id="compra">'+
 '<option value=""></option>'+
 '<option value="Contado">Contado</option>'+
 '<option value="Apartado">Apartado</option>'+
 '</select>' +
 '</div>'+
'</div>'+

'<div class="col-md-6 costo" style="display:none;">'+
  '<div class="form-group">'+
 '<label>Cantidad a abonar</label>' +
 '<input input type="number" name="costo1" id="costo1" value="0" onchange="operaciones();" class="form-control border-input">' +
 '</div>'+
'</div>'+

'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Abono del cliente</label>'+
        '<input type="text" name="swal-input21" id="swal-input21"  readonly class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Valor de su televisión</label>'+
        '<input type="number" name="swal-input50" id="swal-input50" readonly  placeholder="Escribir con punto decimal" class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Costo de tv</label>'+
        '<input type="text" name="costo" id="costo" readonly  class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Total a pagar</label>'+
        '<input type="text" name="swal-input52" id="swal-input52" required readonly class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="col-md-12">'+
'<Button type="submit" class= "btn btn-info btn-fill btn-wd">Cambiar equipo y generar garantía</Button>'+

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

 $("#compra").change(function(){
    if(this.value == 'Apartado'){
      $(".costo").show();
    }else{
      $(".costo").hide();
    }
  })

$('#tv_venta').on('change', function(){
var id = $(this).val();


$.ajax({
  type: 'POST',
  url: 'obtener_tv_ventas.php',
  data: {id: id},
  dataType : 'json',
})
.done(function(data){

  $("#modelo").val(data.data.mod);
  $("#marca").val(data.data.mar);
  $("#costo").val(data.data.cost);

})
.fail(function(){
alert('hubo un error')
})

})

};

</script>


<script type="text/javascript">
//devolucion
function devolucion(id){


swal({
title: 'Devolución de equipo',
html:
'<div class="card-body"> <form target="_blank" action="recepcion_pdf-devolucion.php" method="post" name="data" content="text/html; charset=utf-8" >'+

'<input type="hidden" name="swal-input9" id="swal-input9" readonly class="form-control border-input">'+
'<input type="hidden" name="swal-input4" id="swal-input4" readonly class="form-control border-input">'+


//Manda Llamar id,nombre y apellido
'<h5>Al devolver el equipo se cobrará $200.00</h5>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Id equipo</label>'+
        '<input type="number" name="swal-input1" id="swal-input1" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+


'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Folio cliente</label>'+
        '<input type="number" name="swal-input00" id="swal-input00" value="'+id+'" readonly class="form-control border-input">'+
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
        '<label>Celular</label>'+
        '<input type="text" name="swal-input5" id="swal-input5" readonly maxlength="25" required class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Equipo</label>'+
        '<input type="text" name="swal-input6" id="swal-input6" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+


'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Marca</label>'+
        '<input type="text" name="swal-input7" id="swal-input7" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Modelo</label>'+
        '<input type="text" name="swal-input8" id="swal-input8" readonly maxlength="25" required class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Ingreso</label>'+
        '<input type="text" name="swal-input14" id="swal-input14" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Falla</label>'+
        '<input type="text" name="swal-input12" id="swal-input12" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Ubicación</label>'+
        '<input type="text" name="swal-input18" id="swal-input18" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Servicio</label>'+
        '<input type="text" name="swal-input17" id="swal-input17" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-12">'+
'<Button type="submit" class= "btn btn-info btn-fill btn-wd">Devolver equipo</Button>'+

'</form></div>',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: '</form> Devolver equipo',
cancelButtonClass: 'btn btn-danger btn-fill btn-wd',
showConfirmButton: false,
focusConfirm: false,
buttonsStyling: false,
reverseButtons: true
})

};

</script>
<html>


</html>
<script type="text/javascript">
//ventana orden de servición
function orden(id){


swal({
title: 'Nueva orden de servicio',
html:
'<div class="card-body"> <form target="_blank" action="recepcion_pdf-orden.php"  method="post" name="data" content="text/html; charset=utf-8" >'+

'<input type="text" readonly value="'+id+'" id="swal-input0" name="swal-input0" class="form-control border-input" >' +
'<input type="hidden" name="swal-input1" id="swal-input1" class="form-control border-input" >' +
'<input type="hidden" name="swal-input2" id="swal-input2" class="form-control border-input" >' +

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Equipo</label>'+
        '<select class="form-control form-control-sm" textalign="center" name="equipo" id="equipo"><option value="Television" >Televisión</option>'+
        '<option value="Ventiladores">Ventiladores</option>'+
        '<option value="Tarjeta madre">Tarjetas madre</option>'+
        '<option value="Audio">Audio</option>'+
        '<option value="Fuente de poder">Fuentes de poder</option>'+
        '</select>' +
    '</div>'+
'</div>'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Marca</label>'+
        '<input type="text" name="marca" id="marca" maxlength="25" onkeyup="this.value = this.value.toUpperCase();" required class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+
'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Modelo</label>'+
        '<input type="text" name="modelo" id="modelo" maxlength="25" onkeyup="this.value = this.value.toUpperCase();" required class="form-control border-input">'+
    '</div>'+
'</div>'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Falla</label>'+
        '<input type="text" name="falla" id="falla" onkeyup="this.value = this.value.toUpperCase();" maxlength="25" required class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+
'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Serie</label>'+
        '<input type="text" name="serie" id="serie" onkeyup="this.value = this.value.toUpperCase();" maxlength="25" required class="form-control border-input">'+
    '</div>'+
'</div>'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Accesorios</label>'+
        '<input type="text" name="acce" id="acce" maxlength="25"  class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+
'<div class="col-md-12">'+
'<div class="form-group">'+
        '<label>Tipo de servicio</label>'+
        '<select class="form-control form-control-sm" text-align="center" required name="servicio" id="servicio"><option value="Reparacion">Reparación</option><option value="Compra">Compra</option><option value="Revision">Revisión</option></select>' +
        '<label>Comentarios</label>'+
        '<textarea type="text" name="comen" id="comen"  class="form-control border-input"></textarea>'+
    '</div>'+
    '</div>'+
'<div class="col-md-12">'+
'<Button type="submit" onclick="recargar()" class= "btn btn-info btn-fill btn-wd">Registrar y generar reporte</Button>'+
'</form></div>',

showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText:  '</form> Registrar y generar reporte',
cancelButtonClass: 'btn btn-danger btn-fill btn-wd',
showConfirmButton: false,
focusConfirm: false,
buttonsStyling: false,
reverseButtons: true

 }).then(function (isConfirm) {
   if(isConfirm){swal(
'Orden registrada!',
'Éxito al registrar',
'success'
)
}if(isConfirm =='cancel'){
  swal(
'Orden culera!',
'Éxito al registrar',
'success'
)

}




}).catch(swal.noop);

};

function recargar() 
{
  location.reload(true); 
}

</script>



<script type="text/javascript">
//ventana orden de servición
function pagar(id){


swal({
title: 'Compra',
html:
'<div class="card-body"> <form target="_blank" action="recepcion_pdf-compra.php" method="post" name="data" content="text/html; charset=utf-8" >'+
//Manda Llamar id,nombre y apellido
'<h5>Equipo que nos vende</h5>'+
        '<input type="hidden" name="swal-input0" id="swal-input0" value="'+id+'" readonly class="form-control border-input">'+
        '<input type="text" name="swal-input1" id="swal-input1" readonly class="form-control border-input">'+
        '<input type="hidden" name="swal-input3" id="swal-input3" readonly class="form-control border-input">'+
        '<input type="hidden" name="swal-input4" id="swal-input4" readonly class="form-control border-input">'+
        '<input type="hidden" name="swal-input6" id="swal-input6" readonly class="form-control border-input">'+
        '<input type="hidden" name="swal-input9" id="swal-input9" readonly class="form-control border-input">'+
        '<input type="hidden" name="swal-input12" id="swal-input12" readonly class="form-control border-input">'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
  '<label>Marca</label>'+
        '<input type="text" name="swal-input7" id="swal-input7" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+


'<div class="col-md-6">'+
  '<div class="form-group">'+
  '<label>Modelo</label>'+
        '<input type="text" name="swal-input8" id="swal-input8" readonly maxlength="25" required class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+



'<h5>Costo</h5>'+


'<div class="row">'+
'<div class="col-md-12">'+
  '<div class="form-group">'+
        '<label>Valorada en la cantidad de</label>'+
        '<input type="text" name="swal-input50" id="swal-input50" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+



'<div class="col-md-12">'+
'<Button type="submit" class= "btn btn-info btn-fill btn-wd">Pagar al cliente y solicitar traslado</Button>'+

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

 $("#compra").change(function(){
    if(this.value == 'Apartado'){
      $(".costo").show();
    }else{
      $(".costo").hide();
    }
  })

$('#tv_venta').on('change', function(){
var id = $(this).val();


$.ajax({
  type: 'POST',
  url: 'obtener_tv_ventas.php',
  data: {id: id},
  dataType : 'json',
})
.done(function(data){

  $("#modelo").val(data.data.mod);
  $("#marca").val(data.data.mar);
  $("#costo").val(data.data.cost);

})
.fail(function(){
alert('hubo un error')
})

})

};

</script>

 <script type="text/javascript">
//ventana actualizar cliente
function alerta1(id){


swal({
title: 'Actualizar cliente',
html:
'<div class="col-lg-12"> <form action="recepcion_cliente_actualizar.php" method="post" name="data">'+
'<input name="swal-input0" type="hidden" id="swal-input0" class="form-control border-input" readonly>' +
'<label>Nombre(s)</label>' +
'<input input type="text" name="swal-input1" id="swal-input1" pattern="[A-Za-z ]+" title="Sólo letras"  class="form-control border-input maxlength="25" required>' +
'<label>Apellidos</label>' +
'<input input type="text" name="swal-input2" id="swal-input2" pattern="[A-Za-z]+" title="Sólo letras"  class="form-control border-input maxlength="25" required>' +
'<label>Direccion</label>' +
'<input input type="text" name="swal-input3" id="swal-input3" pattern="[A-Za-z0-9 ]+" class="form-control border-input maxlength="25" required>' +
'<label>Correo</label>' +
'<input input type="email" name="swal-input4" id="swal-input4" class="form-control border-input ">' +
'<label>Celular</label>' +
'<input input type="number" name="swal-input5" id="swal-input5" class="form-control border-input type="number" required></br>'+
'<Button type="submit" class= "btn btn-info btn-fill btn-wd">Actualizar cliente</Button>'+
'</form></div>',
type: 'warning',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Actualizar solicitud',
cancelButtonClass: 'btn btn-danger btn-fill btn-wd',
showConfirmButton: false,
focusConfirm: false,
buttonsStyling: false,
reverseButtons: true
})
  };

</script>

 <script type="text/javascript">
//Nuevo Aviso
    function aviso(){


    swal({
   title: 'Nuevo aviso',
   html:
   '<div class="col-lg-12"> <form action="recepcion_fn_aviso.php" method="post" name="data">'+

   '<label>A quien va dirigido</label>' +
   '<select class="form-control form-control-sm" required textalign="center" name="receptor" id="receptor"><option value="" ></option><option value="Administrador" >Administrador</option><option value="Jefe de taller">Jefe de taller</option></select>' +


   '<label>Aviso</label>' +
   '<textarea type="text" name="aviso" id="aviso" pattern="[A-Za-z0-9 ]+" required title="Sólo letras y números" class="form-control border-input"></textarea>'+

'<br>'+

   '<Button type="submit" class= "btn btn-info btn-fill btn-wd">Enviar notificación</Button>'+
   '</form></div>',
   type: 'warning',
   showCancelButton: true,
   confirmButtonColor: '#3085d6',
   cancelButtonColor: '#d33',
   confirmButtonText: '</form> Registrar aviso',
   cancelButtonClass: 'btn btn-danger btn-fill btn-wd',
   showConfirmButton: false,
   focusConfirm: false,
   buttonsStyling: false,
    reverseButtons: true
  })
  };
  </script>

  <script type="text/javascript">
//ventana de nuevo cliente
var sucursal = <?php echo $recepcion;?>;
    function nuevo(){


    swal({
   title: 'Agregar cliente',
   html:
   '<div class="col-lg-12"> <form action="recepcion_cliente.php" method="post" name="data">'+
   '<input input type="text" name="suc" id="suc" value="'+sucursal+'" class="form-control border-input">' +
   '<label>Nombre(s)</label>' +
   '<input input type="text" name="nom" id="nom" pattern="[A-Za-z ]+" title="Sólo letras" class="form-control border-input maxlength="25" required>' +
   '<label>Apellidos</label>' +
   '<input input type="text" name="ape" id="ape" pattern="[A-Za-z ]+" title="Sólo letras" class="form-control border-input maxlength="25" required>' +
   '<label>Direccion</label>' +
   '<input input type="text" name="dire" id="dire" pattern="[A-Za-z0-9 ]+" title="Sólo letras y números" class="form-control border-input maxlength="25" required>' +
   '<label>Correo</label>' +
   '<input input type="text" name="cor" id="cor" class="form-control border-input">' +
   '<label>Celular</label>' +
   '<input input type="number" name="cel" id="cel" class="form-control border-input type="number" required>'+
   '<label>Como nos conoció</label>' +
   '<select class="form-control form-control-sm" required textalign="center" name="conocio" id="conocio"><option value="" ></option><option value="Recomendacion" >Recomendación</option><option value="Redes sociales">Redes sociales</option></option><option value="Atraccion">Atracción</option><option value="Publicidad impresa">Publicidad impresa</option><option value="Anuncios internet">Anuncios internet</option></select></br>' +
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
//

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
//ventana orden de servición
function traslado(id){


swal({
title: 'Nueva solicitud de traslado',
html:
'<div class="card-body"> <form action="recepcion_fn_traslado.php"  method="post" name="data" content="text/html; charset=utf-8" >'+
'<label>Id equipo</label>'+

'<input type="text" name="swal-input00"  id="swal-input00" readonly class="form-control border-input" >' +
'<input type="hidden" name="id_folio" id="id_folio"value="'+id+'" class="form-control border-input" readonly >' +//Id Equipo


'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Ubicacion</label>'+
        '<input type="text" name="ubicacion" id="ubicacion"  pattern="[A-Za-z0-9 ]+" title="Sólo letras"  value="Recepcion" readonly required class="form-control border-input">'+

    '</div>'+
'</div>'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Destino</label>'+

        '<select class="form-control form-control-sm" textalign="center" required name="destino" id="destino"><option value="" >'+
        '</option><option value="Almacen" >Almacen</option>'+
        '<option value="Cliente">Cliente</option>'+
        '</select>' +
    '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-12">'+
  '<div class="form-group">'+

  '<label>Direccion</label>'+
        '<textarea type="text" required name="dire" dire="dire" pattern="[A-Za-z0-9 ]+" title="Sólo letras y números" class="form-control border-input"></textarea>'+

        '<label>Comentarios</label>'+
        '<textarea type="text" required name="comen" id="comen" pattern="[A-Za-z0-9 ]+" title="Sólo letras y números" class="form-control border-input"></textarea>'+
    '</div>'+
    '</div>'+


'<div class="col-md-12">'+
'<Button type="submit" class= "btn btn-info btn-fill btn-wd"  >Solicitar traslado</Button>'+


'</form></div>',

showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Registrar y generar reporte',
cancelButtonClass: 'btn btn-danger btn-fill btn-wd',
showConfirmButton: false,
focusConfirm: false,
buttonsStyling: false,
reverseButtons: true

})
};
</script>

<script type="text/javascript">
//ventana orden de servición
function entregar(id){

swal({
title: 'Entregar equipo',
html:
'<div class="card-body"> <form  action="recepcion_fn_entregar.php" method="post" name="data" content="text/html; charset=utf-8" >'+
//Manda Llamar id,nombre y apellido
//'<input name="swal-input0" type="text" id="swal-input0" class="form-control border-input" readonly >' +



'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Id equipo</label>'+
        '<input type="number" name="swal-input1" id="swal-input1" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+


'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Folio cliente</label>'+
        '<input type="number" value="'+id+'" readonly class="form-control border-input">'+
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
        '<label>Equipo</label>'+
        '<input type="text" name="swal-input6" id="swal-input6" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+


'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Marca</label>'+
        '<input type="text" name="swal-input7" id="swal-input7" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Modelo</label>'+
        '<input type="text" name="swal-input8" id="swal-input8" readonly maxlength="25" required class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Serie</label>'+
        '<input type="text" name="swal-input9" id="swal-input9" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Falla</label>'+
        '<input type="text" name="swal-input12" id="swal-input12" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Costo total</label>'+
        '<input type="text" name="swal-input23" id="swal-input23" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+


'<div class="col-md-12">'+
'<Button type="submit" class= "btn btn-info btn-fill btn-wd">Entregar equipo</Button>'+

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
//ventana orden de servición
function garantia(id){

swal({
title: 'Garantia',
html:
'<div class="card-body"> <form target="_blank" action="recepcion_pdf-garantia.php" method="post" name="data" content="text/html; charset=utf-8" >'+
//Manda Llamar id,nombre y apellido
//'<input name="swal-input0" type="text" id="swal-input0" class="form-control border-input" readonly >' +



'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Id equipo</label>'+
        '<input type="number" name="swal-input1" id="swal-input1" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+


'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Folio cliente</label>'+
        '<input type="number" value="'+id+'" name="id_folio" id="id_folio" readonly class="form-control border-input">'+
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
        '<label>Equipo</label>'+
        '<input type="text" name="swal-input6" id="swal-input6" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+


'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Marca</label>'+
        '<input type="text" name="swal-input7" id="swal-input7" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Modelo</label>'+
        '<input type="text" name="swal-input8" id="swal-input8" readonly maxlength="25" required class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Serie</label>'+
        '<input type="text" name="swal-input9" id="swal-input9" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Falla</label>'+
        '<input type="text" name="swal-input12" id="swal-input12" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Costo total</label>'+
        '<input type="text" name="swal-input23" id="swal-input23" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+


'<div class="col-md-12">'+
'<Button type="submit" class= "btn btn-info btn-fill btn-wd">Generar garantía</Button>'+

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
  var abono =document.getElementById('swal-input21').value;
  var valor =document.getElementById('swal-input50').value;
  var costo =document.getElementById('costo').value;
  var costo1 =document.getElementById('costo1').value;


   suma =parseInt(abono)+parseInt(valor)+parseInt(costo1);

   sub =parseInt(costo)-parseInt(suma);

   total =parseInt(document.getElementById('swal-input52').value= sub);

}


</script>

  <script type="text/javascript">
    //ventana actualizar cliente
    function abono(id){
      
    swal({
    title: 'Abonos',
    html:
    '<div class="card-body"> <form target="_blank" action="recepcion_pdf_abono.php" method="post" name="data" content="text/html; charset=utf-8" >'+
    //Manda Llamar id,nombre y apellido
    '<input name="swal-input00" type="hidden" id="swal-input00" value="'+id+'" class="form-control border-input" readonly >' +
    '<input name="swal-solicitud" type="text" id="swal-solicitud" class="form-control border-input" readonly >' +
    '<input name="swal-input1" type="hidden" id="swal-input1" class="form-control border-input" readonly >' +
    '<input name="swal-input3" type="hidden" id="swal-input3" class="form-control border-input" readonly >' +
    '<input name="swal-input4" type="hidden" id="swal-input4" class="form-control border-input" readonly >' +

    '<div class="col-md-12">'+
      '<div class="form-group">'+

      '<label>Precio de refacción</label>'+
            '<input type="number" name="swal-precio" id="swal-precio"  readonly class="form-control border-input">'+

      '<label>Cantidad abonada</label>'+
            '<input type="number" name="swal-input21" id="swal-input21"  readonly class="form-control border-input">'+

            '<label>Cantidad que abona</label>'+
            '<input type="number" name="swal-input25" id="swal-input25" equired placeholder="Escribir con punto decimal" onchange="operaciones_abono();" class="form-control border-input">'+

            '<label>Cantidad total abonada</label>'+
            '<input type="number" name="swal-input26" id="swal-input26"  readonly class="form-control border-input">'+
        '</div>'+
    '</div>'+


    '<div class="col-md-12">'+
    '<Button type="submit" class= "btn btn-info btn-fill btn-wd">Aceptar abono y generar ticket</Button>'+

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

function operaciones_abono()
{
  var abonada =document.getElementById('swal-input21').value;
  var abono =document.getElementById('swal-input25').value;
  var abonot =document.getElementById('swal-input26').value;


   suma =parseInt(abonada)+parseInt(abono);

   totalt =parseInt(document.getElementById('swal-input26').value= suma);


}


</script>

<script>
$(document).ready(function() {
    $('#tabla2').DataTable();
    $('#tabla3').DataTable();
    $('#tabla4').DataTable();
    $('#tabla5').DataTable();
} );
</script>

</div>
</div>

  </body>


</html>

