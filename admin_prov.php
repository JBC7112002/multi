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
    $sql = "SELECT  nombre,  telefono , descripcion ,foto_path FROM proveedoresservicios WHERE id='$id_usuario'";
    $resultado = $conn->query($sql);

    if ($resultado && $resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        
        $nombre = $fila['nombre'];
        $telefono = $fila['telefono'];
        $descripcion = $fila['descripcion']; 
        $foto = $fila['foto_path'];

        

       /* // Mostrar los datos del perfil
        echo "<h2>Perfil de $usuario</h2>";
        echo "<p>Nombre: $nombre</p>";
        echo "<p>Correo: $correo</p>";
        echo "<p>Teléfono: $telefono</p>";*/

        // Puedes agregar más elementos según sea necesario
    } else {
        echo "Error al obtener los datos del usuario";
    }
} else {
    // Si no ha iniciado sesión, redirige a la página de inicio de sesión
    header("Location: index.php");
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
    <link rel="stylesheet" href="css/sesion_stilo_index.css">
    <title>M++++++</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  

   

</head>


<body> 
    
<header>
    <div><button8 id="perfil" >Perfil</button8>
    <script>
        const perfil= document.getElementById("perfil");
        perfil.addEventListener("click", function() {
                  window.location.href = "Perfil.php"; // Cambia "nueva_pagina.html" por la URL deseada
                });
     </script>

     <div class="provedor" style="float: left;font-size: 16px;padding: 8% 0;">
        <a href="index_inicio_sesion.php">inicio</a>
     </div>
    </div>
     
         <h1 style="padding-right: 29%;" > Multiservi </h1>
       
        <div class="sesion" style="float: right;font-size: 14px;padding-right: 15%;;margin: 8px;  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    ">
        
            <h5>Nombree:  <?php echo $nombre ?> </h5>
        </div>

       
           
         <p style="padding-right: 30%; text-align: center;"> Servicios A la orden </p>
</header>

            <!--Aqui comienza la barra de navegacion
            <div class="row">
                <nav class="navbar navbar-expand-lg bg-primary">
          <div class="container-fluid">
            <a id="titulo"  class="navbar-brand" href="#">MultiServicios</a>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active" aria-current="page" href="index.html">ACCESO</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="register.html">REGISTRO</a>
                </li>
              </ul>  
            </div>
          </div>
        </nav>
            </div>-->
            <!--Aqui termina la barra de navegacion-->

    



    <div class="container">

      <h1 style="padding-right: 28%;"> Tus Servicios </h1>
      
        <div class="product">
            <img src=" <?php echo $foto ?>" alt="imagen de pastel">
            <h5> Nombre:  <?php echo $nombre ?>  </h5> <br>
            <p>A La Orden</p>
            <button id="boton1" >CONTACTAR AL PROVEEDOR</button>

            <script>
                const boton1 = document.getElementById("boton1");
                     boton1.addEventListener("click", function() {
                          window.location.href = "chat.php"; // Cambia "nueva_pagina.html" por la URL deseada
                        });
            </script>
            <br>
           <button id="boton2" >MAS INFORMACIÓN</button>
            <script>
                const boton2 = document.getElementById("boton2");
                     boton2.addEventListener("click", function() {
                          window.location.href = "descripcion_serv.php"; // Cambia "nueva_pagina.html" por la URL deseada
                        });
             </script>      
        </div>

        

        <!--<div class="product">
            <img src="imagenes/materaiales.jpeg" alt="Producto 3">
            <h2>Material de Construcción</h2>
            <p>A La Orden</p>
            <button id="boton5" class="button1">Ver Servicios</button>
        </div>

        <div class="product">
            <img src="imagenes/materaiales.jpeg" alt="Producto 3">
            <h2>Material de Construcción</h2>
            <p>A La Orden</p>
            <button id="boton" class="button1">Ver Servicios</button>
        </div>

        <div class="product">
            <img src="imagenes/materaiales.jpeg" alt="Producto 3">
            <h2>Material de Construcción</h2>
            <p>A La Orden</p>
            <button id="boton4" class="button1">Ver Servicios</button>
        </div>
    </div>-->


       
    
  


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>   
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>   
</body>
</html>