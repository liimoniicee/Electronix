<?PHP
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$id = $_POST ['swal-input0'];
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



if (!$res) {
   printf("Errormessage: %s\n", $conn->error);
}
else{header("Location: traslados.php");}
?>