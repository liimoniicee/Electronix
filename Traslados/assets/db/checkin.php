
<?php
include'connect.php';
session_start();

$id_usuario = $_SESSION["clave"];

$sql = "INSERT INTO control_empleados (CONT_CLAVE_AREA, CONT_FECHA, CONT_HORA_SALIDA, CONT_HORA_ENTRADA, CON_ID_EMPLEADO) VALUES('1',CURDATE(), 'NUL0', CURTIME(), '$id_usuario' )";

    if ($conn->query($sql) === TRUE) {
        echo "<script src='assets/js/sweetalert2.js'></script>";
        echo '<script language="javascript">
window.location.href="/../interface/admin.php";
alert("REGISTRO EXITOSO");
</script>';

    } else {
         echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    ?>
