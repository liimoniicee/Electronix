<!-- Sweet Alert 2 plugin -->
<script src= "assets/js/sweetalert2.js"></script>

<?php

require 'conexion.php';

$marc = $_POST['marc'];
$mod = $_POST['mod'];
$ser = $_POST['ser'];
$cost = $_POST['costo'];


$archivo = $_FILES['img']['tmp_name'];
$destino = "assets/galeria/". $_FILES['img']['name'];
move_uploaded_file($archivo, $destino);

$sql = "INSERT INTO ventas_tv (marca, modelo, serie, costo, imagen1, fecha_alta, estado)
VALUES ('$marc', '$mod', '$ser', '$cost', '$destino', CURRENT_TIMESTAMP, 'En venta');";



$res = $conn->query($sql);



if (!$res) {
   printf("Errormessage: %s\n", $conn->error);
}
else{
  //echo "<script>alert('Usuario agregado exitosamente con el folio=$')</script>";
  echo "<script>window.open('recepcion_ventas.php','_self')</script>";}

?>
