<?php   
include'check_sesion.php';
include'fuctions.php';
include'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];


$marcas = $_POST ['marcas'];


$sql = "INSERT INTO marcas(marca) VALUES ('$marcas');";
$res = $conn->query($sql);



if (!$res) {
    printf("Errormessage: %s\n", $conn->error);
 }
 else{
 echo "<script>window.open('admin_editar_vehiculos.php','_self')</script>";
 }


?>