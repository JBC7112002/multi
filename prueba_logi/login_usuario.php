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
$contrasena = password_hash($_POST["contrasena"], PASSWORD_BCRYPT);


$query = "SELECT id FROM usuarios1 WHERE correo='$correo' and contrasena= '$contrasena'";

$validar_login = mysqli_query($conn,$query);

$datos_nm=mysqli_fetch_assoc($validar_login);
echo $datos_nm;
if(mysqli_num_rows($validar_login)>0){
    $_SESSION['id_usuario']=$datos_nm['id'];   
 
    echo '
    <script>
    alert("BIENVENIDO") ;
    window.location="../index.html"; </script>';

}else{
    echo '
    <script>
    alert("contraseña o correo equivocado") ;
    window.location="index.php";
     </script>';
 

}


?>