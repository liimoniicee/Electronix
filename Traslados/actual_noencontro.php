<?PHP
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();


$ahora =  time(); //obtenemos la fecha actual a partir de la función time().
$formateado= date('Y-m-d h:i:s', $ahora) ; // obtenemos la cadena en el formato YYYY-MM-DD


$var_clave = $_SESSION['clave'];

$response = array();
if ($_POST['delete']) {

    $id = intval($_POST['delete']);
    $query = "UPDATE
    traslado
    SET
    estado = 'Pendiente',
    ubicacion = 'Almacen',
    comentarios = 'Cliente no encontrado de vuelta a almacen',
    fecha_finalizado = '$formateado'
    WHERE
    id_traslado='$id'";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    if ($stmt) {
        $response['status']  = 'success';
 $response['message'] = 'Product Deleted Successfully ...';

    } else {
        $response['status']  = 'error';
 $response['message'] = 'Unable to delete product ...';
    }
    echo json_encode($response);
}
