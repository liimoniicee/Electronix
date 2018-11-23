<?php   
include'check_sesion.php';
include'fuctions.php';
include'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

$id = $_POST ['id'];
$tip = $_POST ['tipo'];
$usu = $_POST ['usuario'];
$pass= $_POST ['pass'];
$nom= $_POST ['nom'];
$ape = $_POST ['ape'];
$cor = $_POST ['cor'];
$cel = $_POST ['cel'];
$sue = $_POST ['sue'];
$sucu = $_POST ['sucu'];



$sql = "UPDATE personal SET tipo='$tip', usuario='$usu', contrasena='$pass',
nombre='$nom', apellidos='$ape', correo='$cor', celular='$cel', sueldo='$sue', rec_id_recepcion='$sucu' WHERE id_personal='$id';";
$res = $conn->query($sql);


if (!$res) {
    printf("Errormessage: %s\n", $conn->error);
 }
 else{
    echo "<script>window.open('admin_ctrl_empleados.php','_self')</script>";
}




?>