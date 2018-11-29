<?php
include'check_sesion.php';
include'conexion.php';
//if(isset($_POST['submit']))
//{

if ( (isset($_POST['user'])) || (isset($_POST['pass'])) ){


    $var_user = $_POST['user'];
	$var_contra = md5($_POST['pass']);






$consulta = "SELECT id_personal,tipo,usuario,nombre,apellidos FROM personal WHERE usuario ='$var_user' AND contrasena = '$var_contra'";
$resultado = $conn->query($consulta);


if($resultado->num_rows > 0){

	while($row = $resultado->fetch_assoc()) {
	$var_nombre = $row["nombre"];
	$var_apellidop = $row["apellidos"];
	$log_nom = $var_nombre. " ".$var_apellidop;
	$tipo = $row["tipo"];
	//Aspirantes



  		$_SESSION['clave'] = $row["id_personal"];
  	    $_SESSION['nombre']=$var_nombre;
        $_SESSION['tipo'] = $row["tipo"];

		echo "<script>window.open('checkin_empleados.php','_self')</script>";

}
//aqui termina el while

	}else{

    echo "<script>alert('Usuario o contraseña invalidos!')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}


}

//} else{
//}


?>
<head>
     <link rel="stylesheet" media="screen" type="text/css" />
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</head>