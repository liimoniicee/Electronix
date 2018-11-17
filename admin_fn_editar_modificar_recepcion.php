<?php   
include'check_sesion.php';
include'fuctions.php';
include'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

$id = $_POST ['swal-input0'];
$col = $_POST ['col'];
$cal= $_POST ['cal'];
$cp= $_POST ['cp'];
$ciu = $_POST ['ciu'];
$est = $_POST ['estado'];
$sit = $_POST ['sit'];


$sql = "UPDATE recepciones SET colonia='$col', calles='$cal', cp='$cp',
ciudad='$ciu', estado='$est', situacion='$sit' WHERE id_recepcion='$id';";
$res = $conn->query($sql);


if (!$res) {
    printf("Errormessage: %s\n", $conn->error);
 }
 else{
    echo "<script>window.open('admin_editar_recepciones.php','_self')</script>";
}




?>