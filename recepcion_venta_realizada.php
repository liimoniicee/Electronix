<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();


$response = array();

  $id_equipo = $_POST['swal-input0'];

$consulta = "update ventas_tv set estado ='Vendida' WHERE idventa_tv = $id_equipo";


$resultado = $conn->query($consulta);

if (!$resultado) {
   printf("Errormessage: %s\n", $conn->error);
}
else{
echo "<script>window.open('recepcion_ventas.php','_self')</script>";
}

 ?>
