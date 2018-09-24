<!DOCTYPE html>
<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];



$consulta = "SELECT id_equipo,equipo, marca,modelo, falla, comentarios
FROM reparar_tv
WHERE estado='En reparacion' and id_personal='$var_clave';";

$consulta1 = "SELECT id_equipo,equipo, marca,modelo, falla, comentarios
FROM reparar_tv
WHERE estado='En reparacion' ";
$avisos = "SELECT
*
FROM avisos where tipo= 'Traslado' and estado='pendiente'";

$num_avisos = "SELECT COUNT(*) FROM avisos where tipo= 'Traslado' and estado='pendiente'";
?>
<html lang="es">
  <head>

    <!-- Open Graph Meta-->
    <title>Tareas</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
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
      <li><a class="app-menu__item" href="tecnico.php"><i class="app-menu__icon ti-headphone-alt"></i><span class="app-menu__label">Tareas</span></a></li>
    
</ul>





    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Tareas de taller</h1>
          <p>Dar un buen servicio es nuestra prioridad</p>
        </div>

      </div>





<div class="card text-black bg-primary mb-3">
  <div class="card-body">


          <div class="col-lg-12">
            <p class="bs-component">
              <button class="btn btn-info" type="button" onclick="alerta();">Tareas asignadas</button>
              <button class="btn btn-success" type="button" onclick="location='recepcion_e_reparados.php'">Tareas concretadas</button>
              <button class="btn btn-danger" type="button" onclick="location='recepcion_e_sin_repar.php'">Tareas necesita pieza</button>

  </p>

<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-body">
          <table id="a-tables" class="table table-hover table-dark table-responsive">
    <thead>

        <th data-field="id">ID Equipo</th>
      <th data-field="id_equipo" data-sortable="true">equipo</th>
      <th data-field="marca" data-sortable="true">marca</th>
      <th data-field="modelo" data-sortable="true">modelo</th>
      <th data-field="modelo" data-sortable="true">falla</th>
      <th class="disabled-sorting">Comentarios extras</th>
      <th class="disabled-sorting">Acción</th>

    </thead>
    <?php
      $ejecutar2 = mysqli_query($conn, $consulta1);
    while($fila=mysqli_fetch_array($ejecutar2)){
      $id_equipo          = $fila['id_equipo'];
      $equipo           = $fila['equipo'];
      $marca           = $fila['marca'];
      $modelo          = $fila['modelo'];
      $falla          = $fila['falla'];
      $comentarios          = $fila['comentarios'];


?>
                    <tr>
                        <td><?php echo $id_equipo ?></td>
                        <td><?php echo $equipo ?></td>
                        <td><?php echo $marca ?></td>
                        <td><?php echo $modelo ?></td>
                        <td><?php echo $falla ?></td>
                        <td><?php echo $comentarios ?></td>


                        <td>
                        <button onclick="reporte(<?php echo $id_equipo?>), enviarorden(<?php echo $id_equipo ?>);" class="btn btn-simple btn-success btn-icon edit" title="Nueva orden"><i ></i></button>


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

 <script>
 /*
//Script para mandar ID para generar la orden
function enviarorden(id_equipo){
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
*/
</script>



  <script type="text/javascript">
//ventana de nuevo cliente
    function reporte(id_equipo){

var id = id_equipo;
    swal({
   title: 'Enviar reporte',
   html:
'<div class="card-body"> <form action="tecnico_fn_reporte.php" method="post" name="data" enctype="multipart/form-data">'+

'<div class="col-md-12">'+
'<div class="form-group">'+
'<input type="text" name="swal-input0"  id="swal-input0" value="'+id+'"  class="form-control border-input" readonly >' +//Id Equipo

        '<label>Falla encontrada</label>'+
        '<textarea type="text" name="swal-input1" id="swal-input1" required class="form-control border-input"></textarea>'+

        '<label>Procedimiento realizado</label>'+
        '<textarea type="text" name="swal-input2" id="swal-input2" required class="form-control border-input"></textarea>'+

        '<label>Estado de la reparación</label>'+

        '<select class="form-control form-control-sm" text-align="center" required name="swal-input3" id="swal-input3">'+
        '<option value="" ></option>'+
        '<option value="Reparado">Reparado</option>'+
        '<option value="Sin solucion">Sin solución</option>'+
        '<option value="Necesita refaccion">Necesita refacción</option>'+
        '</select>' +

        '<label>Estado en que llega</label>' +
 '<input input type="text" name="swal-input5" id="swal-input5" placeholder="Eje. Humedad, suciedad, tierra, etc" class="form-control border-input" maxlength="80" required>' +

 '<label>Imagen 1</label>' +
 '<input input type="file" name="swal-input6" id="swal-input6"  required accept="image/png/jpg" class="form-control border-input" required></br>'+

 '<label>Imagen 2</label>' +
 '<input input type="file" name="swal-input7" id="swal-input7"   accept="image/png/jpg" class="form-control border-input" ></br>'+

 '<label>Imagen 3</label>' +
 '<input input type="file" name="swal-input8" id="swal-input8"   accept="image/png/jpg" class="form-control border-input" ></br>'+


'<div class="col-md-12 entradas" style="display:none;">'+
'<label># de pieza que necesita</label>'+
'<input type="text" name="swal-input4" value="NA" id="swal-input4" class="form-control border-input"  ><br></br>'+
'</div>'+
'</div>'+
'</div>'+


   '<Button type="submit" class= "btn btn-info btn-fill btn-wd">Confirmar</Button>'+
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
  $("#swal-input3").change(function(){
    if(this.value == 'Necesita refaccion'){
      $(".entradas").show();
    }else{
      $(".entradas").hide();
    }
  })

  };
  </script>

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
<?php } ?>
