<?php   
include'check_sesion.php';
include'fuctions.php';
include'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];


$col = $_POST ['col'];
$cal= $_POST ['cal'];
$cp= $_POST ['cp'];
$ciu = $_POST ['ciu'];
$estado = $_POST ['estado'];
$sit = $_POST ['sit'];



$sql = "INSERT INTO recepciones(colonia, calles, cp, ciudad, estado, situacion) VALUES ('$col', '$cal', '$cp', '$ciu','$estado','$sit');";
$res = $conn->query($sql);



if (!$res) {
    printf("Errormessage: %s\n", $conn->error);
 }
 else{
 echo "<script>window.open('admin_editar_recepciones.php','_self')</script>";
 }


?>