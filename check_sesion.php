<?php
session_start();
include 'conexion.php';

            $var_name=$_SESSION['nombre'];
            $var_clave= $_SESSION['clave'];
            $var_tipo = $_SESSION['tipo'];

      
?>