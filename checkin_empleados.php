<?php
include'check_sesion.php';
include'conexion.php';

date_default_timezone_set('America/Mazatlan');
$diahoy = date("Y-m-d");
$horahoy = date("H:i:s");

//obtenemos la clave del usuario que desea registrar su entrada
$id = $_SESSION["clave"];
$tipo = $_SESSION["tipo"];


$consu = "select a.personal_id_personal, p.id_personal from personal p, asistencia a
where id_personal = $id
and p.id_personal = a.personal_id_personal
and a.fecha = '$diahoy'";

$resu = $conn->query($consu);
if($resu->num_rows > 0){
  ?>
  <head>

<!--  Paper Dashboard core CSS    -->
<link href="assets/css/main.css" rel="stylesheet"/>
</head>
<!-- Sweet Alert 2 plugin -->
<script src= "assets/js/sweetalert2.js"></script>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

   <body>
   <script>
   swal({
 title: "Error!",
 text: "ya has checado entrada el día de hoy!",
 type: "error"
 }).then(function() {
 // Redirect the user
 <?php
 if($tipo == "Administrador"){
  ?>
 window.location.href = "administrador.php";
<?php }elseif($tipo == "Traslado"){ ?>

window.location.href = "traslados/traslados.php";

  <?php }elseif($tipo == "Recepcion"){ ?>

    window.location.href = "recepcion.php";

      <?php }elseif($tipo == "Tecnico"){ ?>

        window.location.href = "tecnico.php";

          <?php }elseif($tipo == "Jefe de Taller"){ ?>

            window.location.href = "Taller.php";

              <?php }elseif($tipo == "Almacen"){ ?>

                window.location.href = "almacen.php";

                <?php } ?>

 });
       </script>
</body>
   <?php


}else{


//hacemos un registro en la base de datos rellenando los campos con la hora actual, la fecha actual y la clave del usuario al que se
//asignan estos datos
$sql = "INSERT INTO asistencia (fecha, hora_entrada, hora_salida, personal_id_personal)
        VALUES('$diahoy', '$horahoy', NULL, '$id')";
//si la consulta devuelve un estado verdadero entonces hace lo siguiente
    if ($conn->query($sql) === TRUE) {
      ?>
       <body>
       <script>
       swal({
      title: "Exito!",
      text: "Has checado entrada exitosamente",
      type: "success"
      }).then(function() {
      // Redirect the user
      <?php
 if($tipo == "Administrador"){
  ?>
      window.location.href = "administrador.php";
     <?php }elseif($tipo == "Traslado"){ ?>

     window.location.href = "traslados/traslados.php";

       <?php }elseif($tipo == "Recepcion"){ ?>

         window.location.href = "recepcion.php";

           <?php }elseif($tipo == "Tecnico"){ ?>

             window.location.href = "tecnico.php";

               <?php }elseif($tipo == "Jefe de Taller"){ ?>

                 window.location.href = "Taller.php";

                   <?php }elseif($tipo == "Almacen"){ ?>

                     window.location.href = "almacen.php";

                     <?php } ?>
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
     text: "Algo esta mal <?php echo $horahoy , $diahoy; ?>",
     type: "error"
     }).then(function() {
     // Redirect the user
     <?php
 if($tipo == "Administrador"){
  ?>
     window.location.href = "administrador.php";
    <?php }elseif($tipo == "Traslado"){ ?>

    window.location.href = "traslados/traslados.php";

      <?php }elseif($tipo == "Recepcion"){ ?>

        window.location.href = "recepcion.php";

          <?php }elseif($tipo == "Tecnico"){ ?>

            window.location.href = "tecnico.php";

              <?php }elseif($tipo == "Jefe de Taller"){ ?>

                window.location.href = "Taller.php";

                  <?php }elseif($tipo == "Almacen"){ ?>

                    window.location.href = "almacen.php";

                    <?php } ?>
     });
           </script>
    </body>
       <?php
    }
  }
    $conn->close();
    ?>
