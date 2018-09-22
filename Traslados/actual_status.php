<?PHP
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$id = $_POST ['swal-input0'];
$car = $_POST['swal-input8'];
$var_clave= $_SESSION['clave'];
$id_equipo = $_POST['swal-input7'];

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

$query = "UPDATE
reparar_tv
SET
estado = 'Recoleccion traslado',
id_personal = '$var_clave',
WHERE
id_equipo='$id_equipo'";

$res = $conn->query($query);



if (!$res) {
   printf("Errormessage: %s\n", $conn->error);
}
else{header("Location: traslados.php");}
?>
