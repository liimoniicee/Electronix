<?php
include'check_sesion.php';
include'fuctions.php';
include'conexion.php';
verificar_sesion();


$response = array();
if(isset($_POST['id'])){
  $id = $_POST['id'];

  /*$consulta = "SELECT
  id_equipo,id_personal,nombre,apellidos,celular,correo,equipo,marca,modelo,serie,accesorios,falla,comentarios,fecha_ingreso,fecha_entregar,servicio,ubicacion,presupuesto,mano_obra,abono,restante,costo_total,estado
  FROM clientes LEFT JOIN reparar_Tv USING(id_folio) where estado = 'Reparada'and id_folio = $id
  union all SELECT id_equipo, id_personal,nombre,apellidos,celular,correo, equipo, marca, modelo,serie, accesorios, falla, comentarios, fecha_ingreso,fecha_entregar, servicio,ubicacion,presupuesto,mano_obra,abono,restante,costo_total,estado
  FROM clientes LEFT JOIN reparar_otros USING(id_folio) where estado = 'Reparada'and id_folio = $id";*/
$consulta = "SELECT r.id_equipo, r.id_personal,c.id_folio, c.nombre, c.apellidos, c.celular, c.correo,c.puntos,r.equipo, r.marca, r.modelo,r.serie, r.accesorios,
                    r.falla, r.comentarios, r.fecha_ingreso, r.fecha_entregar, r.fecha_egreso, r.servicio,
                    r.ubicacion, r.presupuesto, r.mano_obra, r.abono, r.restante, r.costo_total,r.valor, r.estado
              FROM clientes c, reparar_tv r
              WHERE r.id_equipo = $id
              and c.id_folio = r.id_folio";

   $resultado = $conn->query($consulta);


   if($resultado->num_rows > 0){

    while($row = $resultado->fetch_assoc()) {
  $response['data'] = array (
    "id"          =>  $id,
    "id_e"        =>  $row["id_equipo"],
    "id_pe"       =>  $row["id_personal"],
    "id_c"        =>  $row["id_folio"],
    "nom"         =>  $row["nombre"],
    "ape"         =>  $row["apellidos"],
    "cel"         =>  $row["celular"],
    "cor"         =>  $row["correo"],
    "pun"         =>  $row["puntos"],
    "equi"         =>  $row["equipo"],
    "mar"         =>  $row["marca"],
    "mod"         =>  $row["modelo"],
    "ser"         =>  $row["serie"],
    "accesorios"    =>  $row["accesorios"],
    "falla"         =>  $row["falla"],
    "comentarios"   =>  $row["comentarios"],
    "fecha_ingreso" =>  $row["fecha_ingreso"],
    "fecha_entregar" =>  $row["fecha_entregar"],
    "fecha_egreso"  =>  $row["fecha_egreso"],
    "servicio"      =>  $row["servicio"],
    "ubicacion"     =>  $row["ubicacion"],
    "presupuesto"   =>  $row["presupuesto"],
    "mano_obra"     =>  $row["mano_obra"],
    "abono"         =>  $row["abono"],
    "restante"      =>  $row["restante"],
    "costo_total"   =>  $row["costo_total"],
    "valor"         =>  $row["valor"],
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
