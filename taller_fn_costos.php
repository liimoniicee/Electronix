<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$id = $_POST['swal-input1'];
$pre = $_POST['swal-input19'];
$man = $_POST['swal-input20'];
$abo = $_POST['swal-input21'];
$res = $_POST['swal-input22'];
$tot = $_POST['swal-input23'];
$est = $_POST['swal-input24'];

$sql = "Update reparar_tv set presupuesto ='$pre', mano_obra ='$man', abono='$abo', restante= '$res', costo_total='$tot', estado='$est' where id_equipo='$id'";



$res = $conn->query($sql);

if (!$res) {
   printf("Errormessage: %s\n", $conn->error);
}
else{

  echo "<script>window.open('taller.php','_self')</script>";}

?>
