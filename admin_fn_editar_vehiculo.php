<?php   
include 'check_sesion.php';
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];


$marcas = $_POST ['marcas'];
$modelo= $_POST ['modelo'];
$ano= $_POST ['ano'];
$tipo = $_POST ['tipo'];
$estado = $_POST ['estado'];


$sql = "INSERT INTO carros(car_id_marca, car_modelo, car_ano, car_tipo, car_estado) VALUES ('$marcas', '$modelo', '$ano', '$tipo','$estado');";
$res = $conn->query($sql);



if (!$res) {
    printf("Errormessage: %s\n", $conn->error);
 }
 else{
 echo "<script>window.open('admin_editar_vehiculos.php','_self')</script>";
 }


?>