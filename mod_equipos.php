<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();


$response = array();
if(isset($_POST['id'])){
  $id = $_POST['id'];


  $consulta = "SELECT
id_equipo, id_personal,nombre,apellidos,celular,correo, equipo, marca, modelo,serie, accesorios, falla, comentarios, fecha_ingreso,fecha_entregar, servicio,ubicacion,presupuesto,mano_obra,abono,restante,costo_total,estado 
FROM clientes LEFT JOIN reparar_Tv USING(id_folio) where estado = 'Reparada'and id_folio = '$id_folio'			
union all SELECT id_equipo, id_personal,nombre,apellidos,celular,correo, equipo, marca, modelo,serie, accesorios, falla, comentarios, fecha_ingreso,fecha_entregar, servicio,ubicacion,presupuesto,mano_obra,abono,restante,costo_total,estado 
FROM clientes LEFT JOIN reparar_otros USING(id_folio) where estado = 'Reparada'and id_folio = '$id_folio';";


   $resultado = $conn->query($consulta);


   if($resultado->num_rows > 0){

    while($row = $resultado->fetch_assoc()) {
  $response['data'] = array (
    "id"         =>  $id,
    "equipo"        =>  $row["equipo"],
    "marca"        =>  $row["marca"],
    "modelo"        =>  $row["modelo"],
    "serie"        =>  $row["serie"],
    "accesorios"        =>  $row["accesorios"],
    "falla"        =>  $row["falla"],
    "comentarios"        =>  $row["comentarios"],

    "fecha_ingreso"        =>  $row["fecha_ingreso"],
    "fecha_entrega"        =>  $row["fecha_entrega"],
    "fecha_egreso"        =>  $row["fecha_egreso"],

    "servicio"        =>  $row["servicio"],
    "ubicacion"        =>  $row["ubicacion"],

    "presupuesto"        =>  $row["presupuesto"],
    "mano_obra"        =>  $row["mano_obra"],
    "abono"        =>  $row["abono"],
    "restante"        =>  $row["restante"],
    "costo_total"        =>  $row["costo_total"],
    "estado"        =>  $row["estado"],


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
