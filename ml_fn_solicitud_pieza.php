<?php
include'check_sesion.php';
include'fuctions.php';
include'conexion.php';
verificar_sesion();


$response = array();
if(isset($_POST['id_equipo'])){
  $id_equipo = $_POST['id_equipo'];

$consulta = "SELECT marca, modelo FROM reparar_tv WHERE id_equipo = $id_equipo";


   $resultado = $conn->query($consulta);


   if($resultado->num_rows > 0){

    while($row = $resultado->fetch_assoc()) {
  $response['data'] = array (

    "marc"        =>  $row["marca"],
    "mod"         =>  $row["modelo"],

  );
   }
   }

  $response['codigo'] = 1;
  $response['msj'] = "El id se recibio ".$id_equipo;
}
else{
  $response['codigo'] = 0;
  $response['msj'] = "Error no se recibio el id";
}

echo json_encode($response);

 ?>
