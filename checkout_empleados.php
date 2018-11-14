<?php
include'check_sesion.php';
include'conexion.php';

date_default_timezone_set('America/Mazatlan');
$diahoy = date("Y-m-d");
$horahoy = date("H:i:s");
//obtenemos la clave del usuario que desea registrar su entrada
$id = $_SESSION["clave"];
//hacemos un registro en la base de datos rellenando los campos con la hora actual, la fecha actual y la clave del usuario al que se
//asignan estos datos

$consu = "select a.personal_id_personal, p.id_personal from personal p, asistencia a
where id_personal = $id
and p.id_personal = a.personal_id_personal
and a.fecha = '$diahoy'
and a.cont_hoy = 0";

$resu = $conn->query($consu);
if($resu->num_rows > 0){

  $sql = "UPDATE asistencia SET hora_salida = '$horahoy', cont_hoy = 1 WHERE personal_id_personal = $id and fecha = '$diahoy'";

      if ($conn->query($sql) === TRUE) {
        //si la consulta devuelve un estado verdadero entonces hace lo siguiente
        ?>
         <body>
         
<head>

<link href= "assets/css/main.css" rel="stylesheet" />

</head>

<!-- Sweet Alert 2 plugin -->
<script src= "assets/js/sweetalert2.js"></script>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
         <script>
         swal({
        title: "Exito!",
        text: "Has checado salida exitosamente",
        type: "success"
        }).then(function() {
        // Redirect the user
        window.location.href = "destroy.php";

        });
             </script>
        </body>
         <?php

       } else {
         //en caso contrario, el programa regresa un error con la informacion relacionada al respecto
         ?>
          <body>
          <script>
          swal({
        title: "Error!",
        text: "Algo esta mal",
        type: "error"
        }).then(function() {
        // Redirect the user
        window.location.href = "destroy.php";

        });
              </script>
       </body>
          <?php
       }

}else{

  ?>
   <body>
   <script>
   swal({
 title: "Error!",
 text: "Ya has checado salida el día de hoy!",
 type: "error"
 }).then(function() {
 // Redirect the user
 window.location.href = "destroy.php";

 });
       </script>
</body>
   <?php



  }
    $conn->close();
    ?>
