<<<<<<< HEAD
<?PHP

require 'conexion.php';

include 'fuctions.php';

$id = $_POST ['swal-input0'];


//consulta para obtener el id del becario
$query = "UPDATE
traslado
SET
estado = 'Coleccion',
id_personal = '$id'
WHERE
id_traslado='$id';";

$res = $conn->query($query);



if (!$res) {
   printf("Errormessage: %s\n", $conn->error);
}
else{header("Location: traslados.php");}
?>
=======
<?PHP
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$id = $_POST ['swal-input0'];
$ubi = $_POST ['swal-input4'];
$equi = $_POST ['swal-input7'];
$car = $_POST['swal-input8'];
$var_clave= $_SESSION['clave'];

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


//consulta para obtener el id del becario
$query1 = "UPDATE
reparar_tv
SET
ubicacion = 'En recoleccion a $ubi'
WHERE
id_equipo='$equi'";

$res1 = $conn->query($query1);



if (!$res) {
   printf("Errormessage: %s\n", $conn->error);
}
if (!$res1) {
   printf("Errormessage: %s\n", $conn->error);
}
else{header("Location: traslados.php");}
?>
>>>>>>> 202be7731da563dabcb857ed2faab0606f2a1a8a
