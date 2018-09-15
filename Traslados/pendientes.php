<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traslados</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="assets/css/Footer-Basic.css">
    <link rel="stylesheet" href="assets/css/Highlight-Phone.css">
    <link rel="stylesheet" href="assets/css/Navigation-Clean.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/untitled.css">
</head>

<body><nav class="navbar navbar-light navbar-expand-md navigation-clean">
    <div class="container"><a class="navbar-brand" href="index.html">Electrónica RSH</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse"
            id="navcol-1">
            <ul class="nav navbar-nav ml-auto">
              
                <li class="dropdown"><a class="dropdown-toggle nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false" href="#">Traslados</a>
                    <div class="dropdown-menu" role="menu"><a class="dropdown-item" role="presentation" href="pendientes.php">Pendientes</a><a class="dropdown-item" role="presentation" href="#">Asignados</a><a class="dropdown-item" role="presentation" href="#">Completados</a></div>
                </li>
            </ul>
        </div>
    </div>
</nav>
    <div class="container"><h1>Traslados pendientes</h1>
        <div>



<?php

require 'conexion.php';
$q = mysql_query("select * from traslado where estado='Pendiente'") or die (mysql_error());
echo "<table border='1'>";
echo"<tr>";
echo"<th>ID Traslado</td>";
echo"<th>Estado</td>";
echo"<th>Direccion</td>";
echo"<th>Comentarios</td>";
echo"<th>Ubicacion</td>";
echo"<th>Destino</td>";
echo"<th>Fecha de solicitud</td>";
echo"<th>Id del Equipo</td>";
echo"<th>Accion</td>";

while($data = mysql_fetch_row($q))
{
	echo "<tr>";
	echo "<td>$data[0]</td><td>$data[1]</td><td>$data[2]</td><td>$data[3]</td><td>$data[4]</td><td>$data[5]</td><td>$data[6]</td><td>$data[8]</td>";
	echo "<td><a href='pendientes_vista.php'>Seleccionar</a> </td>";
    echo "</tr>";
}
?>

</div>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>