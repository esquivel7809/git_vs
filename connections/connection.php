<?php
//parametros de conección
$hostname = "localhost";
$username = "root";
$password = "";
$database = "prueba";
//Conectividad
$mysqli = new mysqli ($hostname, $username, $password, $database);

if ($mysqli -> connect_errno)
{
    die("Fallo la conexion". mysqli_connect_errno());
}

?>