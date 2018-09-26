
<head>

  <link href= "assets/css/main.css" rel="stylesheet" />

</head>

<!-- Sweet Alert 2 plugin -->
<script src= "assets/js/sweetalert2.js"></script>

<?php
//realizamos nuestra conexion con la base de datos para realizar modificaciones
include'conexion.php';
session_start();

date_default_timezone_set('America/Mazatlan');
$diahoy = date("Y-m-d");
$horahoy = date("H:i:sa");
//obtenemos la clave del usuario que desea registrar su entrada
$id = $_SESSION["clave"];
//hacemos un registro en la base de datos rellenando los campos con la hora actual, la fecha actual y la clave del usuario al que se
//asignan estos datos

$consu = "select a.personal_id_personal, p.id_personal from personal p, asistencia a
where id_personal = $id
and p.id_personal = a.personal_id_personal
and a.fecha_salida = '$diahoy'";

$resu = $conn->query($consu);
if($resu->num_rows > 0){
  ?>
   <body>
   <script>
   swal({
 title: "Error!",
 text: "ya has checado salida el día de hoy!",
 type: "error"
 }).then(function() {
 // Redirect the user
 window.location.href = "destroy.php";

 });
       </script>
</body>
   <?php


}else{

$sql = "UPDATE asistencia SET fecha_salida = CURRENT_TIMESTAMP WHERE personal_id_personal = $id and fecha_entrada = '$diahoy'";

    if ($conn->query($sql) === TRUE) {
      //si la consulta devuelve un estado verdadero entonces hace lo siguiente
      ?>
       <body>
       <script>
       swal({
      title: "Éxito!",
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
  }
    $conn->close();
    ?>
