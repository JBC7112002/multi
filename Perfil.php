<?php

//---------------------------------
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

// Verificar si el usuario ha iniciado sesión
if(isset($_SESSION['id_usuario'])) {
    $id_usuario = $_SESSION['id_usuario'];

    // Consulta SQL para obtener los datos del usuario
    $sql = "SELECT  id,usuario, nombre, correo, telefono, localidad FROM usuarios1 WHERE id='$id_usuario'";
    $resultado = $conn->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        $id = $fila['id'];
        $usuario = $fila['usuario'];
        $nombre = $fila['nombre'];
        $correo = $fila['correo'];
        $telefono = $fila['telefono'];
        $localidad = $fila['localidad'];

       // Mostrar los datos del perfil
        echo "<h2>Perfil de $usuario</h2>";
        echo "<p>Nombre: $nombre</p>";
        echo "<p>Correo: $correo</p>";
        echo "<p>Teléfono: $telefono</p>";

        // Puedes agregar más elementos según sea necesario
    } else {
        echo "Error al obtener los datos del usuario";
    }
} else {
    // Si no ha iniciado sesión, redirige a la página de inicio de sesión
    echo '
        <script>
        alert("No has iniciado sesión. Por favor accede o crea una cuenta.");
        window.location="prueba_logi/index.php"; </script>';
} 

// Cerrar la conexión a la base de datos
$conn->close();
//-----------------------------------

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Perfil</title>
</head>
<body>
    <nav class="navbar bg-light">
        <form class="container-fluid justify-content-start">
          <button onclick="Regresar()" class="btn btn-outline-success me-2" type="button">Regresar</button>
          
          <script>
            function Regresar(){
                window.location.href = 'index.html'
            }
          </script>
            
        </form>
      </nav>
      
      
      
    <div class="container mt-5">
        <h1 class="text-center">Perfil de Usuario</h1>

       

        <div class="text-center mt-4">
            <button onclick="Redirigir()" type="submit" class="btn btn-primary" src="editar_perfil.html">
                Editar 
                <script>
                function Redirigir(){
                    window.location.href = 'editar_perfil.html'
                }
              </script>
              
            </button>
        </div>
<?php  
if(isset($_SESSION['id_usuario'])) {
    $id_usuario = $_SESSION['id_usuario']; ?>

        <div class="mt-5">
         <!-- Mostrar los datos del perfil-->
         <h5> Usuario: <?php echo $usuario ?> </h5>
        <h5>Nombree: <?php echo $nombre ?> </h5>
        <h5>Correo: <?php echo $correo ?> </h5>
        <h5>Telefono: <?php echo $telefono ?> </h5>
        <h5>Localidad: <?php echo $localidad ?> </h5>
    <?php } ?> </div>
        



        
       
         
       
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>


