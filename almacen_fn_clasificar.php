<?php   
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];


$id = $_POST ['swal-input00'];
$id_equipo= $_POST ['swal-input1'];
$subi= $_POST ['swal-input3'];
$sube = $_POST ['swal-input4'];





$sql = "INSERT INTO almacen(sub_ubicacion, sub_estado, id_personal, id_equipo, id_refacciones, idventa_tv, id_folio)
VALUES ('$subi', '$sube', '$var_clave', '$id_equipo','0', '0', '$id');";
$res = $conn->query($sql);

$sql1 = "UPDATE reparar_tv set estado='Almacenado',ubicacion='$subi', fecha_egreso=CURRENT_TIMESTAMP where id_equipo='$id_equipo';";
 $res1 = $conn->query($sql1);

if (!$res) {
    printf("Errormessage: %s\n", $conn->error);
 }
 else{
 echo "<script>window.open('almacen.php','_self')</script>";
 }


?>