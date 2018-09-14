
<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

$id = $_GET ['id'];
//Tabla para ver todos los equipos
$consulta = "SELECT
equipo, marca,modelo,falla, id_equipo, fecha_ingreso, fecha_entregar, fecha_egreso, servicio, estado, ubicacion
FROM
reparar_tv
WHERE

id_folio = '$id';";



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
          <p class="app-sidebar__user-name"><?php $var_name ?></p>

        </div>
      </div>
      <ul class="app-menu">
      <li><a class="app-menu__item" href="#"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Inicio</span></a></li>
      <li><a class="app-menu__item" href="Recepcion.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Recepción</span></a></li>

      <li><a class="app-menu__item" href="taller.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Taller</span></a></li>
      <li class="treeview"><a class="app-menu__item" href="ml.php" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">MercadoLibre</span><i class="treeview-indicator fa fa-angle-right"></i></a>
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
          <h1><i class="fa fa-dashboard"></i>Historial</h1>

        </div>

      </div>
<div class="content-panel">
  <div class="card-body text-white bg-primary mb-3">
    <div class="card-header">Cliente
      <div class="col-md-2">
        <input type="text" value="<?php echo $id ?>" readonly class="form-control border-input">
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

              <div class="row">

                  <div class="col-md-12">
                    <div class="tile">
                      <div class="tile-body">

          <table id="a-tables" class="table table-dark table-hover table-responsive">
    <thead>
        <!--<th data-field="state" data-checkbox="true"></th>-->
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
      <th data-field="accion" data-sortable="true">Acción</th>

    </thead>
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
                        <?php
                        if($estado == "Entregado"){
                          echo "
                        <td>
                          <button onclick='garantia($id), enviarorden($id);' class='btn btn-simple btn-success btn-icon edit' title='Reingreso por garantía' ><i ></i></button>
                        </td>";
                      };
                      ?>
                       <?php
                        if($estado == "En reparacion"){
                          echo "
                        <td>
                          <button onclick='abono($id), enviarorden($id);' class='btn btn-simple btn-primary btn-icon edit' title='Ingresar abono' ><i ></i></button>
                        </td>";
                      };
                      ?>

          </tr>
        <?php } ?>
        <tbody></br>
           <h2>Historial completo del cliente <?php echo $id ?></h2>
      </tbody>
  </table>
      </div>
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



    <script type="text/javascript">
    //ventana actualizar cliente
    function garantia(id){

    swal({
    title: 'Reingreso por garantía',
    html:
    '<div class="card-body"> <form action="recepcion_pdf-garantia.php" method="post" name="data" content="text/html; charset=utf-8" >'+
    //Manda Llamar id,nombre y apellido
    //'<input name="swal-input0" type="text" id="swal-input0" class="form-control border-input" readonly >' +



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
    '<div class="card-body"> <form action="recepcion_pdf_abono.php" method="post" name="data" content="text/html; charset=utf-8" >'+
    //Manda Llamar id,nombre y apellido
    '<input name="swal-input0" type="hidden" id="swal-input0" class="form-control border-input" readonly >' +
    '<input name="swal-input1" type="hidden" id="swal-input1" class="form-control border-input" readonly >' +
    '<input name="swal-input3" type="hidden" id="swal-input3" class="form-control border-input" readonly >' +
    '<input name="swal-input4" type="hidden" id="swal-input4" class="form-control border-input" readonly >' +

    '<div class="col-md-12">'+
      '<div class="form-group">'+
            '<label>Cantidad que abona</label>'+
            '<input type="number" name="swal-input21" id="swal-input21"  class="form-control border-input">'+
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
