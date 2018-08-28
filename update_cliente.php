<?php

require 'conexion.php';

$id_folio = $_POST['id'];

$nom = $_POST['nom'];
$ape = $_POST['ape'];
$cor = $_POST['cor'];
$cel = $_POST['cel'];
$dire = $_POST['dire'];


$sql = "Update clientes set nombre ='$nom', apellidos ='$ape', direccion='$dire', correo= '$cor', celular='$cel' where id_folio='$id_folio' ;";



$res = $conn->query($sql);

if (!$res) {
   printf("Errormessage: %s\n", $conn->error);
}
else{

echo "<script>alert('Usuario insertado exitosamente con el folio=')</script>";
  echo "<script>window.open('recepcion.php','_self')</script>";}
?>
