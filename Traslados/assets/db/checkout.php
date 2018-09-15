
<?php
include'connect.php';
session_start();
$id_usuario = $_SESSION["clave"];
$sql = "UPDATE control_empleados SET CONT_HORA_SALIDA = CURTIME(), CONT_HOY = '1' WHERE CON_ID_EMPLEADO =  '$id_usuario'";

    if ($conn->query($sql) === TRUE) {
        echo '<script language="javascript">
window.location.href="/../interface/admin.php";
alert("REGISTRO EXITOSO");
</script>';

    } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    ?>
