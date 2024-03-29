<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../style/loginStyle.css">
</head>
<body>
<div id="wrapper">
    <div id="mainBox">
        <div id="content">
            <div id="welcomeMsg" class="element left">
                <h1>
                    ¡Bienvenido!
                </h1>
                <p>Sé bien recibido a nuestra página de blogs sobre videojuegos. Aquí encontrarás las últimas noticias, reseñas y análisis de los juegos más populares del momento.</p>
            </div>
            <div id="loginForm" class="element right">
                <form action="../controllers/RegistrationController.php" method="post" id="mainForm">
                    <br>
                    <label for="username" name="username" id="username">
                        Nombre de usuario
                        <br>
                        <input type="username" name="username" id="userName" value="">
                    </label>
                    <br>
                    <label for="ciudad" name="ciudad" id="ciudad">
                        Ciudad
                        <br>
                        <input type="ciudad" name="ciudad" id="ciudad" value="">
                    </label>
                    <br>
                    <label for="login">
                        Correo electrónico
                        <br>
                        <input type="email" name="email" id="login" value="">
                    </label>
                    <br>
                    <label for="password">
                        Contraseña
                        <br>
                        <input type="password" name="password" id="password" value="">
                    </label>
                    <br>
                    
                    <label for="submit">
                        <input type="submit" name="submit" value="Sign Up" id="submitData">
                    </label>
                    <label for="register">
                        <a href="login.php">¿Ya tienes cuenta?</a>
                    </label>
                </form>
            </div>
        </div>
    </div>
</div>
</body>
</html>

