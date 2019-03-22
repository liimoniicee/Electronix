<?php
// Este archivo es protegido por la ley del derechos de propiedad literaria. La ingenieria inversa de este codigo se prohibe estrictamente.
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "electronicax";

//$password = md5("electronicax");

// Crear connection
$conn = @mysqli_connect($servername, $username, $password, $dbname);
return $conn;

?>
