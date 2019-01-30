<?php
session_start();
if (!isset($_GET["idusuario"])) {
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
    <?php
    $mysql = new mysqli("localhost", "muro", "muro", "practica23");
    if ($mysql->connect_errno == 2002) {
        return "<p>Error en la conexion de la Base de datos</p>";
    } else {
        $query = $mysql->query("SELECT * FROM publicaciones WHERE id_usuario=" . $_GET["idusuario"] . ";");
        $publicacion = $query->fetch_assoc();
        if ($publicacion == NULL) {
            return "<p> No tiene ninguna publicacion</p>";
        } else {
            $texto = "";
            $contador = 1;
            while ($publicacion) {
                $query2 = $mysql->query("SELECT COUNT(puntuacion) as TOTAL FROM puntuaciones WHERE id_publicacion=" . $publicacion["id_publicacion"])->fetch_assoc();
                $query3 = $mysql->query("SELECT SUM(puntuacion) as SUMA FROM puntuaciones WHERE id_publicacion=" . $publicacion["id_publicacion"])->fetch_assoc();
                if ($query2["TOTAL"]==0 OR $query2["TOTAL"]==NULL) {
                    $puntua="";
                }
                else {
                    $puntua = ($query3["SUMA"] / $query2["TOTAL"]);
                }
                $texto .= "<div class='container' style='margin-bottom:20px;background-color:lightgray;padding:0;overflow:hidden;width:60%;border: 1px solid gray;border-radius:10px;'><h3 class='text-center' style='background-color:blue;color:white;width:100%;'>Mensaje " . $contador . "</h3><p>" . $publicacion["texto"] . "</p><a href='publicacionajena.php?idpubli=" . $publicacion["id_publicacion"] . "'>Ver en detalle</a><p>Puntuación: ".$puntua."</p></div>";
                $contador++;
                $publicacion = $query->fetch_assoc();
            }
            echo $texto;
        }
    }
    ?>
    <a href="muro.php" class="btn btn-primary">Volver a tu muro</a>
</main>
</body>
</html>