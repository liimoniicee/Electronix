<?php
include'check_sesion.php';
include'fuctions.php';
include'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];
$var_tipo = $_SESSION['tipo'];

$horahoy = date("H:i:s");

if($var_tipo != "Administrador") {
 //echo "<script>alert('No tienes acceso a esta página!')</script>";
   echo "<script>window.open('Error_restrinccion.html','_self')</script>";
 }


$empleados = "SELECT p.id_personal, p.tipo, p.usuario, p.contrasena, p.nombre, p.apellidos, p.correo, p.celular, p.sueldo, r.colonia
FROM personal p, recepciones r
WHERE p.rec_id_recepcion = r.id_recepcion";

$sucursal ="SELECT * from recepciones where situacion='Activo';";
$comision = "SELECT *
FROM personal
WHERE tipo ='Tecnico';";

$avisos = "SELECT
*
FROM avisos where tipo= 'Administrador' and estado='pendiente'";

$num_avisos = "SELECT COUNT(*) FROM avisos where tipo= 'Traslado' and estado='pendiente'";

?>
<!DOCTYPE html>

<html lang="es">
  <head>
<script src="assets\js\push.js/push.min.js" > </script>

<script src="assets\js\plugins/bootstrap-notify.min.js"></script>

    <!-- Open Graph Meta-->
    <title>Control de empleados</title>
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
          <h1><i class="fa fa-dashboard"></i>Control de empleados</h1>
          <p>Dar un buen servicio es nuestra prioridad</p>
        </div>

      </div>





<div class="card text-black bg-primary mb-3">
  <div class="card-body">

    <div class="btn-group btn-group-toggle" data-toggle="buttons">

      <button class="btn btn-success" onclick="agregar_empleado()">Agregar empleado</button>
         <form id='form-id'>


           <label class="btn btn-info active" id='watch-me'>
             <input name='test' type='radio' checked /> Empleados
             </label>

             <label class="btn btn-info" id='see-me'>
             <input name='test' type='radio' /> Asistencia
           </label>

             <label class="btn btn-info" id='look-me'>
             <input name='test' type='radio' /> Estadisticas
           </label>

           <label class="btn btn-info" id='look-me2'>
             <input name='test' type='radio' /> Nomina
           </label>



         </form>
       </div><br></br>


  <div id="show-me">
    <div class="tile">
      <div class="tile-body text-center">
          <table id="a-tables" class="table table-hover table-dark table-responsive">
    <thead>

        <th>id</th>
      <th>tipo</th>
      <th>usuario</th>
      <th>contrasena</th>
      <th>nombre</th>
      <th>apellidos</th>
      <th>Correo</th>
      <th>Celular</th>
      <th>Sucursal</th>

      <th class="disabled-sorting">Acción</th>

    </thead>
    <?php
      $ejec1 = mysqli_query($conn, $empleados);
    while($fila=mysqli_fetch_array($ejec1)){
        $id          = $fila['id_personal'];
        $tip           = $fila['tipo'];
        $usu          = $fila['usuario'];
        $contra          = $fila['contrasena'];
        $nom        = $fila['nombre'];
        $ape        = $fila['apellidos'];
        $cor        = $fila['correo'];
        $cel        = $fila['celular'];
        $suc        = $fila['colonia'];


?>
                    <tr>
                        <td width="8%"><?php echo $id ?></td>
                        <td width="14%"><?php echo $tip ?></td>
                        <td width="14%"><?php echo $usu ?></td>
                        <td width="14%" class="hidetext"><?php echo $contra ?></td>
                        <td width="14%"><?php echo $nom ?></td>
                        <td width="14%"><?php echo $ape ?></td>
                        <td width="8%"><?php echo $cor ?></td>
                        <td width="8%"><?php echo $cel ?></td>
                        <td width="8%"><?php echo $suc ?></td>
                        <td width="14%">
                        <a href="#" onclick="actual_emp(<?php echo $id ?>), actual_mod(<?php echo $id ?>);" title="Modificar" ><i class="btn-sm btn-warning ti-pencil-alt"></i></a>
                        <a href="#" onclick="borrar_emp(<?php echo $id ?>);" title="Eliminar"><i class="btn-sm btn-danger ti-close"></i></a>
                        </td>
          </tr>
        <?php } ?>
        <tbody></br>
            Empleados
      </tbody>
  </table>
</div>
</div>
</div>
<!-- termina tabla 1-->

<!-- Empieza tabla 2-->
<div id="show-me-two" style='display:none; border:2px solid #ccc'>
  <div class="tile  text-center">
    <div class="row">
    <div class="col-sm-2">
    <select class="form-control form-control-sm" name="fecha_asi" id="fecha_asi">
    <option value="hoy">Hoy</option>
    <option value="mes">Mes</option>
    <option value="todas">Todas</option>
    </select>
  </div>
  <div class="col-sm-2 sel_mes" style="display:none;">
  <select class="form-control form-control-sm" name="tipo" id="selec_mes">
  <option value="1">Enero</option>
  <option value="2">Febrero</option>
  <option value="3">Marzo</option>
  <option value="4">Abril</option>
  <option value="5">Mayo</option>
  <option value="6">Junio</option>
  <option value="7">Julio</option>
  <option value="8">Agosto</option>
  <option value="9">Semptiembre</option>
  <option value="10">Octubre</option>
  <option value="11">Noviembre</option>
  <option value="12">Diciembre</option>
  </select>
</div>
</div>


    <div class="tile-body">
        <table id="tabla2" class="table table-hover table-dark table-responsive">
<?php
          $asistencia = "SELECT p.id_personal, p.nombre, a.fecha, a.hora_entrada, a.hora_salida, a.horas_hoy, a.horas_total
          FROM
          personal p, asistencia a
          where p.id_personal = a.personal_id_personal";
          ?>

  <thead>

      <th>id</th>
    <th>nombre</th>
    <th>fecha</th>
    <th>Hora entrada</th>
    <th>Hora salida</th>
    <th>Horas pendiente hoy</th>
    <th>Horas pendiente en total</th>

  </thead>
  <?php
    $ejec2 = mysqli_query($conn, $asistencia);
  while($fila=mysqli_fetch_array($ejec2)){
      $id          = $fila['id_personal'];
      $nom           = $fila['nombre'];
      $fech          = $fila['fecha'];
      $hora_e          = $fila['hora_entrada'];
      $hora_s          = $fila['hora_salida'];
      $hora_hoy         = $fila['horas_hoy'];
      $hora_tot        = $fila['horas_total'];


?>
                  <tr>
                      <td width="8%"><?php echo $id ?></td>
                      <td width="14%"><?php echo $nom ?></td>
                      <td width="14%"><?php echo $fech ?></td>
                      <td width="14%"><?php echo $hora_e ?></td>
                      <td width="14%"><?php echo $hora_s ?></td>
                      <td width="14%"><?php echo $hora_hoy ?></td>
                      <td width="14%"><?php echo $hora_tot ?></td>

        </tr>
      <?php } ?>
      <tbody></br>
          Asistencia por día
    </tbody>
</table>
</div>
</div>
</div>
<!-- termina tabla 2-->

<!-- empieza tabla 3-->
<div id="show-me-three" style='display:none; border:2px solid #ccc'>
  <div class="tile text-center">
    <div class="tile-body">
        <table id="tabla3" class="table table-hover table-dark table-responsive">
  <thead>

      <th>id</th>
    <th >tipo</th>
    <th >usuario</th>
    <th >nombre</th>
    <th >apellidos</th>
    <th class="disabled-sorting">Acción</th>

  </thead>
  <?php
    $ejec1 = mysqli_query($conn, $comision);
  while($fila=mysqli_fetch_array($ejec1)){
      $id          = $fila['id_personal'];
      $tip           = $fila['tipo'];
      $usu          = $fila['usuario'];
      $nom        = $fila['nombre'];
      $ape        = $fila['apellidos'];

?>
                  <tr>
                      <td width="8%"><?php echo $id ?></td>
                      <td width="8%"><?php echo $tip ?></td>
                      <td width="8%"><?php echo $usu ?></td>
                      <td width="8%"><?php echo $nom ?></td>
                      <td width="8%"><?php echo $ape ?></td>
                      <td width="8%">
                      <a href="#" onclick="bonificacion(<?php echo $id ?>), boni_mod(<?php echo $id ?>);" title="Modificar" ><i class="btn-sm btn-warning ti-pencil-alt"></i></a>
                      <a href="#" onclick="historial_swal(<?php echo $id ?>);" title="Historial" ><i class="btn-sm btn-warning ti-list"></i></a>
                      </td>
        </tr>
      <?php } ?>
      <tbody></br>
    Comisión de empleados
    </tbody>
</table>
</div>
</div>
</div>
<!-- termina tabla 3-->

<!-- empieza tabla 4 -->

<div id="show-me-three2" style='display:none; border:2px solid #ccc'>
  <div class="card-body bg-primary mb-3">

            <div class="tile text-black">
            <table id="tabla4" class="table table-hover table-dark table-responsive">
          <thead>
            <tr class="encabezado">
          <th>id</th>

          <th>nombre</th>
          <th>apellidos</th>
          <th>Correo</th>
          <th>Sueldo</th>
            </tr>
          </thead>
          <?php
          $ejec1 = mysqli_query($conn, $empleados);
          while($fila=mysqli_fetch_array($ejec1)){
          $id          = $fila['id_personal'];
          $nom        = $fila['nombre'];
          $ape        = $fila['apellidos'];
          $cor        = $fila['correo'];
          $suel       = $fila['sueldo'];


          ?>
          <script>
          var valor=<?php echo $suel ?>;
          var total = parseInt(valor)*48;

          </script>
                      <tr>
                          <td width="8%"><?php echo $id ?></td>
                          <td width="14%"><?php echo $nom ?></td>
                          <td width="14%"><?php echo $ape ?></td>
                          <td width="8%"><?php echo $cor ?></td>
                          <td width="8%"><script> document.write(parseInt(total)) </script></td>
            </tr>
            <?php } ?>
            <tr class="total">
              <td>su total:</td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>

            </tr>

          <tbody></br>
              Empleados
          </tbody>
          </table>
        </div>
        <div class="row text-white">

          <div class="col-md-2">
              <div class="form-group">
                  <label >Total Nomina</label>
                  <input type="text" readonly class="form-control border-input" >
              </div>
          </div>
          <div class="col-md-2">
              <div class="form-group">
                  <label >Total de percepciones</label>
                  <input type="text" readonly class="form-control border-input" >
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
    $(document).ready(function() {

 CalcularTotal();

});
function CalcularTotal()
{
var totals = [0, 0, 0, 0, 0];
 var $filas= $("#tabla4 tr:not('.total, .encabezado')");

  $filas.each(function() {
    $(this).find('td').each(function(i) {
      if (i != 0)
        totals[i - 1] += parseInt($(this).html());
    });
  });
  $(".total td").each(function(i) {
    if (i != 0)
      $(this).html(totals[i - 1]);
  });
}
    </script>

    <!-- script para mostrar select despues de seleccionar un valor -->
    <script>
  /*  $(document).ready(function ()
     {
    $("#fecha_asi").change(function(){
      if(this.value == 'mes'){
        $(".sel_mes").show();

      }else{
        $(".sel_mes").hide();
      }if(this.value == 'dia'){

      }
    })
  });*/

    </script>


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
      <script>
      $(document).ready(function() {
          $('#tabla2').DataTable();
          $('#tabla3').DataTable();
          $('#tabla4').DataTable();
      } );
      </script>


  <script type="text/javascript">
//ventana de nuevo cliente
    function agregar_empleado(){

          swal({
         title: 'Agregar empleado',
         html:
         '<div class="card-body"> <form action="admin_agregar_emp.php" method="post" name="data">'+
         '<div class="row">'+
          '<div class="col-md-4">'+
            '<div class="form-group">'+
         '<label>Tipo</label>'+
         '<select class="form-control form-control-sm" textalign="center" required name="tipo" id="tipo"><option value="Administrador" >Administrador</option>'+
         '<option value="Almacen">Almacen</option>'+
         '<option value="Jefe de Taller">Jefe de taller</option>'+
         '<option value="Taller">Taller</option>'+
         '<option value="Tecnico">Tecnico</option>'+
         '<option value="Recepcion">Recepcion</option>'+
         '</select>' +
         '</div>'+
          '</div>'+

          '<div class="col-md-4">'+
            '<div class="form-group">'+
         '<label>Usuario</label>' +
         '<input input type="text" name="usu" id="usu" class="form-control border-input maxlength="25" required>' +
         '</div>'+
         '</div>'+

            '<div class="col-md-4">'+
            '<div class="form-group">'+



         '<label>Contraseña</label>' +
         '<input input type="password" name="pass" id="pass" class="form-control border-input maxlength="25" required>' +

          '</div>'+
         '</div>'+
         '</div>'+

         '<div class="row">'+
          '<div class="col-md-4">'+
            '<div class="form-group">'+

         '<label>Nombre(s)</label>' +
         '<input input type="text" name="nom" id="nom" class="form-control border-input maxlength="25" required>' +
         '</div>'+
         '</div>'+

          '<div class="col-md-4">'+
            '<div class="form-group">'+

         '<label>Apellidos</label>' +
         '<input input type="text" name="ape" id="ape" class="form-control border-input maxlength="25" required>' +
         '</div>'+
         '</div>'+
         '<div class="col-md-4">'+
            '<div class="form-group">'+

         '<label>Correo</label>' +
         '<input input type="text" name="cor" id="cor" class="form-control border-input maxlength="25" required>' +
         '</div>'+
         '</div>'+
         '</div>'+



         '<div class="row">'+
          '<div class="col-md-4">'+
            '<div class="form-group">'+

         '<label>Celular</label>' +
         '<input input type="number" name="cel" id="cel" class="form-control border-input type="number" required></br>'+
         '</div>'+
         '</div>'+

          '<div class="col-md-4">'+
            '<div class="form-group">'+

         '<label>Sueldo</label>' +
 '<input input type="number" name="sue" id="sue" class="form-control border-input type="number" required></br>'+

      '</div>'+
         '</div>'+

           '<div class="col-md-4"  >  '+
            '<div class="form-group">'+

         '<label>Sucursal/Colonia</label>' +

          '<select class="form-control form-control-sm" textalign="center"  required name="sucu" id="sucu">'+
          '<option value="" ></option>'+
          <?php
          $ejec7 = mysqli_query($conn, $sucursal);
          while($fila=mysqli_fetch_array($ejec7)){?>
          '<?php echo '<option value="'.$fila["id_recepcion"].'">'.$fila["colonia"].'</option>'; ?>'+
          <?php } ?>
          '</select>' +
          '</div>'+
         '</div>'+
         '</div>'+

         '<div class="row">'+
          '<div class="col-md-4">'+
            '<div class="form-group">'+

       
         '<label>Hora de entrada</label>' +
         '<input input type="time" name="hra_e" id="hra_e" class="form-control border-input maxlength="25" required>' +
         '</div>'+
         '</div>'+

         '<div class="col-md-4">'+
            '<div class="form-group">'+

         '<label>Hora de salida</label>' +     
        '<input input type="time" name="hra_s" id="hra_s" onchange="operaciones();" class="form-control border-input maxlength="25" required>' +
 
        '</div>'+
         '</div>'+

          '<div class="col-md-4">'+
            '<div class="form-group">'+

         '<label>Horas que trabajará</label>' +     
        '<input input type="number" name="hra_r" id="hra_r" readonly class="form-control border-input maxlength="25" required>' +
 
        '</div>'+
         '</div>'+
         '</div>'+

'<div class="row">'+
          '<div class="col-md-4 com"  >'+
            '<div class="form-group">'+

       
         '<label>¿Hora de comida? </label>' +          '</br>'+

         '<input input type="checkbox" name="hra_c" id="hra_c" onclick="comida();" class="check" maxlength="25" >' +
         '</div>'+
         '</div>'+

        
         '</div>'+


          '</br>'+
         '<Button type="submit" id="confirmar" name="confirmar" class= "btn btn-info btn-fill btn-wd">Agregar empleado</Button>'+
         '</form></div>',

         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         cancelButtonClass: 'btn btn-danger btn-fill btn-wd',
         showConfirmButton: false,
         customClass: 'swal-wide',
         focusConfirm: false,
         buttonsStyling: false,
          reverseButtons: true, allowOutsideClick: false,
          allowOutsideClick: false


      })

 $("#check").change(function(){
    if(this.value != '0'){
      $(".com").show();

}else{

}

  })
 

};
  </script>

<script type="text/javascript">
function operaciones()
{
  var salida =document.getElementById('hra_s').value;
  var entrada =document.getElementById('hra_e').value;
  suma =parseInt(salida)-parseInt(entrada);
  totalt =parseInt(document.getElementById('hra_r').value= suma);
}
</script>


<script type="text/javascript">
function comida()
{
  var horas =document.getElementById('hra_r').value;
  suma =parseInt(horas)+parseInt(1);
  totalt =parseInt(document.getElementById('hra_r').value= suma);
//  hra_c.Checked = !(hra_c.Checked);
document.getElementById("hra_c").disabled = true;


}
</script>

<script>
function desactivar() {
    document.getElementById("hra_c").disabled = true;
}
</script>

  <script>
  function borrar_emp(id){
  swal({
     title: 'Estás seguro?',
     text: "Esta acción no se puede revertir!",
     type: 'warning',
     showCancelButton: true,
     confirmButtonColor: '#3085d6',
     cancelButtonColor: '#d33',
     confirmButtonText: 'Si!, borralo',
     showLoaderOnConfirm: true,
     preConfirm: function() {
       return new Promise(function(resolve) {

         $.ajax({
          url: 'admin_borrar_emp.php',
          type: 'POST',
          data: 'delete='+id,
          dataType: 'json'
       })
       .done(function(response){
          swal('Borrado exitosamente!', response.message, response.status).then(function(){
              location.reload();
          });

       })
       .fail(function(){
          swal('Oops...', 'Something went wrong with ajax !', 'error');
       });
       });
     },
     allowOutsideClick: false
  });
  }
  </script>


   <script type="text/javascript">
  function actual_mod(id){
    $.ajax({
        // la URL para la petición
        url : 'admin_fn_actual_emp.php',
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
          $("#tipo").val(data.data.tipo);
          $("#usuario").val(data.data.usu);
          $("#pass").val(data.data.pass);
          $("#nom").val(data.data.nom);
          $("#ape").val(data.data.ape);
          $("#usu").val(data.data.dir);
          $("#cor").val(data.data.cor);
          $("#cel").val(data.data.cel);
          $("#sue").val(data.data.sue);


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
 function actual_emp(id){

 swal({
 title: 'Actualizar empleado',
 html:
 '<div class="col-lg-12"> <form action="admin_fn_actualizar_ctrl_empleados.php" method="post" name="data">'+
 '<input id="id" name="id" value="'+id+'" type="hidden">' +
 '<label>Tipo</label>'+
 '<select class="form-control form-control-sm" textalign="center" required name="tipo" id="tipo"><option value="Administrador" >Administrador</option>'+
         '<option value="Almacen">Almacen</option>'+
         '<option value="Jefe de Taller">Jefe de taller</option>'+
         '<option value="Taller">Taller</option>'+
         '<option value="Tecnico">Tecnico</option>'+
         '<option value="Recepcion">Recepcion</option>'+
         '</select>' +
 '<label>Usuario</label>' +
 '<input input type="text" name="usuario" id="usuario" class="form-control border-input maxlength="25" required>' +
 '<label>Contraseña</label>' +
 '<input input type="password" name="pass" id="pass" class="form-control border-input maxlength="25" required>' +
 '<label>Nombre(s)</label>' +
 '<input input type="text" name="nom" id="nom"  class="form-control border-input maxlength="25" required>' +
 '<label>Apellidos</label>' +
 '<input input type="text" name="ape" id="ape" class="form-control border-input maxlength="25" required>' +
 '<label>Correo</label>' +
 '<input input type="email" name="cor" id="cor" class="form-control border-input ">' +
 '<label>Celular</label>' +
 '<input input type="number" name="cel" id="cel" class="form-control border-input type="number" required></br>'+
 '<label>Sueldo</label>' +
 '<input input type="number" name="sue" id="sue" class="form-control border-input type="number" required></br>'+
 '<label>Sucursal/Colonia</label>' +

          '<select class="form-control form-control-sm" textalign="center"  required name="sucu" id="sucu">'+
          '<option value="" ></option>'+
          <?php
          $ejec7 = mysqli_query($conn, $sucursal);
          while($fila=mysqli_fetch_array($ejec7)){?>
          '<?php echo '<option value="'.$fila["id_recepcion"].'">'.$fila["colonia"].'</option>'; ?>'+
          <?php } ?>
          '</select>' +
          '</br>'+
 '<Button type="submit" class= "btn btn-info btn-fill btn-wd">Actualizar empleado</Button>'+
 '</form></div>',
 showCancelButton: true,
 confirmButtonColor: '#3085d6',
 cancelButtonColor: '#d33',
 confirmButtonText: 'Actualizar empleado',
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
//ventana actualizar cliente
function historial_swal(id){

  var variableJS = id;
  <?php
  $id = "<script> document.write(variableJS) </script>";
  $historial = "SELECT id_equipo,equipo, marca,modelo, falla, estado, comentarios
  FROM reparar_tv
  WHERE estado='Reparada' and id_personal='$id';";
  ?>
swal({
title: 'Historial de concepciones',
html:

'<table id="tablahis" class="table table-hover table-dark table-responsive">'+
'<thead>'+

'<th>Equipo</th>'+
'<th >Modelo</th>'+
'<th >Falla</th>'+
'<th >Estado</th>'+
'</thead>'+
          <?php
            $ejec4 = mysqli_query($conn, $historial);
          while($fila=mysqli_fetch_array($ejec4)){
              $id          = $fila['equipo'];
              $nom           = $fila['modelo'];
              $fech          = $fila['falla'];
              $hora_e          = $fila['estado'];
          ?>
                    '<tr>'+
              '<td ><?php echo $id ?></td>'+
              '<td><?php echo $nom ?></td>'+
              '<td><?php echo $fech ?></td>'+
              '<td><?php echo $hora_e ?></td>'+
'</tr>'+
  <?php } ?>
'<tbody></br>'+
'Comisión de empleados'+
'</tbody>'+
'</table>',


showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: 'Actualizar empleado',
cancelButtonClass: 'btn btn-danger btn-fill btn-wd',
showConfirmButton: false,
focusConfirm: false,
buttonsStyling: false,
reverseButtons: true, allowOutsideClick: false,
allowOutsideClick: false

})
  };

</script>


<style>
.swal-wide{
    width:60% !important;
}
</style>



 <script type="text/javascript">
function boni_mod(id){
  $.ajax({
      // la URL para la petición
      url : 'admin_boni_fn_mod.php',
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

        $("#mano").val(data.data.man);
        $("#total").val(data.data.total);

        var manox =document.getElementById('mano').value;
        var totales = (5*parseInt(manox))/100;
        var totalt = parseInt(document.getElementById('ganado').value= totales);

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
function bonificacion(id){


swal({
title: 'Producción de empleado',
html:
'<div class="card-body"> <form action="taller_fn_costos.php" method="post" name="data" content="text/html; charset=utf-8" >'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Mano de obra</label>'+
        '<input name="mano"  id="mano"  type="number" maxlength="25" readonly  required class="form-control border-input">'+

    '</div>'+
'</div>'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Total de productividad</label>'+
        '<input name="total"  id="total"  type="number" maxlength="25" readonly  required class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Porcentaje de comisión</label>'+
        '<input type="text" value="5%"  readonly  class="form-control border-input">'+
    '</div>'+
'</div>'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Comisión ganada</label>'+
        '<input name="ganado" id="ganado" readonly class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'<div class="row">'+
'<div class="col-md-6">'+
  '<div class="form-group">'+
        '<label>Total</label>'+
        '<input name="swal-input23"  id="swal-input23" type="number" name="marca" id="marca" maxlength="25" required readonly class="form-control border-input">'+
    '</div>'+
'</div>'+
'</div>'+

'</form>',
showCancelButton: true,
confirmButtonColor: '#3085d6',
cancelButtonColor: '#d33',
confirmButtonText: '</form> Actualizar solicitud',
cancelButtonClass: 'btn btn-danger btn-fill btn-wd',
showConfirmButton: false,
focusConfirm: false,
buttonsStyling: false,
reverseButtons: true, allowOutsideClick: false,
allowOutsideClick: false

})

};
</script>



  </body>
</html>
