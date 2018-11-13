<?php
include'check_sesion.php';
include'fuctions.php';
include'conexion.php';
verificar_sesion();

//variables
$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

$id = $_POST['swal-input1'];

$valor = $_POST['swal-input25'];
$servicio = $_POST['swal-servicio'];



if($servicio =='Compra'){

  
    $sql7 = "INSERT INTO traslado(estado, ubicacion, destino, id_equipo, id_personal)
    VALUES ('Pendiente', 'Taller', 'Recepcion', '$id', '$var_clave');";
    $res7 = $conn->query($sql7);
    
      $sql4 = "INSERT INTO avisos(id_personal, fecha, aviso, estado, tipo)
    VALUES ('$var_clave', CURRENT_TIMESTAMP, 'Equipo numero $id valorado para compra, marcar a cliente', 'Pendiente', 'Recepcion');";
    $res4 = $conn->query($sql4);
      
    $sql5 = "UPDATE reparar_tv set valor = $valor, estado='Valorada', ubicacion='Taller en ruta a Recepcion' where id_equipo= $id;";
    $res5 = $conn->query($sql5);
      }else{

}

  echo "<script>window.open('taller.php','_self')</script>";

?>
