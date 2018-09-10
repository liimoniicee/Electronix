<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$id = $_POST['swal-input0'];
$nom = $_POST['swal-input1'];
$ape = $_POST['swal-input2'];
$dir = $_POST['swal-input3'];
$cor = $_POST['swal-input4'];
$cel = $_POST['swal-input5'];


$sql = "Update clientes set nombre ='$nom', apellidos ='$ape', direccion='$dir', correo= '$cor', celular='$cel' where id_folio='$id'";



$res = $conn->query($sql);

if (!$res) {
   printf("Errormessage: %s\n", $conn->error);
}
else{

echo "<script>alert('Usuario insertado exitosamente con el folio=')</script>";
  echo "<script>window.open('recepcion.php','_self')</script>";}

?>
