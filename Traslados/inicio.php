
<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];


//consulta para obtener el nombre del equipo por id


//Consulta para rellenar los campos del usuario
$query = "SELECT id_personal, usuario, nombre, apellidos, correo, celular
									 FROM personal where id_personal = $var_clave";

$resultado = $conn->query($query);


if($resultado->num_rows > 0){

 while($row = $resultado->fetch_assoc()) {
 $usu = $row["usuario"];
 $nom = $row["nombre"];
	$ape = $row["apellidos"];
	$cor = $row["correo"];
	$cel = $row["celular"];
}//aqui termina el while

}else{ header("location:index.html");}


 ?>

<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href= "assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href= "assets/img/favicon.png">

	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Usuario de traslados</title>


	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href= "assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Paper Dashboard core CSS    -->
    <link href= "assets/css/paper-dashboard.css?v=1.2.1" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href= "assets/css/demo.css" rel="stylesheet" />


    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href= "assets/css/themify-icons.css" rel="stylesheet">
</head>

<body>

<div class="wrapper">
    <div class="sidebar" data-background-color="white" data-active-color="danger">

    <div class="logo">
      <a href="#" class="simple-text logo-mini">
        RSH
      </a>

      <a class="simple-text logo-normal">Electronica RSH</a>
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

                <li class="active">
                    <a href="user.php">
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
                <li>
                    <a href="traslados_por_concretar.php">
                        <i class="ti-truck"></i>
                        <p>Por concretar</p>
                    </a>
                </li>
                <li>
                    <a href="traslados_entregados.php">
                        <i class="ti-truck"></i>
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
						<a class="navbar-brand">Usuarios</a>
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

<!--Contenido principal -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-4 col-md-5">
                        <div class="card card-user">
                            <div class="image">
                                <img src="assets/img/electronico.jpg" alt="..."/>
                            </div>

                            <div class="content">
                                <div class="author">
                                  <img class="avatar border-white" src="assets/img/user.png" alt="..."/>
                                  <h4 class="title"><?php echo $var_name ?><br />
                                     <h4><small><?php echo $cor ?></small></h4>
                                  </h4>
                                  </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8 col-md-7">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Profile</h4>
                            </div>
                            <div class="card-content">
                                <form action="actual_perfil" method="post" name="datos">


																		<div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Usuario</label>
                                                <input type="text" maxlength="10" required name="cel" class="form-control border-input" placeholder="Usuario" value="<?php echo $usu?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nombre</label>
                                                <input type="text" name="tel" maxlength="10" required class="form-control border-input" placeholder="Nombre" value="<?php echo $nom?>" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Apellidos</label>
                                                <input type="text" maxlength="10" required name="cel" class="form-control border-input" placeholder="Apellidos" value="<?php echo $ape?>" >
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Celular</label>
                                                <input type="number" name="tel" maxlength="10" required class="form-control border-input" placeholder="Celular" value="<?php echo $cel?>" >
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Correo</label>
                                                <input type="text" maxlength="10" required name="correo" class="form-control border-input" placeholder="Correo" value="<?php echo $cor?>" >
                                            </div>
                                        </div>

                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Actualizar perfil</button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

<!--fin Contenido principal -->

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
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, Electronica RSH</a>
                </div>
            </div>
        </footer>
    </div>
</div>
</body>


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

	<!--  Google Maps Plugin    -->
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAFPQibxeDaLIUHsC6_KqDdFaUdhrbhZ3M"></script>

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
	<script src="assets/js/demo.js"></script>




</html>
