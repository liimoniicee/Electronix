<?php
include'connect.php';

$var_team_name = $_POST['team_nombre'];
$var_integrantes = $_POST['integrantes'];
$var_tipo = $_POST['tipo'];

$sql = "INSERT INTO equipos (EQU_NOMBRE_EQUIPO,EQU_NUM_INTEGRA,EQU_TIPO_EQUIPO) VALUES('$var_team_name','$var_integrantes','$var_tipo')";

if ($conn->query($sql) === TRUE) {
    echo '<script language="javascript">
        window.location.href="/../interface/teams.php";
        alert("REGISTRO EXITOSO");
        </script>';

} else {
    echo "Error, el servidor esta experimentando problemas";
    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Error: " . $sql . "<br>" . $conn->error;
//    echo '<script language="javascript">
//    window.location.href="/../schoolar/crearequipos.php";
//    alert("ERROR AL REGISTRAR");
//          </script>';
}
$conn->close();
?>
