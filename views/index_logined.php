<?php
session_start();
$username = $_SESSION['userId'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/indexStyle.css">
    <title>SimpleBlog</title>
</head>

<body>
<header id="nav-wrapper">
    <nav id="nav">
        <div class="nav left">
            <a href="#home"><img src="../img/logo/logo.png" class="logo" alt="Logo"></a>
        </div>
        <div class="nav right">
            <a href="#home" class="nav-link active"><span class="nav-link-span"><span
                            class="u-nav">Home</span></span></a>
            <a href="#about" class="nav-link"><span class="nav-link-span"><span
                            class="u-nav">Sobre nosotros</span></span></a>
            <a href="#contact" class="nav-link"><span class="nav-link-span"><span
                            class="u-nav">Contacto</span></span></a>
            <a href="../views/login.php" class="nav-link"><span class="nav-link-span"><span class="u-nav"><span
                                class="cerrar">Cerrar sesión</span></span></span></a>
            <a href="#" class="nav-link"><span class="nav-link-span"><span class="u-nav"><span
                                class="perfil"><?= $username ?></span></span></span></a>
        </div>
    </nav>
</header>
<main>
    <section id="gallery">
        <h2>Galería de fotos</h2>
        <hr class="separator">
        <div class="gallery-container">
            <a class="uno" href="#img1"><img src="../img/Posts/imagen1.jpg" alt="Preview del juego 1"
                                             class="gallery-image imagen1"></a>
            <a class="dos" href="#img2"><img src="../img/Posts/imagen2.jpg" alt="Preview del juego 2"
                                             class="gallery-image imagen2"></a>
            <a class="tres" href="#img3"><img src="../img/Posts/imagen3.jpg" alt="Preview del juego 3"
                                              class="gallery-image imagen3"></a>
            <a class="cuatro" href="#img4"><img src="../img/Posts/imagen4.jpg" alt="Preview del juego 4"
                                                class="gallery-image imagen4"></a>
        </div>
        <div class="navigation">
            <button id="prevBtn">Anterior</button>
            <button id="nextBtn">Siguiente</button>
        </div>
    </section>
    <section id="home">
        <h2>Añande tu post</h2>
        <a href="addPost.php">
            <button class="add">Añadir Post</button>
        </a>
        <h2>Últimos Juegos</h2>
        <hr class="separator">
        <?php
        if (!isset($_SESSION['default_records_inserted'])) {
            require_once("../controllers/OperationsController.php");
            require_once("../dbHandlers/dataBase.php");

            // Database connection settings
            $settings = parse_ini_file('../settings/settings.ini');
            $server = $settings['server'];
            $dbUsername = $settings['username'];
            $dbPassword = $settings['password'];
            $dbName = $settings['database'];

            try {
                // Create a new database connection
                $database = new dataBase($server, $dbUsername, $dbPassword, $dbName);
                $connection = $database->getConnection();

                // Create an instance of OperationsController
                $operationsController = new OperationsController($connection);

                // Get posts
                $operationsController->getPost();

                // Fill the blog table with default records
                $operationsController->fillBlogTable();

                // Set the flag indicating default records have been inserted
                $_SESSION['default_records_inserted'] = true;
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
        }
        ?>
        <!--            <div class="game-preview">-->
        <!--                <img id="img1" src="../img/Posts/imagen1.jpg" alt="Preview del juego 1" class="imagen1">-->
        <!--                <h3>The Last Of Us Parte ||</h3>-->
        <!--                <p>Descripción breve del juego 1...</p>-->
        <!--            </div>-->
        <!--            <div class="game-preview">-->
        <!--                <img id="img2" src="../img/Posts/imagen2.jpg" alt="Preview del juego 2" class="imagen2">-->
        <!--                <h3>Spider-Man 2</h3>-->
        <!--                <p>Descripción breve del juego 2...</p>-->
        <!--            </div>-->
        <!--            <div class="game-preview">-->
        <!--                <img id="img3" src="../img/Posts/imagen3.jpg" alt="Preview del juego 3" class="imagen3">-->
        <!--                <h3>Hogwarts Legacy</h3>-->
        <!--                <p>Descripción breve del juego 3...</p>-->
        <!--            </div>-->
        <!--            <div class="game-preview">-->
        <!--                <img id="img4" src="../img/Posts/imagen4.jpg" alt="Preview del juego 4" class="imagen4">-->
        <!--                <h3>Outer Wilds</h3>-->
        <!--                <p>Descripción breve del juego 4...</p>-->
        <!--            </div>-->
    </section>
    <section id="about">
        <h2>Sobre Nosotros</h2>
        <p>Somos un equipo apasionado por los videojuegos...</p>
    </section>
    <section id="contact">
        <h2>Contacto</h2>
        <p>Ponte en contacto con nosotros...</p>
    </section>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Tu script personalizado -->
<script src="../script/script.js"></script>
</body>

</html>
