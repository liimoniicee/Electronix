<?php   
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];
$id = $_POST ['id_folio'];
$ubi = $_POST ['ubicacion'];
$des= $_POST ['destino'];

$id_equipo= $_POST['swal-input1'];
$direccion= $_POST ['dire'];
$comentarios = $_POST ['comen'];



$sql2 = "INSERT INTO traslado(estado, ubicacion, destino,direccion,comentarios, id_equipo,id_personal ,id_folio)
VALUES ('Pendiente', '$ubi', '$des','$direccion','$comentarios','$id_equipo', '$var_clave','$id');";
$res2 = $conn->query($sql2);


$sql = "UPDATE reparar_tv set ubicacion = '$ubi en ruta a $des' where id_equipo= '$id_equipo';";
$res = $conn->query($sql);
//checar la validacion(no funciona el else:v)

echo "<script>window.open('recepcion.php','_self')</script>";


?>