
<script src= "assets/js/sweetalert2.js"></script>

<?php
include 'check_sesion.php';include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

$id_equipo = $_POST['swal-input0'];
$falla = $_POST['swal-input1'];
$proc = $_POST['swal-input2'];
$estado = $_POST['swal-input3'];
$parte = $_POST['swal-input4'];
$estado2 = $_POST['swal-input5'];
$tipo= $_POST['tipo'];


$micarpeta = "assets/galeria/reporte/$var_clave/$id_equipo";
if (!file_exists($micarpeta)) {
    mkdir($micarpeta, 0777, true);
}


$imagen1 = $_FILES['swal-input6']['tmp_name'];
$destino = "assets/galeria/reporte/$var_clave/$id_equipo/". $_FILES['swal-input6']['name'];

$imagen2 = $_FILES['swal-input7']['tmp_name'];
$destino2 = "assets/galeria/reporte/$var_clave/$id_equipo/". $_FILES['swal-input7']['name'];

$imagen3 = $_FILES['swal-input8']['tmp_name'];
$destino3 = "assets/galeria/reporte/$var_clave/$id_equipo/". $_FILES['swal-input8']['name'];

move_uploaded_file($imagen1, $destino);
move_uploaded_file($imagen2, $destino2);
move_uploaded_file($imagen3, $destino3);





if($estado == 'Necesita refaccion'){
  $sql1 = "INSERT INTO reportes_tecnicos (falla_especifica, solucion_especifica, conclusion,solicitud, parte, estado, imagen1,imagen2,imagen3, id_personal, id_equipo)
  VALUES ('$falla', '$proc', '$estado','pendiente','$parte','$estado2','$destino','$destino2','$destino3','$var_clave','$id_equipo');";

  $res1 = $conn->query($sql1);

  $sql4 = "INSERT INTO solicitudes_refacciones (tipo, etiqueta, solicitud, estado, ubicacion, id_personal,id_equipo,)
  VALUES ('$tipo', '$parte', 'Pendiente','Autorizacion pendiente','$var_clave','$id_equipo');";

  $res4 = $conn->query($sql4);


  $sql = "UPDATE reparar_tv set estado='Diagnosticada' where id_equipo='$id_equipo';";
  $res = $conn->query($sql);

   echo "<script>window.open('tecnico.php','_self')</script>";
}else{
  $sql2 = "INSERT INTO reportes_tecnicos (falla_especifica, solucion_especifica, conclusion, solicitud, parte, estado, imagen1,imagen2,imagen3, id_personal, id_equipo)
  VALUES ('$falla', '$proc', '$estado','NA','$parte','$estado2','$destino','$destino2','$destino3','$var_clave','$id_equipo');";


  $res2 = $conn->query($sql2);

  $sql5 = "UPDATE reparar_tv set estado='Diagnosticada' where id_equipo='$id_equipo';";
  $res = $conn->query($sql5);

 
   echo "<script>window.open('tecnico.php','_self')</script>";

}
