<?php   
include 'check_sesion.php';
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

$id_equipo = $_POST ['swal-input1'];
$equipo = $_POST ['equipo'];
$marca= $_POST ['marca'];
$modelo = $_POST ['modelo'];
$serie = $_POST ['serie'];
$accesorios = $_POST ['accesorios'];
$falla= $_POST ['falla'];
$comentarios= $_POST ['comentarios'];
$servicio= $_POST ['servicio'];
$refaccion = $_POST ['refaccion'];
$mano= $_POST ['mano'];
$abono = $_POST ['abono'];
$restante = $_POST ['restante'];
$total= $_POST ['total'];
$valor= $_POST ['valor'];
$estado= $_POST ['estado'];
$ubicacion= $_POST ['ubicacion'];
$tecnico= $_POST ['tecnico'];
//$id_folio= $_POST ['cliente'];

if($estado=="Entregado" or $estado=="Devuelto" or $estado=="Obsequiada" or $estado=="Adjudicada" or $estado=="A cambio"){
$sql = "UPDATE reparar_tv set equipo='$equipo', marca='$marca', modelo='$modelo', serie='$serie', accesorios='$accesorios', falla='$falla', comentarios='$comentarios', fecha_egreso=CURRENT_TIMESTAMP, servicio='$servicio', presupuesto='$refaccion', mano_obra='$mano', abono='$abono', restante='$restante', costo_total='$total', valor='$valor', estado='$estado' , ubicacion='$ubicacion', id_personal='$tecnico'  where id_equipo='$id_equipo';";
 $res = $conn->query($sql);
 echo "<script>window.open('admin_editar_taller.php','_self')</script>";

}
else{
  $sql1 = "UPDATE reparar_tv set equipo='$equipo', marca='$marca', modelo='$modelo', serie='$serie', accesorios='$accesorios', falla='$falla', comentarios='$comentarios', fecha_entregar=CURRENT_TIMESTAMP, servicio='$servicio', presupuesto='$refaccion', mano_obra='$mano', abono='$abono', restante='$restante', costo_total='$total', valor='$valor', estado='$estado' , ubicacion='$ubicacion', id_personal='$tecnico'  where id_equipo='$id_equipo';";
  $res = $conn->query($sql1);
  echo "<script>window.open('admin_editar_taller.php','_self')</script>";
}

?>