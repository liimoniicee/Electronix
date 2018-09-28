<?PHP
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();


$ahora =  time(); //obtenemos la fecha actual a partir de la función time().
$formateado= date('Y-m-d h:i:s', $ahora) ; // obtenemos la cadena en el formato YYYY-MM-DD


$id        = $_POST ['swal-input0'];
$var_clave = $_SESSION['clave'];
$des       = $_POST ['swal-input5'];
$id_equipo = $_POST['swal-input7'];
$tipo = $_POST['swal-input11'];
$ubi = $_POST['swal-input4'];



//consulta para obtener el id del becario
$query = "UPDATE
traslado
SET
estado = 'Entregado',
ubicacion = '$des',
fecha_finalizado = '$formateado'
WHERE
id_traslado='$id'";

$res = $conn->query($query);

if($des=="Almacen"){
//cuando un equipo en reparacion  o una venta va hacia almacen(no encontró destinatario)
    $query2 = "UPDATE
    reparar_tv
    SET
    estado = 'Pendiente ruta almacen',
    id_personal = '$var_clave',
    ubicacion= '$ubi'
    WHERE
    id_equipo='$id_equipo'";
    
    $res2 = $conn->query($query2);
    
    
    $sql3 = "INSERT INTO avisos(id_personal, fecha, aviso, estado, tipo)
    VALUES ('$var_clave', CURRENT_TIMESTAMP, 'Equipo numero $id_equipo no encontrado, en ruta a almacen', 'Pendiente', 'Almacen');";
    $res3 = $conn->query($sql3);
    
    $query4 = "UPDATE
    ventas_tv
    SET
    estado = 'Pendiente ruta almacen',
    id_personal = '$var_clave',
    ubicacion= '$ubi'
    WHERE
    idventa_tv='$id_equipo' and tipo='Venta'";
    
    $res4 = $conn->query($query4);


}if($tipo=="Venta"){
//cuando una venta va en ruta al cliente
    $query7 = "UPDATE
    ventas_tv
    SET
    estado = 'Entregado',
    id_personal = '$var_clave',
    ubicacion= 'Cliente'
    WHERE
    idventa_tv='$id_equipo'";
    
    $res7 = $conn->query($query7);
    
}if($des=="Cliente"){
//cuando va la entrega deun equipo en reparacion va a cliente
$query8 = "UPDATE
reparar_tv
SET
estado = 'Entregado',
id_personal = '$var_clave',
ubicacion= 'Cliente'
WHERE
id_equipo='$id_equipo'";
    
    $res8 = $conn->query($query8);
  

}if($des=="Taller"){

    //enquipo en reparacion cuando se mueve hacia el taller
    $query6 = "UPDATE
    reparar_tv
    SET
    estado = 'Pendiente',
    id_personal = '$var_clave',
    ubicacion= '$des'
    WHERE
    id_equipo='$id_equipo'";
    
    $res6 = $conn->query($query6);
    
    
}else{


}


if (!$res) {
   printf("Errormessage: %s\n", $conn->error);
}
else{header("Location: traslados.php");}
?>
