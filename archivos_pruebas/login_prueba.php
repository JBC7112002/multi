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
$contrasena = hash('sha512',$contrasena);
// Realiza la consulta SQL para verificar las credenciales
$query = "SELECT * FROM datos_clientes WHERE correo='$correo' AND contrasena='$contrasena'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    // Credenciales válidas, inicia la sesión
    $datos_nm = mysqli_fetch_assoc($result);
    $_SESSION['id_usuario'] = $datos_nm['id'];
    $_SESSION['correo_usuario'] = $datos_nm['correo'];
    // Otros datos de sesión que puedas necesitar

    // Redirige a la página de inicio o cualquier otra página deseada
    header("Location: index.php");
    exit();
} else {
    // Credenciales inválidas, muestra un mensaje de error
    echo "Error: Credenciales inválidas";
}

?>