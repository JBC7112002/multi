<?php
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
$usuario = $_POST['usuario'];
$nombre = $_POST['nombre'];
$contrasena = password_hash($_POST["password"], PASSWORD_BCRYPT);
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$localidad = $_POST['localidad'];

// Insertar datos en la base de datos
$sql = "INSERT INTO  usuarios1 (usuario, nombre, contrasena, correo, telefono , localidad) 
VALUES ('$usuario', '$nombre', '$contrasena','$correo', '$telefono' ,'$localidad' )";
// verificar correo
$verificar_correo =mysqli_query($conn, "SELECT * FROM usuarios1 WHERE correo='$correo'  ");
if(mysqli_num_rows($verificar_correo)>0){
    echo '
    <script>
    alert("Este correo ya esta registrado, Intenta un  nuevo correo") ;
    window.location="index_registro.html"; </script>';
    exit();}


$resultado = $conn->query($sql);
if ($resultado === TRUE) {
    echo '
    <script>
    alert("REGISTRO EXITOSO") ;
    window.location="prueba_logi/index.php"; </script>';
} else {
    echo '
    <script>
    alert("REGISTRO FALLIDO") ;
    window.location="index_registro.html"; </script>';
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

