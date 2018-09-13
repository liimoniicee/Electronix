<!DOCTYPE html>
<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];



$solicitud_taller = "SELECT *
FROM reparar_tv
WHERE estado='Necesita refaccion'";


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


  </head>
  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="tecnico.php">ID de Usuario: <?php echo $var_name ?></a>
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
          <p class="app-sidebar__user-name"><?php echo $var_name ?></p>

        </div>
      </div>
      <ul class="app-menu">
      <li><a class="app-menu__item" href="tecnico.php"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Tareas</span></a></li>


    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i>Mercado libre</h1>
          <p>Dar un buen servicio es nuestra prioridad</p>
        </div>

      </div>

<div class="card text-black bg-primary mb-3">
  <div class="card-body">


          <div class="col-lg-12">
            <p class="bs-component">
              <button class="btn btn-info" type="button" id='watch-me'>Nuevas</button>
              <button class="btn btn-success" type="button" onclick="location='recepcion_e_reparados.php'">Pendientes</button>
              <button class="btn btn-danger" type="button" onclick="location='recepcion_e_sin_repar.php'">Publicadas</button>
              <button class="btn btn-info" type="button" onclick="alerta();">Vendidas</button>
              <button class="btn btn-success" type="button" onclick="location='recepcion_e_reparados.php'">Ver todas</button>
              <button class="btn btn-danger" type="button" id='see-me'>Solicitudes de taller</button>
              <button class="btn btn-danger" type="button" onclick="location='recepcion_e_sin_repar.php'">Ventas</button>
  </p>
</div>
</div>
        </div>

        <div id='show-me'>

        </div>

        </div>


      <!-- comienza tabla 2 -->
        <div id='show-me-two' style='display:none; border:2px solid #ccc'>


      <table id="a-tables" class="table table-dark table-hover table-responsive">
      <thead>
      <th data-field="id">id_equipo</th>
      <th data-field="folio" data-sortable="true">Folio</th>
      <th data-field="equipo" data-sortable="true">equipo</th>
      <th data-field="falla" data-sortable="true">falla</th>
      <th data-field="fecha_ingreso" data-sortable="true">fecha_ingreso</th>
      <th data-field="fecha_entregar" data-sortable="true">fecha_entregar</th>
      <th data-field="ubicacion" data-sortable="true">ubicacion</th>.
      <th data-field="accion" data-sortable="true">Acción</th>
      </thead>
      <?php
      $ejec2 = mysqli_query($conn, $solicitud_taller);
      while($fila=mysqli_fetch_array($ejec2)){
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
              <td><?php echo $id ?></td>
              <td><?php echo $equipo ?></td>
              <td><?php echo $falla ?></td>
              <td><?php echo $fecha_ingreso ?></td>
              <td><?php echo $fecha_entregar ?></td>
              <td><?php echo $ubicacion ?></a></td>
              <td>
              <button onclick="solicitud_pieza(<?php echo $id_equipo?>), mod_solicitud_pieza(<?php echo $id_equipo?>);" title="Asignar tecnico" class="btn btn-simple btn-success btn-icon edit"><i ></i></button>
              </td>



      </tr>
      <?php } ?>
      <tbody></br>
      Equipos pendientes
      </tbody>
      </table>
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
    });
</script>

<script>

//Script para mandar ID para generar la orden
function mod_solicitud_pieza(id_equipo){
$.ajax({

    // la URL para la petición
    url : 'ml_fn_solicitud_pieza.php',
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
      $("#swal-input1").val(data.data.marc);
      $("#swal-input2").val(data.data.mod);
      $("#swal-input3").val(data.data.par);


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
//ventana de nuevo cliente
    function solicitud_pieza(id_equipo){

var id = id_equipo;
    swal({
   title: 'Solicitud pieza',
   html:
'<div class="card-body"> <form action="ml_solicitud_pieza.php" method="post" name="data" enctype="multipart/form-data">'+

'<div class="col-md-12">'+
'<div class="form-group">'+
  '<label># equipo</label>'+
'<input type="text" name="swal-input0"  id="swal-input0" value="'+id+'"  class="form-control border-input" readonly >' +//Id Equipo

        '<label>Marca</label>'+
        '<input type="text" name="swal-input1" readonly id="swal-input1" required class="form-control border-input"></input>'+

        '<label>Modelo</label>'+
        '<input type="text" name="swal-input2" readonly id="swal-input2" required class="form-control border-input"></input>'+

        '<label>Modelo</label>'+
        '<input type="text" name="swal-input3" readonly id="swal-input3" required class="form-control border-input"></input>'+

        '<label>Ubicación</label>'+
        '<select class="form-control form-control-sm" required textalign="center" name="swal-input4" id="swal-input4"><option value="" ></option><option value="inventario" >inventario</option><option value="mercado">Mercado Libre</option><option value="no encontrada">No encontrada</option></select>' +

'<div class="col-md-12 entradas" style="display:none;">'+
'<label>Costo de refacción</label>'+
'<input type="number" name="swal-input5" value="NA" id="swal-input5" class="form-control border-input"  ><br></br>'+
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
  $("#swal-input4").change(function(){
    if(this.value != 'no encontrada'){
      $(".entradas").show();
    }else{
      $(".entradas").hide();
    }
  })

  };
  </script>

  </body>
</html>