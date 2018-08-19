<?php

require 'conexion.php';


$nom = $_POST['nom'];
$ape = $_POST['ape'];
$cor = $_POST['cor'];
$cel = $_POST['cel'];
$dire = $_POST['dire'];


$sql = "INSERT INTO clientes (id_folio, nombre, apellidos, direccion, correo, celular, fecha, puntos)
VALUES (NULL, '$nom', '$ape', '$dire', '$cor', '$cel', CURRENT_TIMESTAMP, '0');";



$res = $conn->query($sql);

if (!$res) {
   printf("Errormessage: %s\n", $conn->error);
}
else{

echo "<script>alert('Usuario insertado exitosamente con el folio=')</script>";
  echo "<script>window.open('recepcion.php','_self')</script>";}
?>
