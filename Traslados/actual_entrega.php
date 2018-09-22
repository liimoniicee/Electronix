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


$sql3 = "INSERT INTO avisos(id_personal, fecha, aviso, estado, tipo)
VALUES ('$var_clave', current_time, 'Equipo nuevo en taller', 'Pendiente', 'Taller');";
$res3 = $conn->query($sql3);


if (!$res) {
   printf("Errormessage: %s\n", $conn->error);
}
else{header("Location: traslados.php");}
?>
