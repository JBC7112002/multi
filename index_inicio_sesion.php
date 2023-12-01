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
if (isset($_SESSION['id_usuario'])) {
  $id_usuario = $_SESSION['id_usuario'];

  // Consulta SQL para obtener los datos del usuario
  $sql = "SELECT usuario, nombre, correo, telefono FROM usuarios1 WHERE id='$id_usuario'";
  $resultado = $conn->query($sql);

  if ($resultado && $resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    $usuario = $fila['usuario'];
    $nombre = $fila['nombre'];
    $correo = $fila['correo'];
    $telefono = $fila['telefono'];

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
  <link rel="stylesheet" href="css/sesion_stilo_index.css">
  <title>Multiservicios</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>




</head>


<body>

  <?php
  if ($_SESSION['id_usuario']=(TRUE)) {
  ?>

    <header>
      <div>
        <button8 id="perfil1">Perfil</button8>
        <script>
          const perfil1 = document.getElementById("perfil1");
          perfil1.addEventListener("click", function() {
            window.location.href = "Perfil.php"; // Cambia "nueva_pagina.html" por la URL deseada
          });
        </script>

        <div class="provedor" style="float: left;font-size: 16px;padding: 8% 0;">
          <a href="registro_provedor.html">¿QUIERES BRINDAR UN SERVICIO?</a>
        </div>
      </div>

      <h1 style="padding-right: 29%;"> Multiservi </h1>

      <div class="sesion" style="float: right;font-size: 14px;padding-right: 15%;;margin: 8px;  font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
    ">
        <h5> Usuario: <?php echo $usuario ?> </h5>
        <h5>Nombree: <?php echo $nombre ?> </h5>
      </div>



      <p style="padding-right: 30%; text-align: center;"> Servicios A la orden </p>
    </header>
  <?php
  } else {
  ?>
<header>
    <button8 id="perfil" >Perfil</button8>
    <script>
        const perfil= document.getElementById("perfil");
        perfil.addEventListener("click", function() {
                  window.location.href = "Perfil.php"; // Cambia "nueva_pagina.html" por la URL deseada
                });
     </script>
     
         <h1>Multiservi</h1>
       
        

       
            <div><button id="registro" >REGISTRO</button>
        <script>
            const registro= document.getElementById("registro");
                 registro.addEventListener("click", function() {
                      window.location.href = "index_registro.html"; // Cambia "nueva_pagina.html" por la URL deseada
                    });
         </script>
           <button id="ACCESO" >ACCESO</button>
           <script>
               const ACCESO= document.getElementById("ACCESO");
               ACCESO.addEventListener("click", function() {
                         window.location.href = "prueba_logi/index.php"; // Cambia "nueva_pagina.html" por la URL deseada
                       });
            </script>
            </div>
         <p> Servicios A la orden </p>
</header>
  <?php
  }
  ?>
  





  <div class="container">

    <h1 style="padding-right: 28%;">Categorias </h1>

    <div class="product">
      <img src="imagenes/pastel1 (9).png" alt="imagen de pastel">
      <h2>Pasteleria</h2> <br>
      <p>A La Orden</p>
      <button id="boton1">Ver Servicios</button>

      <script>
        const boton1 = document.getElementById("boton1");
        boton1.addEventListener("click", function() {
          window.location.href = "index_serv.php"; // Cambia "nueva_pagina.html" por la URL deseada
        });
      </script>

    </div>

    <div class="product">
      <img src="imagenes/pastel1 (6).png" alt="Producto 2">
      <h2>Música </h2><br>
      <p>A La Orden</p>
      <button id="boton2">Ver Servicios</button>
      <script>
        const boton2 = document.getElementById("boton2");
        boton2.addEventListener("click", function() {
          window.location.href = "archivos_pruebas/index1.html"; // Cambia "nueva_pagina.html" por la URL deseada
        });
      </script>
    </div>

    <div class="product">
      <img src="imagenes/pastel1 (8).png" alt="Producto 3">
      <h2>Material de Construcción</h2>
      <p>A La Orden</p>
      <button id="boton3">Ver Servicios</button>

      <script>
        const boton3 = document.getElementById("boton3");
        boton3.addEventListener("click", function() {
          window.location.href = "prueba_logi/index.php"; // Cambia "nueva_pagina.html" por la URL deseada
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