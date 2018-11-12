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
$id = $_GET ['id'];
//Tabla para ver todos los equipos
$consulta = "SELECT
equipo, marca,modelo,falla, id_equipo, fecha_ingreso, fecha_entregar, fecha_egreso, servicio, estado, ubicacion,presupuesto,mano_obra, abono,restante
FROM reparar_tv  WHERE id_folio = '$id';";

$consulta1= "SELECT * from ventas_tv where id_folio ='$id';";

$cons = "SELECT * FROM clientes WHERE id_folio = $id";
$resu = $conn->query($cons);


   if($resu->num_rows > 0){

    while($row = $resu->fetch_assoc()) {
    $nom = $row["nombre"];
    $ape = $row["apellidos"];
   	$cor = $row["correo"];
   	$cel = $row["celular"];
   	$dire = $row["direccion"];
   	$fech = $row["fecha"];
   	$pun = $row["puntos"];


   //aqui termina el while

 }
}else{}
  $avisos = "SELECT
  *
  FROM avisos where tipo= 'Recepcion' and estado='pendiente'  order by fecha desc;";

$num_avisos = "SELECT COUNT(*) FROM avisos where tipo= 'Recepcion' and estado='pendiente'";
?>


<html lang="es">
  <head>

    <!-- Open Graph Meta-->
    <title>Historial</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
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
              <li class="app-notification__title">You have <?php echo $num_avi ?> new notifications.</li>
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
          <li class="dropdown"><a class="app-nav__item" href="checkout_empleados.php" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="ti-shift-left"></i></a>

          </li>
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
          <h1><i class="fa fa-dashboard"></i>Historial</h1>

        </div>

      </div>
<div class="content-panel">
  <div class="card-body text-white bg-primary mb-3">
    <div class="card-header">
      <div class="row">
      <div class="col-md-2">
        <label>Cliente</label>
        <input type="text" value="<?php echo $id ?>" readonly class="form-control border-input">
  </div>
</div>
</div>
            <div class="row">

              <div class="col-md-2">
                  <div class="form-group">
                      <label >Nombre</label>
                      <input type="text" readonly value="<?php echo $nom ?>" class="form-control border-input" >
                  </div>
              </div>
              <div class="col-md-2">
                  <div class="form-group">
                      <label >Apellidos</label>
                      <input type="text" readonly value="<?php echo $ape ?>" class="form-control border-input" >
                  </div>
              </div>
              <div class="col-md-2">
                  <div class="form-group">
                      <label >Direccion</label>
                      <input type="text" readonly value="<?php echo $dire ?>" class="form-control border-input" >
                  </div>
              </div>
              <div class="col-md-2">
                  <div class="form-group">
                      <label >Correo</label>
                      <input type="text" readonly value="<?php echo $cor ?>" class="form-control border-input" >
                  </div>
              </div>
              <div class="col-md-2">
                  <div class="form-group">
                      <label >Celular</label>
                      <input type="text" readonly value="<?php echo $cel ?>" class="form-control border-input" >
                  </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-2">
                  <div class="form-group">
                      <label >Fecha de inscripción</label>
                      <input type="text" readonly value="<?php echo $fech ?>" class="form-control border-input">
                  </div>
              </div>

              <div class="col-md-2">
                  <div class="form-group">
                      <label >Puntos</label>
                      <input type="text" readonly value="<?php echo $pun ?>" class="form-control border-input">
                  </div>
              </div>
            </div>

      </div>

      <div class="tile">
        <div class="tile-body">
          <table id="tabla" class="table table-dark table-responsive">
    <thead>
        <th data-field="id">ID</th>
      <th data-field="equipo" data-sortable="true">Equipo</th>
      <th data-field="marca" data-sortable="true">Marca</th>
      <th data-field="modelo" data-sortable="true">Modelo</th>
      <th data-field="falla" data-sortable="true">falla</th>
      <th data-field="fecha_ingreso" data-sortable="true">Ingreso</th>
      <th data-field="fecha_entregar" data-sortable="true">Reparación</th>
      <th data-field="fecha_egreso" data-sortable="true">Salida</th>
      <th data-field="estado" data-sortable="true">Estado</th>
      <th data-field="ubicacion" data-sortable="true">Ubicación</th>
      <th data-field="abono" data-sortable="true">Refaccion</th>
      <th data-field="abono" data-sortable="true">Trabajo</th>
      <th data-field="abono" data-sortable="true">Abonado</th>
      <th data-field="restante" data-sortable="true">Restante</th>
      <th data-field="servicio" data-sortable="true">Servicio</th>
      <th data-field="actions" class="td-actions text-right">Acción</th>

    </thead>
    <tbody>
    <?php
      $ejecutar = mysqli_query($conn, $consulta);
    while($fila=mysqli_fetch_array($ejecutar)){
        $id_equipo          = $fila['id_equipo'];
        $equipo           = $fila['equipo'];
        $marca           = $fila['marca'];
        $modelo           = $fila['modelo'];
        $falla          = $fila['falla'];
        $fecha_ingreso        = $fila['fecha_ingreso'];
        $fecha_entregar        = $fila['fecha_entregar'];
        $fecha_egreso        = $fila['fecha_egreso'];
        $estado        = $fila['estado'];
        $ubicacion        = $fila['ubicacion'];
        $refaccion        = $fila['presupuesto'];
        $mano        = $fila['mano_obra'];

        $abono        = $fila['abono'];
        $restante        = $fila['restante'];
        $servicio        = $fila['servicio'];

?>
                    <tr>
                        <td><?php echo $id_equipo ?></td>
                        <td><?php echo $equipo ?></td>
                        <td><?php echo $marca ?></td>
                        <td><?php echo $modelo ?></td>
                        <td><?php echo $falla ?></td>
                        <td><?php echo $fecha_ingreso ?></td>
                        <td><?php echo $fecha_entregar ?></td>
                        <td><?php echo $fecha_egreso ?></td>
                        <td><?php echo $estado ?></td>
                        <td><?php echo $ubicacion ?></td>
                        <td><?php echo $refaccion?></td>
                        <td><?php echo $mano?></td>

                        <td><?php echo $abono?></td>
                        <td><?php echo $restante ?></td>
                        <td><?php echo $servicio ?></td>
                          <td>

                        <?php
                        if($estado == "En reparacion" or $estado=="Diagnosticada"){
                          echo "

                          <button onclick='abono($id), enviarorden($id_equipo);'class='btn btn-simple btn-success btn-icon' title='Ingresa abono' ><i class='ti-money'></i></button>
                        ";
                        }if($ubicacion == "Almacen"){
                          echo "

                          <button onclick='traslado($id), enviarorden($id_equipo);' class='btn btn-simple btn-primary btn-icon edit' title='Solicitar traslado'><i class='ti-truck' ></i></button>
                        ";
                      
                      }elseif($estado == "Entregado"){
                          echo "

                          <button onclick='garantia($id), enviarorden($id_equipo);' class='btn btn-simple btn-success btn-icon' title='Ingreso por garantia' ><i class='ti-agenda'></i></button>
                      

                          ";
                      
                    }elseif($estado == "Diagnosticada" or $estado=="Sin solucion" or $estado=="Reparada"){
                      echo "

                      <button onclick='reporte($id_equipo), enviarreporte($id_equipo);' title='Ver reporte' class='btn btn-simple btn-primary btn-icon edit'><i class='ti-agenda'></i></button>
                  

                      ";
                  
                }
                      ?>
</td>
          </tr>
        <?php } ?>
        </br>
           <h2>Historial reparacion del cliente <?php echo $id ?></h2>
      </tbody>
  </table>
      </div>



</div>


<div class="tile">
        <div class="tile-body">
          <table id="tabla" class="table table-dark table-responsive">
    <thead>
        <th data-field="id">Id venta</th>
      <th data-field="marca" data-sortable="true">Marca</th>
      <th data-field="modelo" data-sortable="true">Modelo</th>
      <th data-field="fecha_ingreso" data-sortable="true">Estado</th>
      <th data-field="fecha_egreso" data-sortable="true">Fecha egreso</th>
      <th data-field="tipo" data-sortable="true">Tipo</th>
      <th data-field="estado" data-sortable="true">Estado</th>
      <th data-field="ubicacion" data-sortable="true">Ubicacion</th>
      <th data-field="costo" data-sortable="true">Costo</th>
      <th data-field="abono" data-sortable="true">Abono</th>


    </thead>
    <tbody>
    <?php
      $ejecutar = mysqli_query($conn, $consulta1);
    while($fila=mysqli_fetch_array($ejecutar)){
        $id_venta          = $fila['idventa_tv'];
        $marca           = $fila['marca'];
        $modelo           = $fila['modelo'];
        $estado           = $fila['estado'];
        $fecha        = $fila['fecha_egreso'];
        $tipo        = $fila['tipo'];
        $estado        = $fila['estado'];
        $ubicacion        = $fila['ubicacion'];
        $costo        = $fila['costo'];
        $abono        = $fila['abono'];


?>
                    <tr>
                        <td><?php echo $id_venta ?></td>
                        <td><?php echo $marca ?></td>
                        <td><?php echo $modelo ?></td>
                        <td><?php echo $estado ?></td>
                        <td><?php echo $fecha ?></td>
                        <td><?php echo $tipo ?></td>
                        <td><?php echo $estado ?></td>
                        <td><?php echo $ubicacion ?></td>
                        <td><?php echo $costo ?></td>
                        <td><?php echo $abono ?></td>
                   
          </tr>
        <?php } ?>
        </br>
           <h2>Historial compras del cliente <?php echo $id ?></h2>
      </tbody>
  </table>
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
    <script>
    $(document).ready(function() {
        $('#tabla').DataTable();

    } );
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
    //ventana actualizar cliente
    function garantia(id){

    swal({
    title: 'Reingreso por garantía',
    html:
    '<div class="card-body"> <form action="recepcion_fn_reingreso.php" method="post" name="data" content="text/html; charset=utf-8" >'+
    //Manda Llamar id,nombre y apellido

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
            '<input type="number" value="'+id+'" name="swal-input00" id="swal-input00" readonly class="form-control border-input">'+
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
    '<Button type="submit" class= "btn btn-info btn-fill btn-wd">Reingresar por garantía</Button>'+

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
    function abono(id){

    swal({
    title: 'Abonos',
    html:
    '<div class="card-body"> <form target="_blank" action="recepcion_pdf_abono.php" method="post" name="data" content="text/html; charset=utf-8" >'+
    //Manda Llamar id,nombre y apellido
    '<input name="swal-input00" type="hidden" id="swal-input00" value="'+id+'" class="form-control border-input" readonly >' +
    '<input name="swal-input1" type="hidden" id="swal-input1" class="form-control border-input" readonly >' +
    '<input name="swal-input3" type="hidden" id="swal-input3" class="form-control border-input" readonly >' +
    '<input name="swal-input4" type="hidden" id="swal-input4" class="form-control border-input" readonly >' +

    '<div class="col-md-12">'+
      '<div class="form-group">'+
      '<label>Cantidad abonada</label>'+
            '<input type="number" name="swal-input21" id="swal-input21"  readonly class="form-control border-input">'+

            '<label>Cantidad que abona</label>'+
            '<input type="number" name="swal-input25" id="swal-input25" equired placeholder="Escribir con punto decimal" onchange="operaciones();" class="form-control border-input">'+

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

  </body>
</html>

  <?php

              $ejec = mysqli_query($conn, $avisos);
            while($fila=mysqli_fetch_array($ejec)){
                $avi     = $fila['aviso'];
                $fech_avi     = $fila['fecha'];

          ?>

<script>
/*
Push.create("<?php echo $fech_avi; ?>", {
  body:"<?php echo $avi; ?>",
  icon:"assets/img/alert1.png",
  timeout:10000

});
*/
</script>
<?php } ?>

<script type="text/javascript">

function operaciones()
{
  var abonada =document.getElementById('swal-input21').value;
  var abono =document.getElementById('swal-input25').value;
  var abonot =document.getElementById('swal-input26').value;


   suma =parseInt(abonada)+parseInt(abono);

   totalt =parseInt(document.getElementById('swal-input26').value= suma);


}


</script>

<script type="text/javascript">
//ventana orden de servición
function traslado(id){


swal({
title: 'Nueva solicitud de traslado',
html:
'<div class="card-body"> <form action="recepcion_fn_traslado.php"  method="post" name="data" content="text/html; charset=utf-8" >'+
'<label>Id equipo</label>'+

'<input type="text" name="swal-input0"  id="swal-input0" readonly class="form-control border-input" >' +
'<input type="hidden" name="id_folio" id="id_folio"value="'+id+'" class="form-control border-input" readonly >' +//Id Equipo


'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Ubicacion</label>'+
        '<input type="text" name="ubicacion" id="ubicacion"  pattern="[A-Za-z]+" title="Sólo letras"  value="Almacen" readonly required class="form-control border-input">'+

    '</div>'+
'</div>'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Destino</label>'+
        
        '<select class="form-control form-control-sm" textalign="center" required name="destino" id="destino"><option value="" >'+
        '</option><option value="Recepcion" >Recepcion</option>'+
        '<option value="Cliente">Cliente</option>'+ 
        '</select>' +
    '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-12">'+
  '<div class="form-group">'+
  
  '<label>Direccion</label>'+
        '<textarea type="text" required name="dire" dire="dire" pattern="[A-Za-z0-9]+" title="Sólo letras y números" class="form-control border-input"></textarea>'+

        '<label>Comentarios</label>'+
        '<textarea type="text" required name="comen" id="comen" pattern="[A-Za-z0-9]+" title="Sólo letras y números" class="form-control border-input"></textarea>'+
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