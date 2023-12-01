<?php
session_start();

// Conexión a la base de datos (Asegúrate de completar con tus propios datos)
$servername = "localhost";
$username = "root";
$password = "";
$database = "multiservicios";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("La conexión a la base de datos falló: " . $conn->connect_error);
}

// Recoger datos del formulario
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Consulta SQL para verificar el correo y obtener la contraseña almacenada
$sql = "SELECT id, contrasena FROM usuarios1 WHERE correo='$correo'";
$resultado = $conn->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    $id_usuario = $fila['id'];
    $contrasena_hash = $fila['contrasena'];

    // Verificar la contraseña
    if (password_verify($contrasena, $contrasena_hash)) {
        // Contraseña válida
        $_SESSION['id_usuario'] = $id_usuario;
        echo '
        <script>
        alert("Inicio de sesión exitoso") ;
        window.location="../index_inicio_sesion.php"; </script>';
    } else {
        // Contraseña incorrecta
        echo '
        <script>
        alert("Contraseña incorrecta") ;
        window.location="index.php"; </script>';
    }
} else {
    // Usuario no encontrado
    echo '
    <script>
    alert("Usuario no encontrado") ;
    window.location="index.php"; </script>';
}

// Cerrar la conexión a la base de datos
$conn->close();
?>
