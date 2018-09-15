
 <!doctype html>
 <?php
 session_start();
 include 'fuctions.php';
 include 'conexion.php';
 verificar_sesion();

 $ahora = time(); //obtenemos la fecha actual a partir de la función time().
 $formateado= date('Y-m-d', $ahora) ; // obtenemos la cadena en el formato YYYY-MM-DD

//variables
 $var_name=$_SESSION['nombre'];
 $var_clave= $_SESSION['clave'];

 //consulta para llenar la tabla
 $consulta = "SELECT
 *
 FROM
 traslado where id_personal='$var_clave' and estado='Recoleccion';";


?>

<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href= "assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href= "assets/img/favicon.png">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Por concretar</title>

	<!-- Canonical SEO -->
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href= "assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Paper Dashboard core CSS    -->
    <link href= "assets/css/paper-dashboard.css?v=1.2.1" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href= "assets/css/demo.css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href= "assets/css/themify-icons.css" rel="stylesheet">
</head>

<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">
    <!--
    Tip 1: you can change the color of the sidebar's background using: data-background-color="white | brown"
    Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
  -->
    <div class="logo">
      <a class="simple-text logo-mini">
        RSH
      </a>

      <a class="simple-text logo-normal">
        Electronica RSH
      </a>
    </div>
      <div class="sidebar-wrapper">
      <div class="user">
                <div class="photo">
                    <img src= "assets/img/user.png" />
                </div>
                <div class="info">
          <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                        <span>
                <?php echo $var_name ?>

            </span>
                    </a>

                </div>
            </div>
            <ul class="nav">

                <li>
                    <a href="inicio.php">
                        <i class="ti-user"></i>
                        <p>Perfil de usuario</p>
                    </a>
                </li>
                <li>
                    <a href="traslados.php">
                        <i class="ti-package"></i>
                        <p>Traslados</p>
                    </a>
                </li>
                <li class = 'active'>
                    <a href="traslados_por_concretar.php">
                        <i class="ti-truck"></i>
                        <p>Por concretar</p>
                    </a>
                </li>
                <li>
                    <a href="traslados_enruta.php">
                        <i class="ti-truck"></i>
                        <p>En ruta</p>
                    </a>
                </li>
                <li>
                    <a href="traslados_entregados.php">
                        <i class="ti-home"></i>
                        <p>Entregados</p>
                    </a>
                </li>




            </ul>
      </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
        <div class="navbar-minimize">
          <button id="minimizeSidebar" class="btn btn-fill btn-icon"><i class="ti-more-alt"></i></button>
        </div>
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand">Por concretar</a>
                </div>
                <div class="collapse navbar-collapse">

                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a href="#stats" class="dropdown-toggle btn-magnify" data-toggle="dropdown">
                                    <i class="ti-user"></i>
                                    <p> <?php
                               echo "Bienvenido: ".$_SESSION["nombre"];
                                     ?> </p>
                                </a>
                            </li>

                            <li>
                                <a href="destroy.php" class="btn-rotate">
                                    <i class="ti-shift-left"></i>
                                    <p class="hidden-md hidden-lg">

                                <p>logout</p>
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </div>
            </div>
        </nav>

<!-- Contenido principal-->

				<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">


                            <div class="card-content table-full-width">
                            <div class="header">
                                <h4 class="title">En camino a la ubicación del paquete</h4>
                                <p class="category">La siguiente tabla muestra los paquetes que tienes pendientes por recoger.</p></br>
                            </div>
                                  <table class="table table-striped">

																	<thead>
                                      <!--<th data-field="state" data-checkbox="true"></th>-->
                                                                            <th data-field="id">id</th>
                                                                            <th data-field="estado" data-sortable="true">Estado</th>
                                                                        <th data-field="ubicacion" data-sortable="true">Ubicacion</th>
                                                                        <th data-field="destino" data-sortable="true">Destino</th>

                                    <th data-field="fecha" data-sortable="true">Fecha solicitud</th>
                                    <th class="disabled-sorting">Acción</th>

																	</thead>
                                  <?php
                                    $ejecutar = mysqli_query($conn, $consulta);
                                  while($fila=mysqli_fetch_array($ejecutar)){
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
                                                      <td>
                                                  <button onclick="alerta(<?php echo $id ?>), enviarmod(<?php echo $id ?>);" class="btn btn-simple btn-warning btn-icon edit"><i class="ti-truck"></i></button>
                                                </td>
                                                      <!--<td>

                                                    <button onclick="alerta(<?php echo $id ?>), enviarmod(<?php echo $id ?>);" class="btn btn-simple btn-warning btn-icon edit"><i class="ti-pencil-alt"></i></button>
                                                    <button onclick="borrar(<?php echo $id ?>)" class="btn btn-simple btn-danger btn-icon remove"><i class="ti-close"></i></a>
                                                  </td > -->
                                        </tr>
                                      <?php } ?>

																	</tbody>
                                </table>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

<!-- fin contenido principal -->

<script>
function enviarmod(id){
  $.ajax({
      // la URL para la petición
      url : 'mod.php',
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
        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a>
                                Electronica RSH
                            </a>
                        </li>
                        <li>
                            <a>
                               Redes sociales
                            </a>
                        </li>
                        <li>
                            <a>
                                Licencias
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, Electronica RSH
                </div>
            </div>
        </footer>
    </div>
</div>
</body>

	<!--   Core JS Files. Extra: TouchPunch for touch library inside jquery-ui.min.js   -->
	<script src= "assets/js/jquery-3.1.1.min.js" type="text/javascript"></script>
	<script src= "assets/js/jquery-ui.min.js" type="text/javascript"></script>
	<script src= "assets/js/perfect-scrollbar.min.js" type="text/javascript"></script>
	<script src= "assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Forms Validations Plugin -->
	<script src= "assets/js/jquery.validate.min.js"></script>

	<!-- Promise Library for SweetAlert2 working on IE -->
	<script src= "assets/js/es6-promise-auto.min.js"></script>

	<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
	<script src= "assets/js/moment.min.js"></script>

	<!--  Date Time Picker Plugin is included in this js file -->
	<script src= "assets/js/bootstrap-datetimepicker.js"></script>

	<!--  Select Picker Plugin -->
	<script src= "assets/js/bootstrap-selectpicker.js"></script>

	<!--  Switch and Tags Input Plugins -->
	<script src= "assets/js/bootstrap-switch-tags.js"></script>

	<!-- Circle Percentage-chart -->
	<script src= "assets/js/jquery.easypiechart.min.js"></script>

	<!--  Charts Plugin -->
	<script src= "assets/js/chartist.min.js"></script>

	<!--  Notifications Plugin    -->
	<script src= "assets/js/bootstrap-notify.js"></script>

	<!-- Sweet Alert 2 plugin -->
	<script src= "assets/js/sweetalert2.js"></script>


	<!-- Vector Map plugin -->
	<script src= "assets/js/jquery-jvectormap.js"></script>



	<!-- Wizard Plugin    -->
	<script src= "assets/js/jquery.bootstrap.wizard.min.js"></script>

	<!--  Bootstrap Table Plugin    -->
	<script src= "assets/js/bootstrap-table.js"></script>

	<!--  Plugin for DataTables.net  -->
	<script src= "assets/js/jquery.datatables.js"></script>

	<!--  Full Calendar Plugin    -->
	<script src= "assets/js/fullcalendar.min.js"></script>

	<!-- Paper Dashboard PRO Core javascript and methods for Demo purpose -->
	<script src= "assets/js/paper-dashboard.js?v=1.2.1"></script>

    <!--   Sharrre Library    -->
    <script src= "assets/js/jquery.sharrre.js"></script>

	<!-- Paper Dashboard PRO DEMO methods, don't include it in your project! -->
	<script src="../assets/js/demo.js"></script>




  <script type="text/javascript">

  function alerta(id){


  swal({
 title: 'Editar solicitud',
 html:

 '<form action="actual_concre" method="post" name="data">'+
 //'<label for="exampleInputEmail1">id</label>' +
 '<input name="swal-input0" type="hidden" id="swal-input0" class="form-control border-input" readonly>' +
 '<label for="exampleInputEmail1">Estado</label>' +
 '<input name="swal-input1" id="swal-input1" class="form-control border-input maxlength="25" readonly>' +
 '<label for="exampleInputEmail1">Direccion</label>' +
 '<input name="swal-input2" id="swal-input2" class="form-control border-input type="number" readonly>' +
 '<label for="exampleInputEmail1">Comentarios</label>' +
 '<input name="swal-input3" id="swal-input3" class="form-control border-input maxlength="25" readonly>' +
 '<label for="exampleInputEmail1">Ubicacion</label>' +
 '<input name="swal-input4" id="swal-input4" class="form-control border-input maxlength="25" readonly>' +
 '<label for="exampleInputEmail1">Destino</label>' +
 '<input name="swal-input5" id="swal-input5" class="form-control border-input maxlength="25" readonly>' +
 '<label for="exampleInputEmail1">Fecha solicitud</label>' +
 '<input name="swal-input6" id="swal-input6" class="form-control border-input maxlength="25" readonly>' +
 '<label for="exampleInputEmail1">Id equipo</label>' +
 '<input name="swal-input7" id="swal-input7" class="form-control border-input maxlength="25" readonly>' +
 '<label for="exampleInputEmail1">Id carro</label>' +
 '<input name="swal-input8" id="swal-input8" class="form-control border-input maxlength="25" readonly>' +
 '<label for="exampleInputEmail1">Id personal</label>' +
 '<input name="swal-input9" id="swal-input9" class="form-control border-input maxlength="25" readonly>' +
 '<label for="exampleInputEmail1">Id folio</label>' +
 '<input name="swal-input10" id="swal-input10" class="form-control border-input maxlength="25" readonly>' +


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
  reverseButtons: true
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
          function validar(e) {
          tecla = (document.all) ? e.keyCode : e.which;
          if (tecla==8) return true; //Tecla de retroceso (para poder borrar)
          // dejar la línea de patron que se necesite y borrar el resto
          patron =/[A-Za-z\s]/; // Solo acepta letras  \s = es para el espacio
          //patron = /\d/; // Solo acepta números
          //patron = /[\w\s]/; // Acepta números y letras
          //patron = /\D/; // No acepta números
          //

          te = String.fromCharCode(tecla);
          return patron.test(te);
          }
          </script>
          <!-- onkeypress="return validar(event)"-->
          <script>
          function validar2(e) {
          tecla = (document.all) ? e.keyCode : e.which;
          if (tecla==8) return true; //Tecla de retroceso (para poder borrar)
          // dejar la línea de patron que se necesite y borrar el resto
          //patron =/[A-Za-z\s]/; // Solo acepta letras  \s = es para el espacio
          //patron = /\d/; // Solo acepta números
          //patron = /\w/; // Acepta números y letras
          patron = /[\w\s]/;// Acepta números y letras y espacio
          //patron = /\D/; // No acepta números
          //

          te = String.fromCharCode(tecla);
          return patron.test(te);
          }
          </script>



</html>
