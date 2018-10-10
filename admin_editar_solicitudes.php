<!DOCTYPE html>
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

$clientes = "SELECT
             id_folio, nombre, apellidos,direccion, celular, correo, puntos
            FROM
            clientes ORDER BY fecha desc";

$traslados = "SELECT * from traslado;";

$almacen = "SELECT * from almacen;";

$ml = "SELECT * from refacciones_tv where estado = 'Publicada';";


$avisos = "SELECT
*
FROM avisos where tipo= 'Administrador' and estado='pendiente'order by fecha desc;";

$num_avisos = "SELECT COUNT(*) FROM avisos where tipo= 'Administrador' and estado='pendiente' order by fecha desc;";


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
            <h3><i class="fa fa-dashboard"></i>Administrador - editar soliciutdes</h3>
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
                        <input name='test' type='radio' /> Clientes
                      </label>

                        <label class="btn btn-danger" id='look-me'>
                        <input name='test' type='radio' /> Traslados
                      </label>

                      <label class="btn btn-success" id='look-me2'>
                        <input name='test' type='radio' /> Almacen
                      </label>

                      <label class="btn btn-warning" id='look-me3'>
                        <input name='test' type='radio' /> Mercado libre
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
                    <th >Marca</th>
                    <th>Modelo</th>
                    <th>Falla</th>
                    <th>Comentarios</th>
                    <th>Ingreso</th>
                    <th>Servicio</th>
                    <th>Estado</th>
                    <th>Ubicación</th>
                    <th>Personal</th>
                    <th>Acción</th>

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
          <button type="button" data-id="<?php echo $id_equipo ?>" class="open-AddBookDialog btn btn-primary" data-toggle="modal" data-target="#exampleModalLong">
    Launch demo modal
  </button>
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
                                <table id="tabla2" class="table table-hover table-dark table-responsive">
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
                            $ejecutar2 = mysqli_query($conn, $clientes);
                          while($fila=mysqli_fetch_array($ejecutar2)){
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
                      <!--Termina tabla 2-->

                      <!--Comienza tabla 3-->
                    <div id='show-me-three' style='display:none; border:2px solid #ccc'>

                                          <div class="tile">
                                            <div class="tile-body">
                                        <table id="tabla3" class="table table-dark table-responsive">
                          																	<thead>
                                                          <th >Id traslado</th>
                                                          <th >Id equipo</th>
                                                          <th >Estado</th>
                                                          <th >Ubicacion</th>
                                                          <th >Destino</th>
                                                          <th >Fecha solicitud</th>
                                                          <th>Acción</th>

                          																	</thead>
                                                            <?php
                                                              $ejecutar3 = mysqli_query($conn, $traslados);
                                                            while($fila=mysqli_fetch_array($ejecutar3)){
                                                                $id     = $fila['id_traslado'];
                                                                $id_e     = $fila['id_equipo'];
                                                                $sta     = $fila['estado'];
                                                                $ubi      = $fila['ubicacion'];
                                                                $dest      = $fila['destino'];
                                                                $fech   = $fila['fecha_solicitud'];
                                                        ?>
                                                  <tr>
                                                  <td width="14%"><?php echo $id ?></td>
                                                  <td width="14%"><?php echo $id_e ?></td>
                                                  <td width="14%"><?php echo $sta ?></td>
                                                  <td width="14%"><?php echo $ubi ?></td>
                                                  <td width="14%"><?php echo $dest ?></td>
                                                  <td width="14%"><?php echo $fech ?></td>
                                                  <td width="14%">
                                                  <button onclick="swal_traslados(<?php echo $id ?>), enviarmod(<?php echo $id ?>);" class="btn btn-simple btn-warning btn-icon edit"><i class="ti-truck"></i></button>
                                                  </td>
                                                </tr>
                                        <?php } ?>
                                        <tbody></br>
                                            Tabla de traslados
                                      </tbody>
                                        </table>
                                        </div>
                                        </div>
                                        </div>

                      <!-- Termina tabla 3 -->
                        <!-- comienza tabla 4 -->

                  <div id='show-me-three2' style='display:none; border:2px solid #ccc'>
                    <div class="tile">
                      <div class="tile-body">


                        <table id="a-tables" class="table table-dark table-hover table-responsive">
                            <thead>
                                <!--<th data-field="state" data-checkbox="true"></th>-->
                                <th data-field="id">Id equipo</th>
                              <th data-field="folio" data-sortable="true">Folio</th>
                              <th data-field="marca" data-sortable="true">Marca</th>
                              <th data-field="modelo" data-sortable="true">Modelo</th>
                              <th data-field="fecha_entrega" data-sortable="true">Servicio</th>
                              <th data-field="costo" data-sortable="true">Estado</th>
                              <th data-field="garantia" data-sortable="true">Acción</th>



                            </thead>
                            <?php
                              $ejecutar4 = mysqli_query($conn, $almacen);
                            while($fila=mysqli_fetch_array($ejecutar4)){
                                $id_equipo          = $fila['id_equipo'];
                                $id           = $fila['id_folio'];
                                $marca           = $fila['marca'];
                                $modelo           = $fila['modelo'];
                                $servicio           = $fila['servicio'];
                                $estado           = $fila['estado'];


                        ?>
                                            <tr>
                                                <td><?php echo $id_equipo ?></td>
                                                <td><?php echo $id ?></td>
                                                <td><?php echo $marca ?></td>
                                                <td><?php echo $modelo ?></td>
                                                <td><?php echo $servicio ?></td>
                                                <td><?php echo $estado ?></td>

                                                <td>
                                                <button onclick="garantia(<?php echo $id?>), enviarorden(<?php echo $id_equipo?>);" class="btn btn-simple btn-success btn-icon edit" title="Registrar en almacen"><i class="ti-save"></i></button>
                                                </td>

                                  </tr>
                                <?php } ?>
                                <tbody></br>
                                  Almacen
                              </tbody>
                          </table>
                          </div>
                        </div>
                    </div>
                      <!-- Termina tabla 4 -->
                        <!-- comienza tabla 5 -->
                      <div id='show-me-three3' style='display:none; border:2px solid #ccc'>
                        <div class="tile">
                          <div class="tile-body">

                            <table id="a-tables" class="table table-dark table-hover table-responsive">
                            <thead>
                            <th data-field="folio" data-sortable="true">Nombre</th>
                            <th data-field="equipo" data-sortable="true">Marca</th>
                            <th data-field="falla" data-sortable="true">Modelo</th>
                            <th data-field="fecha_ingreso" data-sortable="true">Stock</th>
                            <th data-field="fecha_entregar" data-sortable="true">Ubicación</th>
                            <th data-field="ubicacion" data-sortable="true">Precio</th>
                            <th data-field="fecha_ingreso" data-sortable="true">Entrada</th>
                            <th data-field="fecha_entregar" data-sortable="true">Etiqueta 1</th>
                            <th data-field="ubicacion" data-sortable="true">Etiqueta 2</th>

                            <th data-field="accion" data-sortable="true">Acción</th>
                            </thead>
                            <?php
                            $ejecutar5 = mysqli_query($conn, $ml);
                            while($fila=mysqli_fetch_array($ejecutar5)){
                           $id           = $fila['Id_refacciones'];
                            $nombre           = $fila['nombre'];
                            $marca           = $fila['marca'];
                            $modelo          = $fila['modelo'];
                            $cantidad        = $fila['cantidad'];
                            $ubicacion        = $fila['ubicacion'];
                            $precio        = $fila['precio'];
                            $fecha_entrada           = $fila['fecha_entrada'];
                            $etiqueta_1          = $fila['etiqueta_1'];
                            $etiqueta_2        = $fila['etiqueta_2'];
                            $link        = $fila['link'];
                            ?>
                                <tr>

                                    <td><?php echo $nombre ?></td>
                                    <td><?php echo $marca ?></td>
                                    <td><?php echo $modelo ?></td>
                                    <td><?php echo $cantidad ?></td>
                                    <td><?php echo $ubicacion ?></td>
                                    <td><?php echo $precio ?></a></td>
                                    <td><?php echo $fecha_entrada ?></td>
                                    <td><?php echo $etiqueta_1 ?></td>
                                    <td><?php echo $etiqueta_2 ?></a></td>

                                    <td>
                                    <button onclick="estado(<?php echo $id?>), refaccion(<?php echo $id?>);" title="Cambiar estado" class="btn btn-simple btn-warning btn-sm"><i class="ti-star"></i></button>
                                    </td>



                            </tr>
                            <?php } ?>
                            <tbody></br>
                          Mercado Libre
                            </tbody>
                            </table>

                  </div>
                </div>
                      </div>

                  <!-- termina tabla 5 -->

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
          $('#tabla2').DataTable();
          $('#tabla3').DataTable();
          $('#tabla4').DataTable();
          $('#tabla5').DataTable();
          $('#tabla6').DataTable();
          $('#tabla7').DataTable();
      } );
      </script>

  </body>


</html>

<!-- comienza el mod ajax -->
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
<!-- termina el mod ajax -->

<!-- comienzan los modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- body modal -->
    <div class="row">
          <div class="col-md-2">
              <div class="form-group">
                  <label >id del equipo</label>
                  <input type="text" name="bookId" id="bookId" readonly class="form-control border-input" >
              </div>
          </div>

          <?php

          ?>
          <div class="col-md-2">
              <div class="form-group">
                  <label>Equipo</label>
                  <input type="text" name="nom" id="nom"  value="" class="form-control border-input" >
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group">
                  <label >Marca</label>
                  <input type="text" name="ape" id="ape"   value="" class="form-control border-input" >
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group">
                  <label >Medolo</label>
                  <input type="text"  value="" class="form-control border-input" >
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group">
                  <label >Serie</label>
                  <input type="text"  value="" class="form-control border-input" >
              </div>
          </div>

          <div class="col-md-2">
              <div class="form-group">
                  <label >Accesorios</label>
                  <input type="text"  value="" class="form-control border-input" >
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group">
                  <label >Falla</label>
                  <input type="text"  value="" class="form-control border-input" >
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group">
                  <label >Comentarios</label>
                  <input type="text"  value="" class="form-control border-input" >
              </div>
          </div>
          <div class="col-md-3">
              <div class="form-group">
                  <label >Fecha de ingreso</label>
                  <input type="text"  value="" class="form-control border-input" >
              </div>
          </div>
          <div class="col-md-3">
              <div class="form-group">
                  <label >inicio reparacion</label>
                  <input type="text"  value="" class="form-control border-input" >
              </div>
          </div>

          <div class="col-md-2">
              <div class="form-group">
                  <label >Fecha egreso</label>
                  <input type="text"  value="" class="form-control border-input" >
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group">
                  <label >Servicio</label>
                  <input type="text"  value="" class="form-control border-input" >
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group">
                  <label >Presupuesto</label>
                  <input type="text"  value="" class="form-control border-input" >
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group">
                  <label >Mano de obra</label>
                  <input type="text"  value="" class="form-control border-input" >
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group">
                  <label >Abono</label>
                  <input type="text"  value="" class="form-control border-input" >
              </div>
          </div>

          <div class="col-md-2">
              <div class="form-group">
                  <label >Restante</label>
                  <input type="text" value="" class="form-control border-input" >
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group">
                  <label >Costo total</label>
                  <input type="text" value="" class="form-control border-input" >
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group">
                  <label >Estado</label>
                  <input type="text" value="" class="form-control border-input" >
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group">
                  <label >Ubicacion</label>
                  <input type="text" value="" class="form-control border-input" >
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group">
                  <label >Puntos</label>
                  <input type="text" value="" class="form-control border-input" >
              </div>
          </div>

          <div class="col-md-2">
              <div class="form-group">
                  <label >id del personal</label>
                  <input type="text" value="" class="form-control border-input" >
              </div>
          </div>

          <div class="col-md-2">
              <div class="form-group">
                  <label >id folio</label>
                  <input type="text" value="" class="form-control border-input" >
              </div>
          </div>
</div>
        <!-- termina body modal -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- termina modal -->

<script>
$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

$(document).on("click", ".open-AddBookDialog", function () {
     var myBookId = $(this).data('id');
     $(".modal-body #bookId").val( myBookId );
});
</script>





  <?php
  //notificacion tipo facebook
              $ejec = mysqli_query($conn, $avisos);
            while($fila=mysqli_fetch_array($ejec)){
                $avi1     = $fila['aviso'];
                $fech_avi1     = $fila['fecha'];

          ?>


<?php } ?>