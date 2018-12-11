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
 if($var_tipo != "Tecnico") {
  //echo "<script>alert('No tienes acceso a esta página!')</script>";
    echo "<script>window.open('Error_restrinccion.html','_self')</script>";
  }
 $pendientes = "SELECT id_equipo,equipo, marca,modelo, falla, comentarios
 FROM reparar_tv
 WHERE estado='En reparacion' and id_personal='$var_clave';";

 $historial = "SELECT id_equipo,equipo, marca,modelo, falla, estado, comentarios
 FROM reparar_tv
 WHERE estado='Reparada' and id_personal='$var_clave';";


 $avisos = "SELECT *  FROM avisos where tipo='Tecnico' and estado='Pendiente' and id_personal='$var_clave'";

 $num_avisos = "SELECT COUNT(*) FROM avisos where tipo='Tecnico' AND estado='Pendiente' AND id_personal='$var_clave'";

 $refaccion = "SELECT *
 FROM reparar_tv
 WHERE estado in('necesita refaccion', 'autorizacion taller')";

?>
<html lang="es">
<head>

  <!-- Open Graph Meta-->
  <title>Tecnico</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <meta http-equiv="refresh" content="300" >
  <link rel="stylesheet" type="text/css" href="assets/css/main.css">
  <!-- Font-icon css-->
<link href= "assets/css/themify-icons.css" rel="stylesheet">
<link rel="shortcut icon" href="assets/img/favicon.ico">
</head>pp sidebar-mini rtl">


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
        <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Show notifications"><i class="ti-bell"></i> <?php echo $num_avi ?></a>

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

      <ul class="app-menu">
      <li><a class="app-menu__item" href="#"><i class="app-menu__icon ti-user"></i><span class="app-menu__label"><?php echo $var_name ?></span></a></li>
      <li><a class="app-menu__item" href="Tecnico.php"><i class="app-menu__icon ti-star"></i><span class="app-menu__label">Tareas</span></a></li>
    </ul>



    </aside>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h3><i class="fa fa-dashboard"></i>Tecnico</h3>
          <p>Dar un buen servicio es nuestra prioridad</p>
        </div>
      </div>


      <div class="card text-black bg-primary mb-3">
              <div class="card-body">
           <div class="col-sm-12" align="center">
             <div class="btn-group btn-group-toggle" data-toggle="buttons">
                  <form id='form-id'>

                    <label class="btn btn-success active" id='watch-me'>
                      <input name='test' type='radio' checked /> Pendientes
                      </label>

                      <label class="btn btn-success" id='see-me'>
                      <input name='test' type='radio' /> Pendientes pieza
                    </label>

                      <label class="btn btn-success" id='look-me'>
                      <input name='test' type='radio' /> Estadisticas
                    </label>


                  </form>
                </div>
                  <br><br>
                  <!-- tabla 1 -->
                  <div id="show-me">
                      <div class="tile">
                        <div class="tile-body">
                            <table id="a-tables" class="table table-hover table-dark table-responsive">
                      <thead>

                          <th width="10%" data-field="id">ID Equipo</th>
                        <th width="14%" data-field="id_equipo" data-sortable="true">equipo</th>
                        <th width="14%" data-field="marca" data-sortable="true">marca</th>
                        <th width="14%" data-field="modelo" data-sortable="true">modelo</th>
                        <th width="14%" data-field="modelo" data-sortable="true">falla</th>
                        <th width="14%" class="disabled-sorting">Comentarios extras</th>
                        <th width="10%" class="disabled-sorting">Acción</th>

                      </thead>
                      <?php
                        $ejecutar2 = mysqli_query($conn, $pendientes);
                      while($fila=mysqli_fetch_array($ejecutar2)){
                        $id_equipo          = $fila['id_equipo'];
                        $equipo           = $fila['equipo'];
                        $marca           = $fila['marca'];
                        $modelo          = $fila['modelo'];
                        $falla          = $fila['falla'];
                        $comentarios          = $fila['comentarios'];


                  ?>
                                      <tr>
                                          <td ><?php echo $id_equipo ?></td>
                                          <td ><?php echo $equipo ?></td>
                                          <td ><?php echo $marca ?></td>
                                          <td ><?php echo $modelo ?></td>
                                          <td ><?php echo $falla ?></td>
                                          <td ><?php echo $comentarios ?></td>


                                          <td>
                                          <button onclick="reporte(<?php echo $id_equipo?>);" class="btn btn-simple btn-success btn-icon edit" title="Crear reporte"><i class="btn-sm btn-secondary ti-agenda"></i></button>


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


                  <!-- tabla 2-- >

<!-- comienza tabla 2 -->
<div id='show-me-two' style='display:none; border:2px solid #ccc'>
  <div class="tile">
    <div class="tile-body">

<table id="tabla2" class="table table-dark table-hover table-responsive">
<thead>
<!--<th data-field="state" data-checkbox="true"></th>-->
<th width="8%" data-field="id">id_equipo</th>
<th width="14%" data-field="equipo" data-sortable="true">equipo</th>
<th width="14%" data-field="falla" data-sortable="true">falla</th>
<th width="14%" data-field="fecha_ingreso" data-sortable="true">fecha_ingreso</th>
<th width="14%" data-field="fecha_entregar" data-sortable="true">fecha_entregar</th>
<th width="14%" data-field="Estado" data-sortable="true">Estado</th>
<th width="14%" data-field="ubicacion" data-sortable="true">ubicacion</th>


</thead>
<?php
$ejec8 = mysqli_query($conn, $refaccion);
while($fila=mysqli_fetch_array($ejec8)){
$id_equipo          = $fila['id_equipo'];
$id           = $fila['id_folio'];
$equipo           = $fila['equipo'];
$falla          = $fila['falla'];
$fecha_ingreso        = $fila['fecha_ingreso'];
$fecha_entregar        = $fila['fecha_entregar'];
$estado        = $fila['estado'];
$ubicacion        = $fila['ubicacion'];


?>
<tr>
    <td><?php echo $id_equipo ?></td>
    <td><?php echo $equipo ?></td>
    <td><?php echo $falla ?></td>
    <td><?php echo $fecha_ingreso ?></td>
    <td><?php echo $fecha_entregar ?></td>
    <td><?php echo $estado ?></td>
    <td><?php echo $ubicacion ?></a></td>


</tr>
<?php } ?>

<tbody></br>
Equipos que necesitan refaccion
</tbody>
</table>

</div>
</div>
</div>

                    <!--Termina tabla 2-->

                    <!--Comienza tabla 3-->
                    <div id="show-me-three" style='display:none; border:2px solid #ccc'>
                        <div class="tile">
                          <div class="tile-body">
                              <table id="tabla3" class="table table-hover table-dark table-responsive">
                        <thead>

                            <th width="10%" data-field="id">ID Equipo</th>
                          <th width="10%" data-field="equipo" data-sortable="true">equipo</th>
                          <th width="14%" data-field="marca" data-sortable="true">marca</th>
                          <th width="14%" data-field="modelo" data-sortable="true">modelo</th>
                          <th width="14%" data-field="falla" data-sortable="true">falla</th>
                          <th width="14%" data-field="falla" data-sortable="true">estado</th>
                          <th width="18%" class="disabled-sorting">Comentarios extras</th>


                        </thead>
                        <?php
                          $ejecutar3 = mysqli_query($conn, $historial);
                        while($fila=mysqli_fetch_array($ejecutar3)){
                          $id_equipo          = $fila['id_equipo'];
                          $equipo           = $fila['equipo'];
                          $marca           = $fila['marca'];
                          $modelo          = $fila['modelo'];
                          $falla          = $fila['falla'];
                          $estado          = $fila['estado'];
                          $comentarios          = $fila['comentarios'];


                    ?>
                                        <tr>
                                            <td ><?php echo $id_equipo ?></td>
                                            <td ><?php echo $equipo ?></td>
                                            <td ><?php echo $marca ?></td>
                                            <td ><?php echo $modelo ?></td>
                                            <td ><?php echo $falla ?></td>
                                            <td ><?php echo $estado ?></td>
                                            <td ><?php echo $comentarios ?></td>


                              </tr>
                            <?php } ?>
                            <tbody></br>
                                Resultado de clientes
                          </tbody>
                      </table>
                    </div>
                    </div>
                    </div>
                    <!-- Termina tabla 3 -->

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
                    <td>

                      </td>
      </tr>
      <?php } ?>
          </tbody>

              </table>
                  </div>
                  <!-- termina tabla 4 entregados -->

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

<!-- script tabla con buscador -->
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

<!--script paneles ocultos -->
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



</body>
</html>


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
'<label>Tipo de refaccion</label>'+
'<input input type="text" name="tipo"  value="NA" id="tipo" placeholder="Tarjeta main, Tcon" title="Sólo letras y números" class="form-control border-input"  ></br>'+
'<label>Etiquetas de la tarjeta</label>'+
'<input type="text" name="swal-input4" value="NA" id="swal-input4" placeholder="EAX64582814,BN94-9865A" title="Sólo letras y números" class="form-control border-input"  ></br>'+
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

  <script type="text/javascript">
//Nuevo Aviso
    function faqs(){


   swal(
  'Sistema integral reparacion de televisiones (SIRTV) 0.5',
  'Creado por Francisco Israel Martínez Ayala',
  'success'
)
};
  </script>
