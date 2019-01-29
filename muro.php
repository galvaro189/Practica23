<?php
session_start();
include 'functions.php';
if (!isset($_SESSION["usuario"])) {
    if (isset($_POST["user"]) and isset($_POST["pass"])) {
        $pass = $_POST["pass"];
        $user = $_POST["user"];
    } else {
        header('Location:login.php');
    }
}
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mi muro</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<?php
if (!isset($_SESSION["usuario"])) {
    $mysql = new mysqli("localhost", "muro", "muro", "Practica23");
    if ($mysql->connect_errno == 2002) {
        header('location:login.php?error=3');
        $error = 3;
    } else {
        $query = $mysql->query("SELECT * FROM usuarios;");
        $array = $query->fetch_assoc();
        while ($array) {
            if ($user == $array["login"]) {
                if ($pass == $array["pass"]) {
                    $_SESSION["usuario"] = $array["id_usuario"];
                }
            }
            $array = $query->fetch_assoc();
        }
        if ($_SESSION["usuario"] == 0) {
            $error = 2;
            header('location:login.php?error=2');
        }
    }
}
?>
<header class="text-center">
    <h1 class="jumbotron">Mi muro</h1>
</header>
<nav class="container text-right">
    <a class="btn btn-primary" href="buscar.php" style="color: white; margin-bottom: 20px;">Buscar usuarios</a>
</nav>
<main class="text-center">
    <?php
    echo hay_publicaciones($_SESSION["usuario"]);
    ?>
    <br>
    <a href="anadirpubli.php" class="btn btn-primary"> Añadir publicación</a>
</main>
</body>
</html>