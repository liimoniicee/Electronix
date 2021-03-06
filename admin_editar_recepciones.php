<?php
include'check_sesion.php';
include'fuctions.php';
include'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];
$var_tipo = $_SESSION['tipo'];

if($var_tipo != "Administrador") {
 //echo "<script>alert('No tienes acceso a esta página!')</script>";
   echo "<script>window.open('Error_restrinccion.html','_self')</script>";
 }
$recepciones = "SELECT *
FROM recepciones";


$marcas = "SELECT * from marcas;";

$traslado_p = "SELECT id_personal, nombre ,tipo from personal  where tipo ='Traslado' ";


$avisos = "SELECT
*
FROM avisos where tipo= 'Administrador' and estado='pendiente'order by fecha desc;";

$num_avisos = "SELECT COUNT(*) FROM avisos where tipo= 'Administrador' and estado='pendiente' order by fecha desc;";


?>
<!DOCTYPE html>
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
    <header class="app-header"><a class="app-header__logo" onclick="faqs();">ID de Usuario: <?php echo $var_clave ?></a>
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
      <li><a class="app-menu__item" href="recepcion.php"><i class="app-menu__icon ti-headphone-alt"></i><span class="app-menu__label">Recepción</span></a></li>
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
            <h3><i class="fa fa-dashboard"></i>Administrador - Control de Recepciones</h3>
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
                        <input name='test' type='radio' checked /> Recepciones registradas
                        </label>

                        <label class="btn btn-warning" onclick="recepcion();">
                        <input name='test' type='radio' /> Nueva recepcion
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

                      <th width="8%">Id Recepcion</th>
                    <th width="7%">Colonia</th>
                    <th width="8%">Calles</th>
                    <th width="7%">Código postal</th>
                    <th width="7%">Ciudad</th>
                    <th width="7%">Estado</th>
                    <th width="7%">Situación</th>
                    <th width="7%">Acción</th>

                   

                    </thead>
                    <?php
                    $ejec1 = mysqli_query($conn, $recepciones);
                    while($fila=mysqli_fetch_array($ejec1)){
                      $id      = $fila['id_recepcion'];
                      $col           = $fila['colonia'];
                      $cal            = $fila['calles'];
                      $cp          = $fila['cp'];
                      $ciu           = $fila['ciudad'];
                      $estado       = $fila['estado'];
                      $sit       = $fila['situacion'];


                  
        ?>
        <tr>
        <td><?php echo $id ?></td>
        <td><?php echo $col ?></td>
        <td><?php echo $cal ?></td>
        <td><?php echo $cp ?></td>
        <td><?php echo $ciu ?></td>
        <td><?php echo $estado ?></td>
        <td><?php echo $sit ?></td>

                <td>
                <button onclick='modificar_recepcion(<?php echo "$id" ; ?>), enviarecepcion(<?php echo "$id" ; ?>);' title='Actualizar' class='btn btn-simple btn-warning btn-icon edit'><i class='ti-pencil-alt'></i></button>

                <?php

                if($estado == "Activo"){
                echo "
                <button onclick='asignar($id), enviarvehiculo($id);' title='Asignar personal de traslado' class='btn btn-simple btn-primary btn-icon edit'><i class='ti-user'></i></button>
                ";
                   }else{  echo "
                                                             ";
                        }               
              ?>
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


<script>
//Script para mandar ID para generar la orden
function enviarecepcion(id){
 $.ajax({
     // la URL para la petición
     url : 'admin_fn_editar_modificar_recepciones.php',
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
       $("#").val(data.data.id);
       $("#col").val(data.data.col);
       $("#cal").val(data.data.cal);
       $("#cp").val(data.data.cp);
       $("#ciu").val(data.data.ciu);
       $("#estado").val(data.data.estado);
       $("#sit").val(data.data.sit);

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
    function modificar_recepcion(id){
    swal({
   title: 'Actualizar recepcion',
   html:
   '<form action="admin_fn_editar_modificar_recepcion.php" method="post" name="data">'+
   //'<label for="exampleInputEmail1">id</label>' +
   '<input name="swal-input0" type="text" id="swal-input0" required value="'+id+'"class="form-control border-input" readonly>' +

  '<label>Colonia</label>' +
   '<input type="text" name="col" id="col" required class="form-control border-input">'+

   '<label>Calles</label>' +
   '<input type="text" name="cal" id="cal" required class="form-control border-input">'+

   '<label>Código postal</label>' +
   '<input type="number" name="cp" id="cp" maxlength="5"  title="Sólo números" required class="form-control border-input">'+

   '<label>Ciudad</label>' +
   '<input type="text" name="ciu" id="ciu" required class="form-control border-input">'+

   '<label>Estado</label>' +
   '<input type="text" name="estado" id="estado" title="Sólo números" required class="form-control border-input">'+

 '<label>Situación</label>' +
 '<select class="form-control form-control-sm" required textalign="center" name="sit" id="sit"><option value="" ></option><option value="Activo" >Activo</option><option value="Inactivo">Inactivo</option><option value="En proceso">En proceso</option></select>' +
 '<br>'+

   '</div>'+
   '</div>'+
   '<Button type="submit" class= "btn btn-info btn-fill btn-wd">Actualizar recepción</Button>'+
   '</form>',
   showCancelButton: true,
   confirmButtonColor: '#3085d6',
   cancelButtonColor: '#d33',
   confirmButtonText: '</form> A por él',
   cancelButtonClass: 'btn btn-danger btn-fill btn-wd',
   showConfirmButton: false,
   focusConfirm: false,
   buttonsStyling: false,
    reverseButtons: true, allowOutsideClick: false,
    allowOutsideClick: false

  })
  };
  </script>

<script type="text/javascript">
//Nuevo Aviso
    function recepcion(){


    swal({
   title: 'Nueva recepcion',
   html:
   '<div class="col-lg-12"> <form action="admin_fn_editar_recepcion.php" method="post" name="data">'+

   '<label>Colonia</label>' +
   '<input type="text" name="col" id="col" required class="form-control border-input">'+



   '<label>Calles</label>' +
   '<input type="text" name="cal" id="cal" required class="form-control border-input">'+

   '<label>Código postal</label>' +
   '<input type="number" name="cp" id="cp" maxlength="5"  title="Sólo números" required class="form-control border-input">'+

   '<label>Ciudad</label>' +
   '<input type="text" name="ciu" id="ciu" title="Sólo números" required class="form-control border-input">'+

   '<label>Estado</label>' +
   '<input type="text" name="estado" id="estado" title="Sólo números" required class="form-control border-input">'+

 '<label>Situación</label>' +
 '<select class="form-control form-control-sm" required textalign="center" name="sit" id="sit"><option value="" ></option><option value="Activo" >Activo</option><option value="Inactivo">Inactivo</option><option value="En proceso">En proceso</option></select>' +

   
'<br>'+

   '<Button type="submit" class= "btn btn-info btn-fill btn-wd">Registrar nueva recepción</Button>'+
   '</form></div>',
   showCancelButton: true,
   confirmButtonColor: '#3085d6',
   cancelButtonColor: '#d33',
   confirmButtonText: '</form> Registrar aviso',
   cancelButtonClass: 'btn btn-danger btn-fill btn-wd',
   showConfirmButton: false,
   focusConfirm: false,
   buttonsStyling: false,
    reverseButtons: true, allowOutsideClick: false,
    allowOutsideClick: false

  })
  };
  </script>

<script type="text/javascript">

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
