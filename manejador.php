<?php

session_start();
include 'conexion.php';
//if(isset($_POST['submit']))
//{

if ( (isset($_POST['user'])) || (isset($_POST['pass'])) ){


    $var_user = $_POST['user'];
	$var_contra = $_POST['pass'];






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

		header("location:inicio.php");
	}
  if($tipo == 'Traslado'){
  		$_SESSION['clave'] = $row["id_personal"];
  		//$id = $row["ID_USUARIO"];//
  	    $_SESSION['nombre']=$var_nombre;

  		header("location:inicio.php");
  	}
    if($tipo == 'Administrador'){
    		$_SESSION['clave'] = $row["id_personal"];
    		//$id = $row["ID_USUARIO"];//
    	    $_SESSION['nombre']=$var_nombre;

    		header("location:administrador.php");
    	}
      if($tipo == 'Tecnico'){
      		$_SESSION['clave'] = $row["id_personal"];
      		//$id = $row["ID_USUARIO"];//
      	    $_SESSION['nombre']=$var_nombre;

      		header("location:tecnico.php");
      	}
        if($tipo == 'Recepcion'){
        		$_SESSION['clave'] = $row["id_personal"];
        		//$id = $row["ID_USUARIO"];//
        	    $_SESSION['nombre']=$var_nombre;

        		header("location:recepcion.php");
        	}
          if($tipo == 'Jefe de taller'){
          		$_SESSION['clave'] = $row["id_personal"];
          		//$id = $row["ID_USUARIO"];//
          	    $_SESSION['nombre']=$var_nombre;

          		header("location:j_taller.php");
          	}



  /*else {
		//echo "<script>alert('Usuario o contraseña invalidos!')</script>";
    //echo "<script>window.open('index.html','_self')</script>";
	}*///primer roll


    	 }//aqui termina el while

	}else{

    echo "<script>alert('Usuario o contraseña invalidos!')</script>";
        echo "<script>window.open('index.html','_self')</script>";}


	}else{
	header("location:index.html");
	}


//} else{
//	header("location:index.html");
//}


?>
