<?php
session_start();
include 'fuctions.php';
include 'conexion.php';
verificar_sesion();

            $var_name=$_SESSION['nombre'];
            $var_clave= $_SESSION['clave'];
            $var_tipo = $_SESSION['tipo'];

                        if($var_tipo == "Administrador") {
                          header("Location: administrador.php");
                        }
                  
                        ?>