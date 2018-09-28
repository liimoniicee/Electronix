<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

//variables
$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

$id = $_POST['swal-input1'];
$pre = $_POST['swal-input19'];
$man = $_POST['swal-input20'];
$abo = $_POST['swal-input21'];
$res = $_POST['swal-input22'];
$tot = $_POST['swal-input23'];
$est = $_POST['swal-input24'];

$sql = "Update reparar_tv set presupuesto = $pre, mano_obra =$man, abono=$abo, restante= $res, costo_total= $tot, estado='$est' where id_equipo= $id;";
$res = $conn->query($sql);

if($est =='Sin solucion'){


$sql2 = "INSERT INTO traslado(estado, ubicacion, destino, id_equipo, id_personal)
VALUES ('Pendiente', 'Taller', 'Recepcion', '$id', '$var_clave');";
$res2 = $conn->query($sql2);

$sql3 = "INSERT INTO avisos(id_personal, fecha, aviso, estado, tipo)
VALUES ('$var_clave', CURRENT_TIMESTAMP, 'Equipo numero $id sin solución, en ruta a recepcion', 'Pendiente', 'Recepcion');";
$res3 = $conn->query($sql3);

}else{



$sql5 = "INSERT INTO avisos(id_personal, fecha, aviso, estado, tipo)
VALUES ('$var_clave', CURRENT_TIMESTAMP, 'Equipo numero $id reparado, traslado pendiente a recepcion, marcar a cliente', 'Pendiente', 'Recepcion');";
$res5 = $conn->query($sql5);
}

  echo "<script>window.open('taller.php','_self')</script>";

?>
