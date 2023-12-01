<?php
// Conexión a la base de datos (Asegúrate de completar con tus propios datos)
$servername = "localhost";
$username = "root";
$password = "";
$database = "formulario_db";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

// Recoger datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$edad = $_POST['edad'];

// Insertar datos en la base de datos
$sql = "INSERT INTO datos_personales (nombre, correo, telefono, direccion, edad) VALUES ('$nombre', '$correo', '$telefono', '$direccion', $edad)";

if ($conn->query($sql) === TRUE) {
    echo "Datos guardados correctamente.";
} else {
    echo "Error al guardar los datos: " . $conn->error;
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
