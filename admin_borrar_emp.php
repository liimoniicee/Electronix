<?PHP
require 'conexion.php';
include 'fuctions.php';
header('Content-type: admin_ctrl_empleados.php; charset=UTF-8');
$response = array();

if ($_POST['delete']) {

    $id = intval($_POST['delete']);
    $query = "DELETE FROM personal WHERE id_personal='$id';";
    $stmt = $conn->prepare($query);
    $stmt->execute();

    if ($stmt) {
        $response['status']  = 'success';
 $response['message'] = 'Usuario eliminado correctamente ...';

    } else {
        $response['status']  = 'error';
 $response['message'] = 'Imposible borrar usuario ...';
    }
    echo json_encode($response);
}
