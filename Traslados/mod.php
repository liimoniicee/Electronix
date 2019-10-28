<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();


$response = array();
if(isset($_POST['id'])){
  $id = $_POST['id'];


  $consulta = "SELECT * FROM traslado WHERE id_traslado = $id";


   $resultado = $conn->query($consulta);


   if($resultado->num_rows > 0){

    while($row = $resultado->fetch_assoc()) {
  $response['data'] = array (
    "id"         =>  $id,
    "sta"        =>  $row["estado"],
    "dir"        =>  $row["direccion"],
    "com"        =>  $row["comentarios"],
    "ubi"        =>  $row["ubicacion"],
    "des"        =>  $row["destino"],
    "fech"       =>  $row["fecha_solicitud"],
    "equ"        =>  $row["id_equipo"],
    "car"        =>  $row["id_carro"],
    "per"        =>  $row["id_personal"],
    "fol"        =>  $row["id_folio"],
    "tipo"       =>  $row["tipo"]

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
