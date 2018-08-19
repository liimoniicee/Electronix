<!DOCTYPE html>
<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];


$consulta = "SELECT
id_folio, nombre, apellidos, celular, correo, puntos
FROM
clientes;";

?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Electronica RSH</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->


    <!-- Custom styles for this template -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
    <!-- flaticon css -->
  <link rel="stylesheet" type="text/css" href="assets/essential_icon/font/flaticon.css">

  </head>

  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.html" class="logo"><b>Recepción</b></a>
            <!--logo end-->
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="destroy.php">Salir</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->

      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">

              	  <p class="centered"><img src="assets/img/friends/fr-02.jpg" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $var_name ?></h5>

                  <li class="sub-menu">
                      <a href="inicio.php">
                          <i class="flaticon-home"></i>
                          <span>inicio</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a class= "active" href="recepcion.php">
                          <i class="flaticon-user-5"></i>
                          <span>Recepción</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="clientes.php">
                          <i class="flaticon-id-card-5"></i>
                          <span>Clientes</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a  href="taller.php">
                          <i class="flaticon-user-7"></i>
                          <span>Taller</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="mercado.php">
                          <i class="flaticon-worldwide"></i>
                          <span>Mercado</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="traslado.php">
                          <i class="flaticon-send"></i>
                          <span>Traslados</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="almacen.php">
                          <i class="flaticon-home-2"></i>
                          <span>Almacen</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a  href="administrador.php">
                          <i class="flaticon-user-6"></i>
                          <span>Administrador</span>
                      </a>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper site-min-height">
            <div class="form-panel">

                    	  <h4> Recepción </h4>

                        <div class="content-panel">
                            <div class="row">
	                  	  	  <h4 >->Clientes</h4>
                            <div class='col-md-4 col-sm-4 mb'>
                            <div class="input-group">
                                <span class="input-group-addon">Buscar</span>
                                  <input id="search" type="text" class='form-control' placeholder="Buscar clientes dentro de la tabla">
                                </div>
                              </div>
                              <div class='col-md-2 col-sm-2 mb'>

                              <button type="button" onclick="alerta();" class="btn btn-primary">nuevo cliente <i class="flaticon-add-1"></i></button>

                            </div>
                              <div class='col-md-2 col-sm-3 mb'>
                            <div class='row'>
                              <button type="button" class="btn btn-primary col-md-11">Equipos con solución <i class="flaticon-view"></i></button></br>

                            </div></br>
                            <div class='row'>
                            <button type="button" class="btn btn-primary col-md-11">Equipos sin solucion <i class="flaticon-hide"></i></button>
                          </div>
                        </div>
                          <div class='col-md-2 col-sm-3 mb'>
                              <div class='row'>
                                <button type="button" class="btn btn-primary col-md-11">Ventas <i class="flaticon-price-tag"></i></button>
                                </div></br>
                                <div row>
                                <button type="button" class="btn btn-primary col-md-11">Avisos <i class="flaticon-megaphone-1"></i></button>
                              </div>
                            </div>
                            </div>

		                      <table id="table" class="table">
                            <thead>
                                <!--<th data-field="state" data-checkbox="true"></th>-->
                                <th data-field="id">id</th>
                              <th data-field="fecha" data-sortable="true">Nombre</th>
                              <th data-field="estatus" data-sortable="true">Apellidos</th>
                              <th data-field="estatus" data-sortable="true">Celular</th>
                              <th data-field="estatus" data-sortable="true">Correo</th>
                              <th data-field="estatus" data-sortable="true">Puntos</th>

                            </thead>
                            <?php
                              $ejecutar = mysqli_query($conn, $consulta);
                            while($fila=mysqli_fetch_array($ejecutar)){
                                $id          = $fila['id_folio'];
                                $nom           = $fila['nombre'];
                                $ape          = $fila['apellidos'];
                                $cel        = $fila['celular'];
                                $cor        = $fila['correo'];
                                $punt        = $fila['puntos'];

                        ?>
                                            <tr>
                                                <td><?php echo $id ?></td>
                                                <td><?php echo $nom ?></td>
                                                <td><?php echo $ape ?></td>
                                                <td><?php echo $cel ?></td>
                                                <td><?php echo $cor ?></td>
                                                <td><?php echo $punt ?></td>
                                  </tr>
                                <?php } ?>
                                <tbody>
                                    Resultado de clientes
                              </tbody>
		                      </table>
	                  	  </div>
                    </div>

		</section><! --/wrapper -->
      </section><!-- /MAIN CONTENT -->

      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2014 - Alvarez.is
              <a href="blank.html#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="assets/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>

    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="assets/js/sweetalert2.js"></script>

    <!--common script for all pages-->
    <script src="assets/js/common-scripts.js"></script>


    <script type="text/javascript">

    function alerta(){


    swal({
   title: 'Agregar cliente',
   html:

   '<form action="new_cliente" method="post" name="data">'+
   '<label>Nombre(s)</label>' +
   '<input name="nom" id="nom" class="form-control border-input maxlength="25" onkeypress="return validar(event)" required">' +
   '<label>Apellidos</label>' +
   '<input name="ape" id="ape" class="form-control border-input maxlength="25" onkeypress="return validar(event)" required">' +
   '<label>Direccion</label>' +
   '<input name="dire" id="dire" class="form-control border-input maxlength="25" onkeypress="return validar(event)" required">' +
   '<label>Correo</label>' +
   '<input name="cor" id="cor" class="form-control border-input requiered">' +
   '<label>Celular</label>' +
   '<input name="cel" id="cel" class="form-control border-input type="number" required"></br>'+
   '<Button type="submit" class= "btn btn-info btn-fill btn-wd">Agregar usuario</Button>'+
   '</form>',
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




  <script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>

<!-- Script para buscar en tabla. -->
<script>
// captura el evento keyup cuando escribes en el input
  $("#search").keyup(function(){
      _this = this;
      // Muestra los tr que concuerdan con la busqueda, y oculta los demás.
      $.each($("#table tbody tr"), function() {
          if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
             $(this).hide();
          else
             $(this).show();
      });
  });
</script>




  </body>
</html>
