<?php session_start();

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

// Verificar si el usuario ha iniciado sesión
if(isset($_SESSION['id_usuario'])) {
    $id_usuario = $_SESSION['id_usuario'];

    echo '
    <script>
    alert("bienvenido.");
    window.location="saladechat/home.php"; </script>';


   /* // Consulta SQL para obtener los datos del usuario
    $sql = "SELECT usuario, nombre, correo, telefono FROM usuarios1 WHERE id='$id_usuario'";
    $resultado = $conn->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $usuario = $fila['usuario'];
        $nombre = $fila['nombre'];
        $correo = $fila['correo'];
        $telefono = $fila['telefono'];

        

       // Mostrar los datos del perfils
        echo "<h2>Perfil de $usuario</h2>";
        echo "<p>Nombre: $nombre</p>";
        echo "<p>Correo: $correo</p>";
        echo "<p>Teléfono: $telefono</p>";

        // Puedes agregar más elementos según sea necesario
    } else {
      // Si no ha iniciado sesión, redirige a la página de inicio de sesión
      echo '
      <script>
      alert("No has iniciado sesión. Por favor accede o crea una cuenta.");
      window.location="prueba_logi/index.php"; </script>';}*/
} else {
    // Si no ha iniciado sesión, redirige a la página de inicio de sesión
    echo '
    <script>
    alert("No has iniciado sesión. Por favor accede o crea una cuenta.");
    window.location="prueba_logi/index.php"; </script>';
} 

// Cerrar la conexión a la base de datos
$conn->close();
?>