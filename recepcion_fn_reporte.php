<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();


$response = array();
if(isset($_POST['id_equipo'])){
  $id_equipo = $_POST['id_equipo'];

  /*$consulta = "SELECT
  id_equipo,id_personal,nombre,apellidos,celular,correo,equipo,marca,modelo,serie,accesorios,falla,comentarios,fecha_ingreso,fecha_entregar,servicio,ubicacion,presupuesto,mano_obra,abono,restante,costo_total,estado
  FROM clientes LEFT JOIN reparar_Tv USING(id_folio) where estado = 'Reparada'and id_folio = $id
  union all SELECT id_equipo, id_personal,nombre,apellidos,celular,correo, equipo, marca, modelo,serie, accesorios, falla, comentarios, fecha_ingreso,fecha_entregar, servicio,ubicacion,presupuesto,mano_obra,abono,restante,costo_total,estado
  FROM clientes LEFT JOIN reparar_otros USING(id_folio) where estado = 'Reparada'and id_folio = $id";*/
$consulta = "SELECT * from reportes_tecnicos where id_equipo = $id_equipo";
              

   $resultado = $conn->query($consulta);


   if($resultado->num_rows > 0){

    while($row = $resultado->fetch_assoc()) {
  $response['data'] = array (
    "id_equipo"          =>  $id_equipo,
    "falla"        =>  $row["falla_especifica"],
    "solu"       =>  $row["solucion_especifica"],
    "conc"         =>  $row["conclusion"],
    "fech"         =>  $row["fecha"],
    "soli"         =>  $row["solicitud"],
    "part"         =>  $row["parte"],
    "pers"         =>  $row["id_personal"],


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
