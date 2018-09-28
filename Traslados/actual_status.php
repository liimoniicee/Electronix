<?PHP
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$id = $_POST ['swal-input0'];
$car = $_POST['swal-input8'];
$var_clave= $_SESSION['clave'];
$id_equipo = $_POST['swal-input7'];
$tipo = $_POST['swal-input11'];
$ubi = $_POST['swal-input4'];


//consulta para obtener el id del becario
$query = "UPDATE
traslado
SET
estado = 'Recoleccion',
id_personal = '$var_clave',
id_carro = '$car'
WHERE
id_traslado='$id'";
$res = $conn->query($query);



if($tipo == "Venta"){

    $query2 = "UPDATE ventas_tv SET  id_personal = '$var_clave', ubicacion = '$ubi esperando traslado' WHERE idventa_tv='$id_equipo'";
    $res2 = $conn->query($query2);

}else{

    $query3 = "UPDATE reparar_tv SET  id_personal = '$var_clave', ubicacion = '$ubi esperando traslado' WHERE id_equipo='$id_equipo'";
    $res3 = $conn->query($query3);

}


if (!$res) {
   printf("Errormessage: %s\n", $conn->error);
}
else{header("Location: traslados.php");}
?>
