<?php
include'check_sesion.php';
include'fuctions.php';
include'conexion.php';
verificar_sesion();


$response = array();
if(isset($_POST['id'])){
  $id = $_POST['id'];

$consulta = "SELECT * FROM recepciones WHERE id_recepcion=$id";


   $resultado = $conn->query($consulta);


   if($resultado->num_rows > 0){

    while($row = $resultado->fetch_assoc()) {
  $response['data'] = array (

    "id_carro"          =>  $id,
    "col"         =>  $row["colonia"],
    "cal"        =>  $row["calles"],
    "cp"         =>  $row["cp"],
    "ciu"        =>  $row["ciudad"],
    "estado"         =>  $row["estado"],
    "sit"         =>  $row["situacion"],
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
