<?php
// Conexión a la base de datos (reemplazar con tus datos de conexión)
$servername = "localhost";
$username = "root";
$password = "";
$database = "multiservicios";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$ubicacion = $_POST['ubicacion'];
$edad = $_POST['edad'];
//$correo = $_POST['correo'];
$descripcion = $_POST['descripcion'];

// Manejo de la foto
$nombreFoto = $_FILES['foto']['name'];
$tipoFoto = $_FILES['foto']['type'];
$tamanoFoto = $_FILES['foto']['size'];
$tmpFoto = $_FILES['foto']['tmp_name'];

// Directorio para almacenar las fotos (asegúrate de tener permisos de escritura)
$directorioFotos = "fotos_proveedores/";

// Mover la foto al directorio especificado
move_uploaded_file($tmpFoto, $directorioFotos . $nombreFoto);

// Insertar datos en la base de datos
$sql = "INSERT INTO proveedoresservicios (nombre, telefono, ubicacion, edad, correo, descripcion, foto_path)
        VALUES ('$nombre', '$telefono', '$ubicacion', $edad,  '$descripcion', '$nombreFoto')";

        // verificar correo
/*$verificar_correo =mysqli_query($conn, "SELECT * FROM usuarios1 WHERE correo='$correo'  ");
if(mysqli_num_rows($verificar_correo)>0){
    echo '
    <script>
    alert("Este correo ya esta registrado, Intenta un  nuevo correo") ;
    window.location="registro_provedor.html"; </script>';
    exit();}
*/

if ($conn->query($sql) === TRUE) {
    echo '
    <script>
    alert("REGISTRO EXITOSO") ;
     </script>';
} else {
    echo "Error al registrar: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
