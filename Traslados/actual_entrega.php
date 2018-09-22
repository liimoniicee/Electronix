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

if($des == "Almacen"){

    $query2 = "UPDATE
    reparar_tv
    SET
    estado = 'Pendiente',
    id_personal = '$var_clave',
    ubicacion= 'Almacen'
    WHERE
    id_equipo='$id_equipo'";
    
    $res2 = $conn->query($query2);
    
    
    $sql3 = "INSERT INTO avisos(id_personal, fecha, aviso, estado, tipo)
    VALUES ('$var_clave', CURRENT_TIME, 'Equipo nuevo en taller', 'Pendiente', 'Almacen');";
    $res3 = $conn->query($sql3);
    
    


}else{
    $query2 = "UPDATE
    reparar_tv
    SET
    estado = 'Pendiente',
    id_personal = '$var_clave',
    ubicacion= 'Taller'
    WHERE
    id_equipo='$id_equipo'";
    
    $res2 = $conn->query($query2);
    
    
    $sql3 = "INSERT INTO avisos(id_personal, fecha, aviso, estado, tipo)
    VALUES ('$var_clave', current_time, 'Equipo nuevo en taller', 'Pendiente', 'Taller');";
    $res3 = $conn->query($sql3);
}


if (!$res) {
   printf("Errormessage: %s\n", $conn->error);
}
else{header("Location: traslados.php");}
?>
