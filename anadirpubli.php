<?php
session_start();
?>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<header class="jumbotron text-center">
    <h1>Añadir publicacion</h1>
</header>
<main class="text-center">
    <form action="anadir.php" method="post">
        <textarea name="texto" id="texto" cols="100" rows="10" placeholder="Escriba el texto de su publicación..." required></textarea><br>
        <button class="btn btn-primary">Enviar</button>
    </form>
    <br>
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"]==1) {
            echo '<p class="alert-danger">Campo vacio</p>';
        }
    }
    ?>
</main>
</body>
</html>