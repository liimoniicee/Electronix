<?php
include'check_sesion.php';
include'fuctions.php';
include'conexion.php';
verificar_sesion();


$response = array();
if(isset($_POST['id'])){
  $id = $_POST['id'];


  $consulta = "SELECT * FROM personal WHERE id_personal = $id";


   $resultado = $conn->query($consulta);


   if($resultado->num_rows > 0){

    while($row = $resultado->fetch_assoc()) {
  $response['data'] = array (

    "usu"        =>  $row["usuario"],
    "pass"       =>  md5($row["contrasena"]),
    "nom"        =>  $row["nombre"],
    "ape"        =>  $row["apellidos"],
    "cel"        =>  $row["celular"],
    "cor"        =>  $row["correo"],
    "sucu"        =>  $row["rec_id_recepcion"],


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
