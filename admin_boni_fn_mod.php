<?php
include'check_sesion.php';
include'fuctions.php';
include'conexion.php';
verificar_sesion();


$response = array();
if(isset($_POST['id'])){
  $id = $_POST['id'];
  date_default_timezone_set('America/Mazatlan');
  $mes = date("m");
  $week = date("W");

  $consulta = "SELECT id_personal, sum(mano_obra) as mano_obra, sum(costo_total) as total
  from reparar_tv WHERE id_personal = $id and week(fecha_egreso)= $week";


   $resultado = $conn->query($consulta);


   if($resultado->num_rows > 0){

    while($row = $resultado->fetch_assoc()) {
  $response['data'] = array (


    "man"       =>  $row["mano_obra"],
    "total"        =>  $row["total"],
  );
   }
   }

  $response['codigo'] = 1;
  $response['msj'] = "El id se recibio ".$id;
}
else{
  $response['codigo'] = 0;
  $response['msj'] = "Error no se recibio el id";
}

echo json_encode($response);

 ?>
