


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Register </title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body>

        <main>

            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>.___________________  .</h3>
                        <p>._____________________  .</p>
                        <button id="btn__iniciar-sesion">  .</button>
                    </div>
                    <div class="caja__trasera-register">
                        <h3>             ¿Aún no tienes una cuenta?</h3>
                        <p>              Regístrate para que puedas iniciar sesión</p>
                        <button id="btn__registrarse">           Regístrarse</button>
                        <script>
                            const btn__registrarse= document.getElementById("btn__registrarse");
                            btn__registrarse.addEventListener("click", function() {
                                      window.location.href = "../index_registro.html"; // Cambia "nueva_pagina.html" por la URL deseada
                                    });
                         </script>
                    </div>
                </div>

                <!--Formulario de Login y registro-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form action="login_usuario1.php" method="post" class="formulario__login">
                        <h2>Iniciar Sesión</h2>
                        <input type="text" placeholder="Correo Electronico" name="correo">
                        <input type="password" placeholder="Contraseña" name="contrasena">
                        <button>Entrar</button>
                    </form>

                    <!--Register-->
                    <form action="" class="formulario__register">
                        <h2>Regístrarse</h2>
                        
                        <input type="text" placeholder="Nombre completo">
                        <input type="text" placeholder="Correo Electronico">
                        <input type="text" placeholder="Usuario">
                        <input type="password" placeholder="Contraseña">
                        <button>Regístrarse</button>
                    </form>
                </div>
            </div>

        </main>

        <script src="assets/js/script.js"></script>
</body>
</html>