<!-- Sweet Alert 2 plugin -->
<script src= "assets/js/sweetalert2.js"></script>

<?php

require 'conexion.php';


$nom = $_POST['nom'];
$ape = $_POST['ape'];
$cor = $_POST['cor'];
$cel = $_POST['cel'];
$dire = $_POST['dire'];


$sql = "INSERT INTO clientes (id_folio, nombre, apellidos, direccion, correo, celular, fecha, puntos)
VALUES (NULL, '$nom', '$ape', '$dire', '$cor', '$cel', CURRENT_TIMESTAMP, '0');";



$res = $conn->query($sql);



if (!$res) {
   printf("Errormessage: %s\n", $conn->error);
}
else{
  ?>
   <body>
   <script>
   swal({
  title: "Success",
  text: "Usuario registrado",
  type: "success"
  }).then(function() {
  // Redirect the user
  window.location.href = "recepcion.php";
  console.log('The Ok Button was clicked.');
  });
       </script>
  </body>
   <?php
   }
?>
