<head>
     <link rel="stylesheet" media="screen" type="text/css" />
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
</head>

<?php


session_start();
include 'conexion.php';
//if(isset($_POST['submit']))
//{

if ( (isset($_POST['user'])) || (isset($_POST['pass'])) ){


    $var_user = $_POST['user'];
	$var_contra = md5($_POST['pass']);






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
  	    $_SESSION['nombre']=$var_nombre;
        $_SESSION['tipo'] = $row["tipo"];

  		header("location:checkin_empleados.php");
  	}
    if($tipo == 'Administrador'){
    		$_SESSION['clave'] = $row["id_personal"];
    	    $_SESSION['nombre']=$var_nombre;
          $_SESSION['tipo'] = $row["tipo"];

    		header("location:checkin_empleados.php");
    	}
      if($tipo == 'Tecnico'){
      		$_SESSION['clave'] = $row["id_personal"];
      	    $_SESSION['nombre']=$var_nombre;
            $_SESSION['tipo'] = $row["tipo"];

      		header("location:checkin_empleados.php");
      	}
        if($tipo == 'Recepcion'){
        		$_SESSION['clave'] = $row["id_personal"];
        	    $_SESSION['nombre']=$var_nombre;
              $_SESSION['tipo'] = $row["tipo"];

      	header("location:checkin_empleados.php");
        	}
          if($tipo == 'Jefe de taller'){
          		$_SESSION['clave'] = $row["id_personal"];
          	    $_SESSION['nombre']=$var_nombre;
                $_SESSION['tipo'] = $row["tipo"];

        	header("location:checkin_empleados.php");
          	}


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
