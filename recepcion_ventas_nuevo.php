<!-- Sweet Alert 2 plugin -->
<script src= "assets/js/sweetalert2.js"></script>

<?php
include 'check_sesion.php';
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];


$marc = $_POST['marc'];
$mod = $_POST['mod'];
$ser = $_POST['ser'];
$cost = $_POST['costo'];

$micarpeta = "assets/galeria/venta/$marc/$mod/$ser";
if (!file_exists($micarpeta)) {
    mkdir($micarpeta, 0777, true);
}

$archivo = $_FILES['img']['tmp_name'];
$destino = "assets/galeria/venta/$marc/$mod/$ser/". $_FILES['img']['name'];
move_uploaded_file($archivo, $destino);

$sql = "INSERT INTO ventas_tv (marca, modelo, serie, costo, imagen1, fecha_alta, estado, id_personal)
VALUES ('$marc', '$mod', '$ser', '$cost', '$destino', CURRENT_TIMESTAMP, 'En venta','$var_clave');";



$res = $conn->query($sql);



if (!$res) {
   printf("Errormessage: %s\n", $conn->error);
}
else{
  //echo "<script>alert('Usuario agregado exitosamente con el folio=$')</script>";
  echo "<script>window.open('recepcion_ventas.php','_self')</script>";}

?>
