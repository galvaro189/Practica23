<?php
session_start();
if (isset($_SESSION["usuario"]) ) {
    header('location:muro.php');
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<header>
    <h1 class="jumbotron text-center">Inicio de Sesion</h1>
</header>
<main class="text-center">
    <a href="registrate.php" class="btn btn-primary">Registrate</a>
    <a href="login.php" class="btn btn-primary">Inicia Sesion</a>
</main>
<br><br><br>
<footer>
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"]==0) {
            echo '<p class="text-center alert-success">Registro completado!</p>';
        }
    }
    ?>
</footer>
</body>
</html>