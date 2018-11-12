<?php   
include 'check_sesion.php';
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

$var_name=$_SESSION['nombre'];
$var_clave= $_SESSION['clave'];

$id = $_POST ['swal-input0'];

$personal= $_POST ['personal'];

$check ="SELECT * FROM carros where id_personal_traslado=$personal";
$resu = $conn->query($check);
if($resu->num_rows > 0){
    ?>
    <body>
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
 <script src="assets/js/sweetalert2.all.min.js"></script>
 <script src="assets/js/sweetalert2.js"></script>
 <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <script>
      swal({
        type: 'error',
        title: 'Oops...',
        text: 'Este vehículo ya fue asignado a un personal de traslado  ',
      }).then(function() {
      // Redirect the user
      window.location.href = "admin_editar_vehiculos.php";
      console.log('The Ok Button was clicked.');
      });
    </script>
    </body>
    
    <?php
    echo "<script>window.open('admin_editar_vehiculos.php','_self')</script>";
    

}else{




$sql = "UPDATE carros set id_personal_traslado='$personal' where id_carro='$id';";
$res = $conn->query($sql);
 

 echo "<script>window.open('admin_editar_vehiculos.php','_self')</script>";

}
 
?>