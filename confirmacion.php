<?php
session_start();
if (!isset($_GET["idpubli"])) {
    header('Location:muro.php');
}
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
<header>
    <h1 class="jumbotron text-center">Modificar Publicacion</h1>
</header>
<main class="container text-center">
    <h3>¿Estas seguro que quieres borrar la publicacion?</h3>
    <a href="borrarpubli.php?idpubli=<?=$_GET["idpubli"]?>" class="btn btn-primary">Si</a>
    <a href="muro.php" class="btn btn-primary">No</a>
</main>
</body>