<?php   
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

$id = $_POST ['swal-input0'];
$id_equipo = $_POST ['swal-input1'];
$nom = $_POST ['swal-input3'];
$ape= $_POST ['swal-input4'];
$equipo = $_POST ['swal-input6'];
$marca= $_POST ['swal-input7'];
$modelo = $_POST ['swal-input8'];
$serie = $_POST ['swal-input9'];
$falla= $_POST ['swal-input12'];
$costo_total= $_POST ['swal-input23'];




$sql = "UPDATE reparar_tv set estado='Entregado', ubicacion='Cliente', restante='0'  where id_equipo='$id_equipo';";
 $res = $conn->query($sql);

  

 echo "<script>window.open('recepcion_e_reparados.php','_self')</script>";


 
?>