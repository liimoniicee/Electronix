<?php

session_start();


if(isset($_POST['submit']))
{

if ( (isset($_POST['usuario'])) || (isset($_POST['contraseña'])) ){


    $var_user = $_POST['usuario'];
	$var_contra = md5($_POST['contrasena']);

	

    include'conexion.php';



$query = "SELECT id_personal, usuario, nombre, apellidos, contrasena, tipo FROM personal where usuario ='$var_user' and contrasena = '$var_contra'";
$resultado = $conn->query($query);


if($resultado->num_rows > 0){

	while($row = $resultado->fetch_assoc()) {
	$var_nombre = $row["nombre"];
	$var_apellidop = $row["apellidos"];
	$log_nom = $var_nombre. " ".$var_apellidop;
	$tipo = $row["tipo"];
	//Aspirantes

if($tipo == 'Traslado'){
		$_SESSION['clave'] = $row["id_personal"];
		//$id = $row["ID_USUARIO"];//
	    $_SESSION['nombre']=$var_nombre;
        //echo "<script>alert('Ingresado correctamente!')</script>";
        //echo "<script>window.open('aspirante.php','_self')</script>";
		header("location:traslados.php");
	}else {
		//echo "<script>alert('Usuario o contraseña invalidos!')</script>";
        //echo "<script>window.open('index.html','_self')</script>";
	}//primer roll


    	 }//aqui termina el while

	}else{

    echo "<script>alert('Usuario o contraseña invalidos!')</script>";
        echo "<script>window.open('index.html','_self')</script>";}


	}else{
	header("location:index.html");
	}


} else{
	header("location:index.html");
}


?>
