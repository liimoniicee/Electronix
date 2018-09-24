<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();
$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

$nombre = $_POST['swal-input0'];
$marca = $_POST['swal-input1'];
$modelo = $_POST['swal-input2'];
$etiqueta1 = $_POST['swal-input3'];
$etiqueta2 = $_POST['swal-input4'];
$cantidad = $_POST['swal-input5'];
$ubicacion = $_POST['swal-input6'];
$precio = $_POST['swal-input7'];
$link = $_POST['swal-input8'];

$sql = "INSERT INTO refacciones_tv(link,nombre, marca, modelo, cantidad,ubicacion, estado, precio, etiqueta_1,etiqueta_2,id_personal)
VALUES ('$link','$nombre', '$marca', '$modelo', '$cantidad','$ubicacion', 'Publicada', '$precio', '$etiqueta1','$etiqueta2','$var_clave');";
$res = $conn->query($sql);


$res = $conn->query($sql);

if (!$res) {
   printf("Errormessage: %s\n", $conn->error);
}
else{

  echo "<script>window.open('ml.php','_self')</script>";}

?>
