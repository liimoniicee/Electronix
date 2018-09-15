<?php
$clave=$_SESSION['clave'];
session_start();

session_destroy('clave');
header("location: index.html");

?>