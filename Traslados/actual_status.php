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
