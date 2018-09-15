<?php
include'connect.php';
if(isset($_POST["id_equipo_borrar"])){
  $id_equipo = $_POST["id_equipo_borrar"];
  var_dump($id_equipo);
    $sql = "UPDATE usuarios, equipos SET usuarios.EQU_ID_BECARIO = '0' WHERE usuarios.EQU_ID_BECARIO = EQUIPOS.ID_EQUIPOS AND EQUIPOS.ID_EQUIPOS = '$id_equipo';
            DELETE FROM equipos WHERE equipos.ID_EQUIPOS = '$id_equipo'";
  /* DO YOUR QUERY HERE AND GET THE OUTPUT YOU WANT */
  if ($conn->multi_query($sql) == TRUE) {
     echo '<script language="javascript">
     alert("BORRADO EXITOSA");
     window.location.href="/../interface/teams.php";
     </script>';
  } else {
    echo "Error, el servidor esta experimentando problemas";
    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Error: " . $sql . "<br>" . $conn->error;
     echo '<script language="javascript">
     alert("ERROR AL REGISTRAR");
     window.location.href="/../interface/teams.php";
     </script>';
  }
}


 ?>
