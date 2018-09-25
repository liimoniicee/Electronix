<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();


$response = array();
if(isset($_POST['id'])){
  $id = $_POST['id'];


  $consulta = "SELECT r.idventa_tv, r.marca, ,r.modelo, c.nombre, c.apellidos, r.serie, r.costo,  r.estado, r.id_personal,r.idvendedor, r.ubicacion,
  r.id_equipo, r.id_folio, r.tipo, r.abono

FROM clientes c, ventas_tv r
WHERE r.idventa_tv = $id
and c.id_folio = r.id_folio";

   $resultado = $conn->query($consulta);


   if($resultado->num_rows > 0){

    while($row = $resultado->fetch_assoc()) {
  $response['data'] = array (
    "id"         =>  $id,
    "id_v"       =>  $row["idventa_tv"],
    "marca"       =>  $row["marca"],
    "modelo"      =>  $row["modelo"],
    "nom"         =>  $row["nombre"],
    "ape"         =>  $row["apellidos"],
    "serie"       =>  $row["serie"],
    "costo"       =>  $row["costo"],
    "estado"      =>  $row["estado"],
    "id_personal"  =>  $row["id_personal"],
    "idvendedor"  =>  $row["idvendedor"],
    "ubicacion"   =>  $row["ubicacion"],
    "id_equipo"   =>  $row["id_equipo"],
    "id_folio"   =>  $row["id_folio"],
    "tipo"        =>  $row["tipo"],
    "abono"       =>  $row["abono"],
    
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
