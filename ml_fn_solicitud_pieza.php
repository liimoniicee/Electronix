<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();


$response = array();
if(isset($_POST['id_equipo'])){
  $id_equipo = $_POST['id_equipo'];

$consulta = "SELECT marca, modelo, parte FROM reparar_tv r, reportes_tecnicos e WHERE r.id_equipo = e.id_equipo and r.id_equipo = $id_equipo";


   $resultado = $conn->query($consulta);


   if($resultado->num_rows > 0){

    while($row = $resultado->fetch_assoc()) {
  $response['data'] = array (

    "marc"        =>  $row["marca"],
    "mod"         =>  $row["modelo"],
    "par"         =>  $row["parte"],

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
