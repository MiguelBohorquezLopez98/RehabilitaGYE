<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/css/all.min.css">
</head>
<?php
session_start();
if(!empty($_SESSION['id_rol_usuario'])){
    header('Location: controlador/LoginController.php');  
}
else{
session_destroy();

?>

<body>
    <img class="wave" src="img/wave.png" alt="">
    <div class="contenedor">
        <div class="img">
            <img src="img/image1.svg" alt="">
        </div>
        <div class="contenido-login">
            <form action="controlador/LoginController.php" method="post">
                <img src="img/doctor.png" alt="">
                <h2>Centro de Rehabilitación Física "Rehabilita GYE"</h2>
                <div class="input-div dni">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Cedula</h5>
                        <input type="text" name="user" class="input">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Contraseña</h5>
                        <input type="password" id="input" name="pass" class="input">
                    </div>
                </div>

                <div class="view">
                    <div class="fas fa-eye verPassword" onclick="vista()" id="verPassword"></div>
                </div>
                
                <input type="submit" class="btn" value="Iniciar sesión">
            </form>
        </div>
    </div>
    <script src="js/login.js"></script>
    <script src="js/verpassword.js"></script>
</body>


</html>
<?php
}
?>