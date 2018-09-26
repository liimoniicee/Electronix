
<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];


$consulta = "SELECT * from ventas_tv where estado = 'Apartada';";

$avisos = "SELECT
*
FROM avisos where tipo= 'Traslado' and estado='pendiente'";

$num_avisos = "SELECT COUNT(*) FROM avisos where tipo= 'Traslado' and estado='pendiente'";



?>
<html lang="es">
  <head>

    <!-- Open Graph Meta-->
    <title>Ventas a credito</title>
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
                  <li><a class="app-notification__item" href="javascript:;">

                                <?php
                                  $ejec = mysqli_query($conn, $avisos);
                                while($fila=mysqli_fetch_array($ejec)){
                                    $avi     = $fila['aviso'];
                                    $fech_avi     = $fila['fecha'];

                              ?>
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
          <li><a class="app-menu__item active" href="Recepcion.php"><i class="app-menu__icon ti-headphone-alt"></i><span class="app-menu__label">Recepción</span></a></li>
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
          <h1>Ventas a credito</h1>

        </div>

      </div>





<div class="content-panel">

  <div class="card text-black bg-primary mb-3">
          <div class="card-body">

<div class="col-lg-12">
            <p class="bs-component">
            <button class="btn btn-secondary" onclick="location='recepcion_ventas.php'"><i class="ti-plus"></i>Ventas</button>
              <button class="btn btn-success" type="button" onclick="location='recepcion_ventas_apartadas.php'"><i class="ti-thumb-up"></i>Ventas apartadas a credito</button>

  </p>
  </div>


      <div class="col-md-12">
        <div class="tile">
          <div class="tile-body">

<table id="a-tables" class="table table-dark table-hover table-responsive">
    <thead>
        <!--<th data-field="state" data-checkbox="true"></th>-->
        <th data-field="id">Id venta</th>
      <th data-field="folio" data-sortable="true">Folio cliente</th>
      <th data-field="marca" data-sortable="true">Marca</th>
      <th data-field="modelo" data-sortable="true">Modelo</th>
      <th data-field="fecha_entrega" data-sortable="true">Ubicacion</th>
      <th data-field="costo" data-sortable="true">Costo total</th>
      <th data-field="garantia" data-sortable="true">Abonado</th>



    </thead>
    <?php
      $ejecutar = mysqli_query($conn, $consulta);
    while($fila=mysqli_fetch_array($ejecutar)){
        $id_venta          = $fila['idventa_tv'];
        $id_cliente           = $fila['id_folio'];
        $marca           = $fila['marca'];
        $modelo           = $fila['modelo'];
        $ubicacion           = $fila['ubicacion'];
        $costo           = $fila['costo'];
        $abono           = $fila['abono'];



?>
                    <tr>
                        <td><?php echo $id_venta ?></td>
                        <td><?php echo $id_cliente ?></td>
                        <td><?php echo $marca ?></td>
                        <td><?php echo $modelo ?></td>
                        <td><?php echo $ubicacion ?></td>
                        <td><?php echo $costo ?></td>
                        <td><?php echo $abono ?></td>


                        <td>
                        <button onclick="abono(<?php echo $id_cliente?>), enviarorden(<?php echo $id_venta ?>);" class="btn btn-simple btn-warning btn-icon edit" title="Abonar"><i ></i></button>
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
    <
    <div class="content-panel">
 <div class="col-lg-7">

</div>
</div>
<script>
//Script para mandar ID para generar la orden
function enviarorden(id_venta){
 $.ajax({
     // la URL para la petición
     url : 'recepcion_fn_ventas_apartadas.php',
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
       $("#swal-input0").val(data.data.id_folio);
       $("#swal-input1").val(data.data.nom);
       $("#swal-input2").val(data.data.ape);
       $("#swal-input3").val(data.data.abono);

/*
       $("#swal-input5").val(data.data.serie);
       $("#swal-input6").val(data.data.costo);
       $("#swal-input7").val(data.data.estado);
       $("#swal-input8").val(data.data.idvendedor);
       $("#swal-input9").val(data.data.ubicacion);
       $("#swal-input10").val(data.data.id_equipo);
       $("#swal-input11").val(data.data.tipo);
       $("#swal-input21").val(data.data.abono);
*/


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
    function abono(id,abono){

    swal({
    title: 'Abonos',
    html:
    '<div class="card-body"> <form target="_blank" action="recepcion_pdf_abono.php" method="post" name="data" content="text/html; charset=utf-8" >'+
    //Manda Llamar id,nombre y apellido
    '<input name="swal-input0" value="'+id+'" type="text" id="swal-input0"  class="form-control border-input" readonly >' +
    '<input name="swal-input1" type="hidden" id="swal-input1" class="form-control border-input" readonly >' +
    '<input name="swal-input2" type="hidden" id="swal-input3" class="form-control border-input" readonly >' +

    '<div class="col-md-12">'+
      '<div class="form-group">'+
      '<label>Cantidad abonada</label>'+
            '<input type="number" name="swal-input3" id="swal-input3"    readonly class="form-control border-input">'+

            '<label>Cantidad que abona</label>'+
            '<input type="number" name="swal-input4" id="swal-input4" required placeholder="Escribir con punto decimal" onkeypress="operaciones();" class="form-control border-input">'+

            '<label>Cantidad total abonada</label>'+
            '<input type="number" name="swal-input5" id="swal-input5"  readonly class="form-control border-input">'+
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
