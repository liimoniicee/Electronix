<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();


$response = array();

  $costo = $_POST['swal-input5'];
  $id_equipo = $_POST['swal-input0'];

$consulta = "UPDATE reparar_tv set presupuesto='$costo', estado ='Autorizacion taller' WHERE id_equipo = $id_equipo";


$resultado = $conn->query($consulta);

if (!$resultado) {
   printf("Errormessage: %s\n", $conn->error);
}
else{
echo "<script>window.open('ml.php','_self')</script>";
}

 ?>
