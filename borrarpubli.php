<?php
if (!isset($_GET["idpubli"])) {
    header('Location:muro.php');
} else {
    $mysql = new mysqli("localhost", "muro", "muro", "practica23");
    if ($mysql->connect_errno == 2002) {
        header('location:login.php?error=3');
        $error = 3;
    } else {
        $query = $mysql->query('DELETE from publicaciones WHERE id_publicacion=' . $_GET["idpubli"] . ';');
        header('Location:muro.php');
    }
}


?>