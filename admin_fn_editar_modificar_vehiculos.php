<?php   
include'check_sesion.php';
include'fuctions.php';
include'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

$id = $_POST ['swal-input0'];
$marca = $_POST ['marca'];
$modelo = $_POST ['modelo'];
$ano = $_POST ['ano'];
$tipo= $_POST ['tipo'];
$estado = $_POST ['estado'];
$personal= $_POST ['personal'];


$sql = "UPDATE carros set car_id_marca='$marca', car_modelo='$modelo', car_ano='$ano',
car_tipo='$tipo', car_estado='$estado' where id_carro='$id';";
echo "<script>window.open('admin_editar_vehiculos.php','_self')</script>";


?>