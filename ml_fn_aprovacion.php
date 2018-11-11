<?php
include 'check_sesion.php';
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();


$response = array();
if(isset($_POST['id_equipo'])){
  $id_equipo = $_POST['id_equipo'];

$consulta = "SELECT id_solicitud,tipo,etiqueta,solicitud,estado,ubicacion,precio,id_personal,id_equipo FROM solicitudes_refacciones WHERE id_equipo = $id_equipo";


   $resultado = $conn->query($consulta);


   if($resultado->num_rows > 0){

    while($row = $resultado->fetch_assoc()) {
  $response['data'] = array (

    "id_solicitud"          =>  $id_equipo,
    "tipo"        =>  $row["tipo"],
    "etiqueta"         =>  $row["etiqueta"],
    "solicitud"        =>  $row["solicitud"],
    "estado"         =>  $row["estado"],
    "ubicacion"        =>  $row["ubicacion"],
    "precio"         =>  $row["precio"],
    "id_personal"        =>  $row["id_personal"],
    "id_equipo"         =>  $row["id_equipo"],

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
