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
    <form action="modificarpubli.php" method="post">
        <?php
        $mysql = new mysqli("localhost", "muro", "muro", "practica23");
        if ($mysql->connect_errno == 2002) {
            header('location:login.php?error=3');
            $error = 3;
        } else {
            $query = $mysql->query('SELECT * from publicaciones WHERE id_publicacion=' . $_GET["idpubli"] . ';');
            $fila = $query->fetch_assoc();
            echo '<textarea name="texto" id="texto" cols="100" rows="10" required>' . $fila["texto"] . '</textarea><br>';
            echo '<input type="hidden" name="id" id="id" value="' . $_GET["idpubli"] . '">';
        }
        ?>
        <button class="btn btn-primary">Enviar</button>
    </form>
</main>
</body>
</html>