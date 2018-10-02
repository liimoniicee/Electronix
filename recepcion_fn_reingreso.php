<?php   
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

$id = $_POST ['swal-input00'];
$id_equipo = $_POST ['swal-input1'];
$nom = $_POST ['swal-input3'];
$ape= $_POST ['swal-input4'];
$equipo = $_POST ['swal-input6'];
$marca= $_POST ['swal-input7'];
$modelo = $_POST ['swal-input8'];
$serie = $_POST ['swal-input9'];
$falla= $_POST ['swal-input12'];
$costo_total= $_POST ['swal-input23'];

$ahora =  time(); //obtenemos la fecha actual a partir de la función time().
$formateado= date('Y-m-d h:i:s', $ahora) ; // obtenemos la cadena en el formato YYYY-MM-DD



$sql = "UPDATE reparar_tv set estado='Pendiente', ubicacion='Recepcion', servicio='Garantia', restante='0', abono='0',presupuesto='0', mano_obra='0' ,fecha_ingreso=CURRENT_TIMESTAMP, fecha_entregar='Null' where id_equipo='$id_equipo';";
 $res = $conn->query($sql);

 $sql2 = "INSERT INTO traslado(estado, ubicacion, destino, id_equipo, id_folio, personal_id_personal)
 VALUES ('Pendiente', 'Recepcion', 'Taller', '$id_equipo', '$id', '$var_clave');";
 $res2 = $conn->query($sql2);

 $sql3 = "INSERT INTO avisos(id_personal, aviso, estado, tipo)
 VALUES ('$var_clave', 'Equipo nuevo en recepcion con garantía, pasa a recojer', 'Pendiente', 'Traslados');";
 $res3 = $conn->query($sql3);

 $sql4 = "INSERT INTO avisos(id_personal, aviso, estado, tipo)
 VALUES ('$var_clave', 'Equipo $id_equipo reingresado por garantia en recepcion pendiente traslado a taller', 'Pendiente', 'Taller');";
 $res4 = $conn->query($sql4);
//checar la validacion(no funciona el else:v)


echo "<script>window.open('recepcion_historial_cliente.php?id=$id','_self')</script>";

?>