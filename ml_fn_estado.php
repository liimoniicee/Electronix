<?php   
include'check_sesion.php';
include'fuctions.php';
include'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

$id_refaccion = $_POST ['swal-input00'];
$tipo = $_POST ['swal-input0'];
$marca = $_POST ['swal-input1'];
$modelo = $_POST ['swal-input2'];
$eti1= $_POST ['etiqueta1'];
$eti2 = $_POST ['etiqueta2'];
$ubi= $_POST ['ubicacion'];
$precio = $_POST ['precio'];
$link = $_POST ['link'];





$sql = "UPDATE refacciones_tv set estado='Publicada', tipo='$tipo', marca='$marca',
modelo='$modelo', etiqueta_1='$eti1',etiqueta_2='$eti2', ubicacion='$ubi', precio='$precio', link='$link' where Id_refacciones='$id_refaccion';";
 $res = $conn->query($sql);

  

 echo "<script>window.open('ml.php','_self')</script>";


 
?>