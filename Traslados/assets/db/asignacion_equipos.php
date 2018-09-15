<?php
include'connect.php';

if(isset($_POST["id_usuario"])){
  $id_equipo = $_POST["id_equipo"];
  $id_alumno = $_POST["id_usuario"];
  $sql = "UPDATE usuarios SET EQU_ID_BECARIO = '$id_equipo' WHERE ID_USUARIO = '$id_alumno'";
  /* DO YOUR QUERY HERE AND GET THE OUTPUT YOU WANT */
  if ($conn->query($sql) === TRUE) {
    // echo '<script language="javascript">
    // alert("ASIGNACION EXITOSA");
    // window.location.href="/../interface/asignarequipos.php";
    // </script>';
  } else {
    echo "Error, el servidor esta experimentando problemas";
    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Error: " . $sql . "<br>" . $conn->error;
     echo '<script language="javascript">
     alert("ERROR AL REGISTRAR");
     window.location.href="/../interface/crearequipos.php";
     </script>';
  }
}

elseif(isset($_POST["id_usuario_borrar"])){
  $id_alumno = $_POST["id_usuario_borrar"];
  $sql = "UPDATE usuarios SET EQU_ID_BECARIO = '0' WHERE ID_USUARIO = '$id_alumno'";
  /* DO YOUR QUERY HERE AND GET THE OUTPUT YOU WANT */
  if ($conn->query($sql) === TRUE) {
     echo '<script language="javascript">
     alert("ASIGNACION EXITOSA");
     window.location.href="/../interface/asignarequipos.php";
     </script>';
  } else {
    echo "Error, el servidor esta experimentando problemas";
    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Error: " . $sql . "<br>" . $conn->error;
     echo '<script language="javascript">
     alert("ERROR AL REGISTRAR");
     window.location.href="/../schoolar/crearequipos.php";
     </script>';
  }
}

 ?>
