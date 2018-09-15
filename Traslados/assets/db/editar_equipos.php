<?php
include'connect.php';

$var_id_equipo = $_POST['id_equipo'];
$var_team_name = $_POST['new_team_nombre'];
$var_integrantes = $_POST['new_integrantes'];
$var_tipo = $_POST['new_tipo'];

$sql = "UPDATE equipos SET EQU_NOMBRE_EQUIPO = '$var_team_name', EQU_NUM_INTEGRA = '$var_integrantes' , EQU_TIPO_EQUIPO = '$var_tipo' WHERE ID_EQUIPOS = '$var_id_equipo'";

    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">
        const swal = require "../assets/js/sweetalert2.js";
        swal(
          "Good job!",
          "Exito en la EDICION del equipo!",
          "success"
        );
        setTimeout(function () { location.reload(true); }, 2000);
        </script>';
         header('Location: http://localhost/interface/equipos/editarequipos.php');
        exit;

    } else {
      echo "Error, el servidor esta experimentando problemas";
      echo "Error: Failed to make a MySQL connection, here is why: \n";
      echo "Error: " . $sql . "<br>" . $conn->error;
    echo '<script language="javascript">
    alert("ERROR AL REGISTRAR");
    </script>';
    header('Location: http://localhost/interface/teams.php');
    exit;
    }
$conn->close();
    ?>
