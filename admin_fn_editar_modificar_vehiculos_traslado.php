<?php
include 'check_sesion.php';
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();


$response = array();
if(isset($_POST['id'])){
  $id = $_POST['id'];

$consulta = "SELECT * FROM carros WHERE id_carro=$id";


   $resultado = $conn->query($consulta);


   if($resultado->num_rows > 0){

    while($row = $resultado->fetch_assoc()) {
  $response['data'] = array (

    "id_carro"          =>  $id,
    "marca"         =>  $row["car_id_marca"],
    "modelo"        =>  $row["car_modelo"],
    "ano"         =>  $row["car_ano"],
    "tipo"        =>  $row["car_tipo"],
    "estado"         =>  $row["car_estado"],
    "personal"         =>  $row["id_personal_traslado"],
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
