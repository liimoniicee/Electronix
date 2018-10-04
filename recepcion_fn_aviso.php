2<?php   
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

$tipo = $_POST ['receptor'];
$aviso = $_POST ['aviso'];


$sql3 = "INSERT INTO avisos(id_personal, fecha, aviso, estado, tipo)
VALUES ('$var_clave', CURRENT_TIMESTAMP, '$aviso', 'Pendiente', '$tipo');";
$res3 = $conn->query($sql3);

echo "<script>window.open('recepcion.php','_self')</script>";


?>