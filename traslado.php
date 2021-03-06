<?php
include'check_sesion.php';
include'fuctions.php';
include'conexion.php';
verificar_sesion();


 $ahora = time(); //obtenemos la fecha actual a partir de la función time().
 $formateado= date('Y-m-d', $ahora) ; // obtenemos la cadena en el formato YYYY-MM-DD

//variables
 $var_name=$_SESSION['nombre'];
 $var_clave= $_SESSION['clave'];
 $var_tipo = $_SESSION['tipo'];

 if($var_tipo != "Administrador") {
  //echo "<script>alert('No tienes acceso a esta página!')</script>";
    echo "<script>window.open('Error_restrinccion.html','_self')</script>";
  }
 //consulta para llenar la tabla
 $pendiente = "SELECT
 *
 FROM
 traslado where estado='Pendiente';";

 $entregado = "SELECT
*
FROM
traslado where id_personal='$var_clave' and estado='Entregado';";

$concretar = "SELECT
*
FROM
traslado where id_personal='$var_clave' and estado='Recoleccion';";

$en_ruta = "SELECT
 *
 FROM
 traslado where id_personal='$var_clave' and estado='En ruta';";

 $avisos = "SELECT
 *
 FROM avisos where tipo= 'Traslado' and estado='pendiente' order by fecha desc;";

 $num_avisos = "SELECT COUNT(*) FROM avisos where tipo= 'Traslado' and estado='pendiente' ";


?>



<html lang="es">
  <head>

    <!-- Open Graph Meta-->
    <title>Traslados</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <meta http-equiv="refresh" content="300" >
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <!-- Font-icon css-->
    <!-- Font-icon css-->
<link href= "assets/css/themify-icons.css" rel="stylesheet">
<link rel="shortcut icon" href="assets/img/favicon.ico">
  </head>






  <body class="app sidebar-mini rtl">


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
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="ti-bell"></i><?php echo $num_avi ?></a>
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
      <li><a class="app-menu__item active" href="traslado.php"><i class="app-menu__icon ti-truck"></i><span class="app-menu__label">Traslados</span></a></li>
      <li><a class="app-menu__item" href="almacen.php"><i class="app-menu__icon ti-archive"></i><span class="app-menu__label">Almacen</span></a></li>
      <li><a class="app-menu__item" href="administrador.php"><i class="app-menu__icon ti-star"></i><span class="app-menu__label">Administración</span></a></li>
</ul>

    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h3><i class="fa fa-dashboard"></i>Traslados</h3>
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
                      <input name='test' type='radio' checked /> Traslados
                      </label>

                      <label class="btn btn-success" id='see-me'>
                      <input name='test' type='radio' /> Por concretar
                    </label>

                      <label class="btn btn-success" id='look-me'>
                      <input name='test' type='radio' /> En ruta
                    </label>

                    <label class="btn btn-success" id='look-me2'>
                      <input name='test' type='radio' /> Entregados
                    </label>

                  </form>
                </div>
                  <br><br>
                  <div id='show-me'>

                    <div class="tile">
                      <div class="tile-body">
<!-- pendientes -->
                  <table id="a-tables" class="table table-dark table-responsive">
    																	<thead>
                                    <th data-field="id">id</th>
                                    <th data-field="estado" data-sortable="true">Estado</th>
                                    <th data-field="ubicacion" data-sortable="true">Ubicacion</th>
                                    <th data-field="destino" data-sortable="true">Destino</th>
                                    <th data-field="fecha" data-sortable="true">Fecha solicitud</th>


    																	</thead>
                                      <?php
                                        $ejecutar1 = mysqli_query($conn, $pendiente);
                                      while($fila=mysqli_fetch_array($ejecutar1)){
                                          $id     = $fila['id_traslado'];
                                          $sta     = $fila['estado'];
                                          $ubi      = $fila['ubicacion'];
                                          $dest      = $fila['destino'];
                                          $fech   = $fila['fecha_solicitud'];
                                  ?>
                            <tbody>
                            <tr>
                            <td><?php echo $id ?></td>
                            <td><?php echo $sta ?></td>
                            <td><?php echo $ubi ?></td>
                            <td><?php echo $dest ?></td>
                            <td><?php echo $fech ?></td>
                          </tr>
                  <?php } ?>
    							</tbody>
                  </table>

                  </div>

                  </div>
                  </div>

<!-- comienza tabla 2 -->
          <div id='show-me-two'style='display:none; border:2px solid #ccc'>
          <table id="a-tables" class="table table-dark table-hover table-responsive">



                                              <thead>
        <th data-field="id">id</th>
        <th data-field="estado" data-sortable="true">Estado</th>
       <th data-field="ubicacion" data-sortable="true">Ubicacion</th>
      <th data-field="destino" data-sortable="true">Destino</th>

                                                <th data-field="fecha" data-sortable="true">Fecha solicitud</th>


                                              </thead>
                                              <?php
                                                $ejecutar3 = mysqli_query($conn, $concretar);
                                              while($fila=mysqli_fetch_array($ejecutar3)){
                                                  $id     = $fila['id_traslado'];
                                                  $sta     = $fila['estado'];
                                                  $ubi      = $fila['ubicacion'];
                                                  $dest      = $fila['destino'];
                                                  $fech   = $fila['fecha_solicitud'];
                                          ?>
                                                                <tbody>
                                                              <tr>
                                                                    <td><?php echo $id ?></td>
                                                                    <td><?php echo $sta ?></td>
                                                                    <td><?php echo $ubi ?></td>
                                                                    <td><?php echo $dest ?></td>

      <td><?php echo $fech ?></td>

        </tr>
        <?php } ?>
        </tbody>
  </table>
      </div>

                    <!--Termina tabla 2-->

                    <!--Comienza tabla 3-->
                  <div id='show-me-three' style='display:none; border:2px solid #ccc'>


                    <table id="a-tables" class="table table-dark table-hover table-responsive">

                      <thead>
                    <th data-field="id">id</th>
                    <th data-field="estado" data-sortable="true">Estado</th>
                    <th data-field="ubicacion" data-sortable="true">Ubicacion</th>
                    <th data-field="destino" data-sortable="true">Destino</th>
                    <th data-field="fecha" data-sortable="true">Fecha solicitud</th>

                                                    </thead>
                                                    <?php
                                                      $ejecutar4 = mysqli_query($conn, $en_ruta);
                                                    while($fila=mysqli_fetch_array($ejecutar4)){
                                                        $id     = $fila['id_traslado'];
                                                        $sta     = $fila['estado'];
                                                        $ubi      = $fila['ubicacion'];
                    $dest      = $fila['destino'];
                    $fech   = $fila['fecha_solicitud'];
                    ?>
                    <tbody>
                    <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $sta ?></td>
                    <td><?php echo $ubi ?></td>
                    <td><?php echo $dest ?></td>
                    <td><?php echo $fech ?></td>

                    </tr>
                    <?php } ?>
                    </tbody>
                    </table>


                    </div>
                    <!-- Termina tabla 4 -->

                <div id='show-me-three2'style='display:none; border:2px solid #ccc'>
    <table id="a-tables" class="table table-dark table-hover table-responsive">
                <thead>

                <th data-field="id">id</th>
                <th data-field="estado" data-sortable="true">Estado</th>
                <th data-field="ubicacion" data-sortable="true">Ubicacion</th>
                <th data-field="destino" data-sortable="true">Destino</th>

                <th data-field="fecha" data-sortable="true">Fecha finalizado</th>


                </thead>
                <?php
                $ejecutar2 = mysqli_query($conn, $entregado);
                while($fila=mysqli_fetch_array($ejecutar2)){
                $id     = $fila['id_traslado'];
                $sta     = $fila['estado'];
                $ubi      = $fila['ubicacion'];
                $dest      = $fila['destino'];
                $fech   = $fila['fecha_finalizado'];
                ?>
                  <tbody>
                    <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $sta ?></td>
                    <td><?php echo $ubi ?></td>
                    <td><?php echo $dest ?></td>
                    <td><?php echo $fech ?></td>

      </tr>
      <?php } ?>
          </tbody>

              </table>
                  </div>
                  <!-- termina tabla 4 entregados -->

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

   });

  </script>

  <!-- por concretar-->
  <script>
  function enviarmod(id){
    $.ajax({
        // la URL para la petición
        url : 'Traslados/mod.php',
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
          $("#swal-input1").val(data.data.sta);
          $("#swal-input2").val(data.data.dir);
          $("#swal-input3").val(data.data.com);
          $("#swal-input4").val(data.data.ubi);
          $("#swal-input5").val(data.data.des);
          $("#swal-input6").val(data.data.fech);
          $("#swal-input7").val(data.data.equ);
          $("#swal-input8").val(data.data.car);
          $("#swal-input9").val(data.data.per);
          $("#swal-input10").val(data.data.fol);
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
<!-- por concretar -->

<script type="text/javascript">

function swal_por_concretar(id){


swal({
title: 'Editar solicitud',
html:

'<form action="Traslados/actual_concre" method="post" name="data">'+
//'<label for="exampleInputEmail1">id</label>' +
'<input name="swal-input0" type="hidden" id="swal-input0" class="form-control border-input" readonly>' +
'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Estado</label>'+
        '<input type="text" id="swal-input1" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Direccion</label>'+
        '<input type="text" id="swal-input2" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Comentarios</label>'+
        '<input type="text" name="swal-input3" id="swal-input3" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Ubicación</label>'+
        '<input type="text" name="swal-input4" id="swal-input4" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+
'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Destino</label>'+
        '<input type="text" name="swal-input5" id="swal-input5" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Fecha de solicitud</label>'+
        '<input type="text" name="swal-input6" id="swal-input6" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>equipo</label>'+
        '<input type="text" name="swal-input7" id="swal-input7" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label># carro</label>'+
        '<input type="number" name="swal-input8" id="swal-input8" class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Personal</label>'+
        '<input type="text" name="swal-input9" id="swal-input9" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+

'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Folio</label>'+
        '<input type="text" name="swal-input10" id="swal-input10" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+


'<Button type="submit" class= "btn btn-info btn-fill btn-wd">Confirmar en ruta</Button>'+
'</form>',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: '</form> Confirmar en ruta',
cancelButtonClass: 'btn btn-danger btn-fill btn-wd',
showConfirmButton: false,
focusConfirm: false,
buttonsStyling: false,
reverseButtons: true, allowOutsideClick: false
}).then(function (result) {

swal(
'Actualizado!',
'La solicitud ha sido actualizada',
'success'
)
}).catch(swal.noop);

};
</script>

  <!-- traslados-->

  <script type="text/javascript">

    function swal_traslados(id){


    swal({
   title: 'Editar solicitud',
   html:

   '<form action="Traslados/actual_status" method="post" name="data">'+
   //'<label for="exampleInputEmail1">id</label>' +
   '<input name="swal-input0" type="hidden" id="swal-input0" class="form-control border-input" readonly>' +
   '<div class="row">'+
   '<div class="col-md-6">'+
     '<div class="form-group">'+
           '<label>Estado</label>'+
           '<input type="text" id="swal-input1" readonly class="form-control border-input">'+
       '</div>'+
   '</div>'+

   '<div class="col-md-6">'+
     '<div class="form-group">'+
           '<label>Direccion</label>'+
           '<input type="text" id="swal-input2" readonly class="form-control border-input">'+
       '</div>'+
   '</div>'+
   '</div>'+

   '<div class="row">'+
   '<div class="col-md-6">'+
     '<div class="form-group">'+
           '<label>Comentarios</label>'+
           '<input type="text" name="swal-input3" id="swal-input3" readonly class="form-control border-input">'+
       '</div>'+
   '</div>'+

   '<div class="col-md-6">'+
     '<div class="form-group">'+
           '<label>Ubicación</label>'+
           '<input type="text" name="swal-input4" id="swal-input4" readonly class="form-control border-input">'+
       '</div>'+
   '</div>'+
   '</div>'+
   '<div class="row">'+
   '<div class="col-md-6">'+
     '<div class="form-group">'+
           '<label>Destino</label>'+
           '<input type="text" name="swal-input5" id="swal-input5" readonly class="form-control border-input">'+
       '</div>'+
   '</div>'+

   '<div class="col-md-6">'+
     '<div class="form-group">'+
           '<label>Fecha de solicitud</label>'+
           '<input type="text" name="swal-input6" id="swal-input6" readonly class="form-control border-input">'+
       '</div>'+
   '</div>'+
   '</div>'+

   '<div class="row">'+
   '<div class="col-md-6">'+
     '<div class="form-group">'+
           '<label>equipo</label>'+
           '<input type="text" name="swal-input7" id="swal-input7" readonly class="form-control border-input">'+
       '</div>'+
   '</div>'+

   '<div class="col-md-6">'+
     '<div class="form-group">'+
           '<label># carro</label>'+
           '<input type="number" name="swal-input8" id="swal-input8" class="form-control border-input">'+
       '</div>'+
   '</div>'+
   '</div>'+

   '<div class="row">'+
   '<div class="col-md-6">'+
     '<div class="form-group">'+
           '<label>Personal</label>'+
           '<input type="text" name="swal-input9" id="swal-input9" readonly class="form-control border-input">'+
       '</div>'+
   '</div>'+

   '<div class="col-md-6">'+
     '<div class="form-group">'+
           '<label>Folio</label>'+
           '<input type="text" name="swal-input10" id="swal-input10" readonly class="form-control border-input">'+
       '</div>'+
   '</div>'+
   '</div>'+

   '<Button type="submit" class= "btn btn-info btn-fill btn-wd">A por él!</Button>'+
   '</form>',
   showCancelButton: true,
   confirmButtonColor: '#3085d6',
   cancelButtonColor: '#d33',
   confirmButtonText: '</form> A por él',
   cancelButtonClass: 'btn btn-danger btn-fill btn-wd',
   showConfirmButton: false,
   focusConfirm: false,
   buttonsStyling: false,
    reverseButtons: true, allowOutsideClick: false
  }).then(function (result) {

   swal(
   'Actualizado!',
   'La solicitud ha sido actualizada',
   'success'
   )
   }).catch(swal.noop);

  };
  </script>
<!-- swal en traslados -->


<!-- swal de en ruta -->

<script type="text/javascript">

  function swal_enruta(id){


  swal({
 title: 'En ruta',
 html:
 '<form action="Traslados/actual_entrega" method="post" name="data">'+
 '<input name="swal-input0" type="hidden" id="swal-input0" class="form-control border-input" readonly>' +
 '<div class="row">'+
 '<div class="col-md-6">'+
   '<div class="form-group">'+
         '<label>Estado</label>'+
         '<input type="text" id="swal-input1" readonly class="form-control border-input">'+
     '</div>'+
 '</div>'+

 '<div class="col-md-6">'+
   '<div class="form-group">'+
         '<label>Direccion</label>'+
         '<input type="text" id="swal-input2" readonly class="form-control border-input">'+
     '</div>'+
 '</div>'+
 '</div>'+

 '<div class="row">'+
 '<div class="col-md-6">'+
   '<div class="form-group">'+
         '<label>Comentarios</label>'+
         '<input type="text" name="swal-input3" id="swal-input3" readonly class="form-control border-input">'+
     '</div>'+
 '</div>'+

 '<div class="col-md-6">'+
   '<div class="form-group">'+
         '<label>Ubicación</label>'+
         '<input type="text" name="swal-input4" id="swal-input4" readonly class="form-control border-input">'+
     '</div>'+
 '</div>'+
 '</div>'+
 '<div class="row">'+
 '<div class="col-md-6">'+
   '<div class="form-group">'+
         '<label>Destino</label>'+
         '<input type="text" name="swal-input5" id="swal-input5" readonly class="form-control border-input">'+
     '</div>'+
 '</div>'+

 '<div class="col-md-6">'+
   '<div class="form-group">'+
         '<label>Fecha de solicitud</label>'+
         '<input type="text" name="swal-input6" id="swal-input6" readonly class="form-control border-input">'+
     '</div>'+
 '</div>'+
 '</div>'+

 '<div class="row">'+
 '<div class="col-md-6">'+
   '<div class="form-group">'+
         '<label>equipo</label>'+
         '<input type="text" name="swal-input7" id="swal-input7" readonly class="form-control border-input">'+
     '</div>'+
 '</div>'+

 '<div class="col-md-6">'+
   '<div class="form-group">'+
         '<label># carro</label>'+
         '<input type="number" name="swal-input8" id="swal-input8" class="form-control border-input">'+
     '</div>'+
 '</div>'+
 '</div>'+

 '<div class="row">'+
 '<div class="col-md-6">'+
   '<div class="form-group">'+
         '<label>Personal</label>'+
         '<input type="text" name="swal-input9" id="swal-input9" readonly class="form-control border-input">'+
     '</div>'+
 '</div>'+

 '<div class="col-md-6">'+
   '<div class="form-group">'+
         '<label>Folio</label>'+
         '<input type="text" name="swal-input10" id="swal-input10" readonly class="form-control border-input">'+
     '</div>'+
 '</div>'+
 '</div>'+
  '<Button type="submit" class= "btn btn-info btn-fill btn-wd">Entregado</Button><br></br>'+

  '</form>',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: '</form>',
  cancelButtonClass: 'btn btn-danger btn-fill btn-wd',
  showConfirmButton: false,
  focusConfirm: false,
  buttonsStyling: false,
   reverseButtons: true, allowOutsideClick: false
 }).then(function (result) {

  swal(
  'Actualizado!',
  'La solicitud ha sido actualizada',
  'success'
  )
  }).catch(swal.noop);

 };
 </script>
<!-- en ruta -->
 <script>
 function borrar_enruta(id){
 swal({
    title: 'Cliente no encontrado?',
    text: "Al confirmar se enviará a almacen",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, de regreso a almacen',
    showLoaderOnConfirm: true,
    preConfirm: function() {
      return new Promise(function(resolve) {

        $.ajax({
         url: 'Traslados/actual_noencontro.php',
         type: 'POST',
         data: 'delete='+id,
         dataType: 'json'
      })
      .done(function(response){
         swal('Echo', response.message, response.status);
       location.reload();
      })
      .fail(function(){
         swal('Oops...', 'Algo paso, contacta al admin!', 'error');
      });
      });
    },
    allowOutsideClick: false
 });
 }
 </script>
 <!-- swal en ruta -->

<!-- entregados -->


<!-- entregados -->
<script type="text/javascript">

  function swal_entregados(id){


  swal({
 title: 'Editar solicitud',
 html:

 '<form action="Traslados/actual_status" method="post" name="data">'+
 //'<label for="exampleInputEmail1">id</label>' +
 '<input name="swal-input0" type="hidden" id="swal-input0" class="form-control border-input" readonly>' +
 '<div class="row">'+
 '<div class="col-md-6">'+
   '<div class="form-group">'+
         '<label>Estado</label>'+
         '<input type="text" id="swal-input1" readonly class="form-control border-input">'+
     '</div>'+
 '</div>'+

 '<div class="col-md-6">'+
   '<div class="form-group">'+
         '<label>Direccion</label>'+
         '<input type="text" id="swal-input2" readonly class="form-control border-input">'+
     '</div>'+
 '</div>'+
 '</div>'+

 '<div class="row">'+
 '<div class="col-md-6">'+
   '<div class="form-group">'+
         '<label>Comentarios</label>'+
         '<input type="text" name="swal-input3" id="swal-input3" readonly class="form-control border-input">'+
     '</div>'+
 '</div>'+

 '<div class="col-md-6">'+
   '<div class="form-group">'+
         '<label>Ubicación</label>'+
         '<input type="text" name="swal-input4" id="swal-input4" readonly class="form-control border-input">'+
     '</div>'+
 '</div>'+
 '</div>'+
 '<div class="row">'+
 '<div class="col-md-6">'+
   '<div class="form-group">'+
         '<label>Destino</label>'+
         '<input type="text" name="swal-input5" id="swal-input5" readonly class="form-control border-input">'+
     '</div>'+
 '</div>'+

 '<div class="col-md-6">'+
   '<div class="form-group">'+
         '<label>Fecha de solicitud</label>'+
         '<input type="text" name="swal-input6" id="swal-input6" readonly class="form-control border-input">'+
     '</div>'+
 '</div>'+
 '</div>'+

 '<div class="row">'+
 '<div class="col-md-6">'+
   '<div class="form-group">'+
         '<label>equipo</label>'+
         '<input type="text" name="swal-input7" id="swal-input7" readonly class="form-control border-input">'+
     '</div>'+
 '</div>'+

 '<div class="col-md-6">'+
   '<div class="form-group">'+
         '<label># carro</label>'+
         '<input type="number" name="swal-input8" id="swal-input8" class="form-control border-input">'+
     '</div>'+
 '</div>'+
 '</div>'+

 '<div class="row">'+
 '<div class="col-md-6">'+
   '<div class="form-group">'+
         '<label>Personal</label>'+
         '<input type="text" name="swal-input9" id="swal-input9" readonly class="form-control border-input">'+
     '</div>'+
 '</div>'+

 '<div class="col-md-6">'+
   '<div class="form-group">'+
         '<label>Folio</label>'+
         '<input type="text" name="swal-input10" id="swal-input10" readonly class="form-control border-input">'+
     '</div>'+
 '</div>'+
 '</div>'+

  '<Button type="submit" class= "btn btn-info btn-fill btn-wd">Actualizar</Button>'+
  '</form>',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: '</form> Actualizar',
  cancelButtonClass: 'btn btn-danger btn-fill btn-wd',
  showConfirmButton: false,
  focusConfirm: false,
  buttonsStyling: false,
   reverseButtons: true, allowOutsideClick: false
 }).then(function (result) {

  swal(
  'Actualizado!',
  'La solicitud ha sido actualizada',
  'success'
  )
  }).catch(swal.noop);

 };
 </script>

 <script>
 function borrar_entregados(id){
 swal({
    title: 'Borrar solicitud de traslado?',
    text: "Este proceso no se puede revertir",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, deseo borrar traslado',
    showLoaderOnConfirm: true,
    preConfirm: function() {
      return new Promise(function(resolve) {

        $.ajax({
         url: 'Traslados/borrar_traslado.php',
         type: 'POST',
         data: 'delete='+id,
         dataType: 'json'
      })
      .done(function(response){
         swal('Echo', response.message, response.status);
       location.reload();
      })
      .fail(function(){
         swal('Oops...', 'Algo paso, contacta al admin!', 'error');
      });
      });
    },
    allowOutsideClick: false
 });
 }
 </script>

<!-- entregados -->

  <div class="content-panel">
<div class="col-lg-7">


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
