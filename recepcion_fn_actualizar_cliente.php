<?php
include'check_sesion.php';
include'fuctions.php';
include'conexion.php';
verificar_sesion();


$response = array();
if(isset($_POST['id'])){
  $id = $_POST['id'];


  $consulta = "SELECT * FROM clientes WHERE id_folio = $id";


   $resultado = $conn->query($consulta);


   if($resultado->num_rows > 0){

    while($row = $resultado->fetch_assoc()) {
  $response['data'] = array (
    "id"         =>  $id,
    "nom"        =>  $row["nombre"],
    "ape"        =>  $row["apellidos"],
    "dir"        =>  $row["direccion"],
    "cel"        =>  $row["celular"],
    "cor"        =>  $row["correo"],
    "pun"        =>  $row["puntos"],


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
