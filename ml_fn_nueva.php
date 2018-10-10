
<head>

 <!--  Paper Dashboard core CSS    -->
 <link href="assets/css/main.css" rel="stylesheet"/>
 </head>
<!-- Sweet Alert 2 plugin -->
<script src= "assets/js/sweetalert2.js"></script>


 <?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_clave= $_SESSION['clave'];

$tipo = $_POST['tipo'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$etiqueta1 = $_POST['etiq1'];
$etiqueta2 = $_POST['etiq2'];
$ubicacion = $_POST['ubicacion'];
$estado = $_POST['estado'];
$precio = $_POST['precio'];
$link = $_POST['link'];


$sql = "INSERT INTO refacciones_tv(tipo, marca, modelo,ubicacion, estado, precio, etiqueta_1,etiqueta_2, link, id_personal)
VALUES ('$tipo', '$marca', '$modelo', '$ubicacion', '$estado', '$precio','$etiqueta1','$etiqueta2','$link','$var_clave');";


$res = $conn->query($sql);

if (!$res) {
   printf("Errormessage: %s\n", $conn->error);
}
else{
  
/*
$micarpeta = "assets/galeria/almacen/$marca/$modelo/";
if (!file_exists($micarpeta)) {
    mkdir($micarpeta, 0777, true);
}


$imagen1 = $_FILES['img1']['tmp_name1'];
$destino = "assets/galeria/almacen/$marca/$modelo/". $_FILES['img1']['name1'];

$imagen2 = $_FILES['img2']['tmp_name2'];
$destino2 = "assets/galeria/almacen/$marca/$modelo/". $_FILES['img2']['name2'];

$imagen3 = $_FILES['img3']['tmp_name3'];
$destino3 = "assets/galeria/almacen/$marca/$modelo/". $_FILES['img3']['name3'];

$imagen4 = $_FILES['img4']['tmp_name4'];
$destino4 = "assets/galeria/almacen/$marca/$modelo/". $_FILES['img4']['name4'];

$imagen5 = $_FILES['img5']['tmp_name5'];
$destino5 = "assets/galeria/almacen/$marca/$modelo/". $_FILES['img5']['name5'];


move_uploaded_file($imagen1, $destino);
move_uploaded_file($imagen2, $destino2);
move_uploaded_file($imagen3, $destino3);
move_uploaded_file($imagen4, $destino4);
move_uploaded_file($imagen5, $destino5);
*/
?>

   <body>
   <script>
  let timerInterval
  swal({
    title: 'Subiendo imagenes',
    html: 'Se cerrara automaticamente en <strong></strong> segundos.',
    timer: 10,
    onOpen: () => {
      swal.showLoading()
      timerInterval = setInterval(() => {
        swal.getContent().querySelector('strong')
          .textContent = swal.getTimerLeft()
      }, 100)
   
    },
    onClose: () => {
      clearInterval(timerInterval)
    }
  }).then((result) => {
    if (
      // Read more about handling dismissals

      result.dismiss === swal.DismissReason.timer
    ) {
      console.log('I was closed by the timer')
     
    window.location.href = "almacen.php";
    }
  });
  </script>
</body>
  <?php

}

?>
