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
    <h1 class="jumbotron text-center">Detalles de la Publicacion</h1>
</header>
<main class="container text-center">
        <?php
        $mysql = new mysqli("localhost", "muro", "muro", "practica23");
        if ($mysql->connect_errno == 2002) {
            header('location:login.php?error=3');
            $error = 3;
        } else {
            $query = $mysql->query('SELECT * from publicaciones WHERE id_publicacion=' . $_GET["idpubli"] . ';');
            $publicacion = $query->fetch_assoc();
            $query2 = $mysql->query("SELECT COUNT(puntuacion) as TOTAL FROM puntuaciones WHERE id_publicacion=" . $publicacion["id_publicacion"])->fetch_assoc();
            $query3 = $mysql->query("SELECT SUM(puntuacion) as SUMA FROM puntuaciones WHERE id_publicacion=" . $publicacion["id_publicacion"])->fetch_assoc();
            if($query2["TOTAL"]==0) {
                $puntua="";
            }
            else {
                $puntua = ($query3["SUMA"] / $query2["TOTAL"]);
            }
            echo '<p>'. $publicacion["texto"].'</p>';
            echo '<p> Puntuacion media: '.$puntua.'</p>';
            echo '<a class="btn btn-primary" href="puntuar.php?idpubli='.$_GET["idpubli"].'">Puntuar</a>';
        }
        ?>

</main>
</body>
</html>