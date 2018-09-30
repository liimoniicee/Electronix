<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

$id_e = $_POST ['swal-input1'];
$id_pe = $_POST ['tecnico'];



$sql = "UPDATE reparar_tv set estado='En reparacion', id_personal='$id_pe', fecha_entregar=CURRENT_TIMESTAMP where id_equipo='$id_e';";
 $res = $conn->query($sql);

 $sql3 = "INSERT INTO avisos(id_personal, aviso, estado, tipo)
 VALUES ('$id_pe', 'Felicidades, te han asignado una tarea nueva', 'Pendiente', 'Tecnico');";
 $res3 = $conn->query($sql3);

 if (!$res) {
    printf("Errormessage: %s\n", $conn->error);
 }
 else{
 echo "<script>window.open('taller.php','_self')</script>";
 }

 ?>
