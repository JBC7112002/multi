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


// Verifica si la variable de sesión está definida
if (!isset($_SESSION['id_usuario'])) {
    // Si no está definida, redirige a la página de inicio de sesión
    header("Location: prueba_login_form.php");
    exit();
}

$sql="SELECT * from datos_clientes where id='$_SESSION[id_usuario]'";

$resultado=mysqli_query($conn,$sql);
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
            <h2>Foto de Perfil</h2>
            <td><img src="" alt="Foto del cliente" width="50px" height="50px"></td>
        </div>

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

        <div class="mt-5">
            <?php
            while($filas=mysqli_fetch_assoc($resultado)){           
            ?>
            <h2>Información del Usuario</h2>
            <p>Nombre: <?php echo $filas['nombre'] ?> </p>
            <p>Edad: <?php echo $filas['edad'] ?> </p>
            <p>Localidad: <?php echo $filas['direccion'] ?> </p>
            <p>Teléfono: <?php echo $filas['telefono'] ?> </p>
            -<p>acciones: <?php echo  " <a href=''> editar </a>" ?> </p>
        -
        <p>acciones: <?php echo  " <a href=''> eliminar </a>" ?> </p>
        
        </div>
        <?php 
        }?>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
</body>
</html>


