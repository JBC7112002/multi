<?php
include("configuracion.php");

$conexion = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conexion->connect_error) {
    echo"La conexión a la base de datos falló: " . $conexion->connect_error;
    exit();
}
?>