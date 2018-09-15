<?PHP
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();


$ahora =  time(); //obtenemos la fecha actual a partir de la función time().
$formateado= date('Y-m-d h:i:s', $ahora) ; // obtenemos la cadena en el formato YYYY-MM-DD


$id        = $_POST ['swal-input0'];
$equi = $_POST ['swal-input7'];
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

//consulta para obtener el id del becario
$query1 = "UPDATE
reparar_tv
SET
ubicacion = '$des'
WHERE
id_equipo='$equi'";

$res1 = $conn->query($query1);



if (!$res) {
   printf("Errormessage: %s\n", $conn->error);
}
if (!$res1) {
   printf("Errormessage: %s\n", $conn->error);
}
else{header("Location: traslados_entregados.php");}
?>
