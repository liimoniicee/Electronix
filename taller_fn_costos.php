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
$val = $_POST['swal-input25'];

$recepcion ="SELECT r.colonia
FROM reparar_tv p, recepciones r
WHERE p.id_folio =$id
AND p.rec_id_recepcion = r.id_recepcion
ORDER BY fecha_ingreso desc";

 $resu = $conn->query($recepcion);
 if($resu->num_rows > 0){
 
  while($row = $resu->fetch_assoc()) {
    $sux   =  $row["colonia"];
   }
  }


if($est =='Sin solucion'){


  $sql1 = "INSERT INTO traslado(estado, ubicacion, destino, id_equipo, id_personal)
  VALUES ('Pendiente', 'Taller', 'Recepcion $sux', '$id', '$var_clave');";
  $res1 = $conn->query($sql1);

$sql2 = "INSERT INTO avisos(id_personal, fecha, aviso, estado, tipo)
VALUES ('$var_clave', CURRENT_TIMESTAMP, 'Equipo numero $id sin solución, en ruta a recepcion, solicitar cambio a cliente', 'Pendiente', 'Recepcion');";
$res2 = $conn->query($sql2);

$sql3 = "UPDATE reparar_tv set presupuesto ='$pre', mano_obra ='$man', abono='$abo', restante='$res', costo_total='$tot', valor='$val', estado='$est', ubicacion='Taller en ruta a Recepcion' where id_equipo='$id';";
$res3 = $conn->query($sql3);

}elseif($est =='Reparada'){

  
$sql7 = "INSERT INTO traslado(estado, ubicacion, destino, id_equipo, id_personal)
VALUES ('Pendiente', 'Taller', 'Recepcion $sux', '$id', '$var_clave');";
$res7 = $conn->query($sql7);

  $sql4 = "INSERT INTO avisos(id_personal, fecha, aviso, estado, tipo)
VALUES ('$var_clave', CURRENT_TIMESTAMP, 'Equipo numero $id reparado traslado pendiente a recepcion marcar a cliente', 'Pendiente', 'Recepcion');";
$res4 = $conn->query($sql4);
  
$sql5 = "UPDATE reparar_tv set presupuesto ='$pre', mano_obra ='$man', abono='$abo', restante='$res', costo_total= '$tot', valor='$val', estado='$est', ubicacion='Taller en ruta a Recepcion' where id_equipo='$id';";
$res5 = $conn->query($sql5);
  }else{

$sql6 = "INSERT INTO avisos(id_personal, fecha, aviso, estado, tipo)
VALUES ('$var_clave', CURRENT_TIMESTAMP, 'Equipo numero $id necesita refaccion, traslado pendiente a recepcion, marcar a cliente', 'Pendiente', 'Mercado libre');";
$res6 = $conn->query($sql6);

$sql8 = "UPDATE reparar_tv set presupuesto ='$pre', mano_obra ='$man', abono='$abo', restante='$res', costo_total= '$tot', valor='$val', estado='$est', ubicacion='Taller en espera de refacción' where id_equipo='$id';";
$res8 = $conn->query($sql8);

$sql9 = "INSERT INTO solicitudes_refacciones(id_personal, fecha, aviso, estado, tipo)
VALUES ('$var_clave', CURRENT_TIMESTAMP, 'Equipo numero $id necesita refaccion, traslado pendiente a recepcion, marcar a cliente', 'Pendiente', 'Mercado libre');";
$res9 = $conn->query($sql9);

}

  echo "<script>window.open('taller.php','_self')</script>";

?>
