<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

$id_equipo = $_POST['swal-input0'];
$falla = $_POST['swal-input1'];
$proc = $_POST['swal-input2'];
$estado = $_POST['swal-input3'];
$parte = $_POST['swal-input4'];


$sql = "Update reparar_tv set estado='Diagnosticada' where id_equipo='$id_equipo'";

$res = $conn->query($sql);


$sql1 = "INSERT INTO reportes_tecnicos (falla_especifica, solucion_especifica, conclusion, parte, id_personal, id_equipo)
VALUES ('$falla', '$proc', '$estado','$parte','$var_clave','$id_equipo');";



$res1 = $conn->query($sql1);

if (!$res) {
  printf("Errormessage: %s\n", $conn->error);
}

if (!$res1) {
  printf("Errormessage: %s\n", $conn->error);
}
else{
 //echo "<script>alert('Usuario agregado exitosamente con el folio=$')</script>";
 echo "<script>window.open('tecnico.php','_self')</script>";}