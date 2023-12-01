
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
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$edad = $_POST['edad'];
$contrasena = $_POST['contrasena'];
//encriptar contraseña
$contrasena = hash('sha512',$contrasena);

// Insertar datos en la base de datos
$sql = "INSERT INTO datos_clientes (nombre, correo, telefono, direccion, edad, contrasena) VALUES ('$nombre', '$correo', '$telefono', '$direccion', '$edad','$contrasena')";
// verificar correo
$verificar_correo =mysqli_query($conn, "SELECT * FROM datos_clientes WHERE correo='$correo'  ");
if(mysqli_num_rows($verificar_correo)>0){
    echo '
    <script>
    alert("Este correo ya esta registrado, Intenta un  nuevo correo") ;
    window.location="registrarvista.html"; </script>';
    exit();

}
// vmrnsaje 
//echo $sql;
if ($conn->query($sql) === TRUE) {
    echo '
    <script>
    alert("Usuario Registrado") ;
    window.location="./prueba_logi/index.php"; </script>';
} else {
    echo '
    <script>
    alert(" Error, Usuario no registrado") ;
    </script>';
}

// Cerrar la conexión a la base de datos
$conn->close();
?>

