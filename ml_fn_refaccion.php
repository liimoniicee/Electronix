<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();


$response = array();
if(isset($_POST['Id_refacciones'])){
  $id_ref = $_POST['Id_refacciones'];

$consulta = "SELECT * FROM refacciones_tv WHERE Id_refaccion=$id_ref";


   $resultado = $conn->query($consulta);


   if($resultado->num_rows > 0){

    while($row = $resultado->fetch_assoc()) {
  $response['data'] = array (

    "Id_refacciones"          =>  $id_ref,
    "link"        =>  $row["link"],
    "nombre"         =>  $row["nombre"],
    "marca"         =>  $row["marca"],
    "modelo"        =>  $row["modelo"],
    "cantidad"         =>  $row["cantidad"],
    "ubicacion"         =>  $row["ubicacion"],
    "estado"        =>  $row["estado"],
    "precio"         =>  $row["precio"],
    "fecha_entrada"         =>  $row["fecha_entrada"],
    "fecha_salida"        =>  $row["fecha_salida"],
    "etiqueta_1"         =>  $row["etiqueta_1"],
    "etiqueta_2"         =>  $row["etiqueta_2"],
    "id_personal"         =>  $row["id_personal"],


  );
   }
   }

  $response['codigo'] = 1;
  $response['msj'] = "El id se recibio ".$id_ref;
}
else{
  $response['codigo'] = 0;
  $response['msj'] = "Error no se recibio el id";
}

echo json_encode($response);

 ?>
