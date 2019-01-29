<?php
session_start();
if (isset($_POST["texto"])) {
    $mysql = new mysqli("localhost", "muro", "muro", "practica23");
    $text=$_POST["texto"];
    $idusuario=$_SESSION["usuario"];
    if ($mysql->connect_errno == 2002) {
        header('location:login.php?error=3');
        $error = 3;
    } else {
        $query = $mysql->query('INSERT INTO publicaciones VALUES (NULL,"'.$text.'","'.$idusuario.'")');
        header('location:muro.php');

    }
}
else {
    header('location:anadirpubli.php');
}


?>