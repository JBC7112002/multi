<?php   
session_start();
    if(!isset ($_SESSION['usuario'])){
        echo '
        <script>
        alert("No estás registrado. Por favor, crea una cuenta.");
        window.location="../pruebas_logi/index.php"; </script>';
    session_destroy();
        die();

    }
   

?>-


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <title>targetas</title>
    <link rel="stylesheet" href="stiloss_targe.css">
   <meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1.0 , ,maximun-scale=1.0, minimun-scale=1.0">
   
</head>
</head>


<body> 
    
<header>
    <button8 id="perfil" >Perfil</button8>
    <script>
        const perfil= document.getElementById("perfil");
        perfil.addEventListener("click", function() {
                  window.location.href = "Perfil.html"; // Cambia "nueva_pagina.html" por la URL deseada
                });
     </script>
     
         <h1>Multiservi</h1>
       
        

       
            <div><button id="registro" >REGISTRO</button>
        <script>
            const registro= document.getElementById("registro");
                 registro.addEventListener("click", function() {
                      window.location.href = "registrarvista.html"; // Cambia "nueva_pagina.html" por la URL deseada
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
<body>
    
    <h1 class="title"> Servicios</h1>

    <div class="container">

        <div class="card">
            <img src="../imagenes/pastel1 (4).png" alt="">
            <h4>pastel</h4>
            <p>este es pastel muy bueno</p>
            <a href="#">leer mas</a>
        </div>

        <div class="card">
            <img src="../imagenes/pastel1 (3).png" alt="">
            <h1>pastel</h1>
            <p>este es pastel muy bueno</p>
            <a href="#">leer mas</a>
        </div>
    
        <div class="card">
            <img src="../imagenes/pastel1 (1).png" alt="">
            <h1>pastel</h1>
            <p>este es pastel muy bueno</p>
            <a href="#">leer mas</a>
        </div>

    </div>
    
</body>
</html>