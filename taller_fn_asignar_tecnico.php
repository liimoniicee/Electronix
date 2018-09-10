<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

$id = $_POST ['swal-input0'];
$id_e = $_POST ['swal-input1'];
$id_pe = $_POST ['swal-input2'];


$sql = "UPDATE reparar_tv set estado='En reparacion', id_personal='$id_pe', fecha_entregar=CURRENT_TIMESTAMP where id_folio='$id' and id_equipo='$id_e';";
 $res = $conn->query($sql);

 if (!$res) {
    printf("Errormessage: %s\n", $conn->error);
 }
 else{
 echo "<script>alert('Tecnico asignado con el folio=$id_pe')</script>";
 echo "<script>window.open('taller.php','_self')</script>";
 }

 ?>
