<?php
session_start();
if (isset($_GET["publi"]) and isset($_GET["voto"])) {
    $mysql = new mysqli("localhost", "muro", "muro", "practica23");
    $idusuario=$_SESSION["usuario"];
    if ($mysql->connect_errno == 2002) {
        header('location:login.php?error=3');
        $error = 3;
    } else {
        echo $idusuario;
        $query = $mysql->query('INSERT INTO puntuaciones VALUES ("'.$_GET["voto"].'",'.$idusuario.','.$_GET["publi"].')');
        $error=$mysql->errno;
        echo $error;
        if ($error == '1062') {
            header('location:http://localhost/IAW/Practica23/puntuar.php?idpubli='.$_GET["publi"].'&error=1');
        }
        else {header('location:publicacionajena.php?idpubli='.$_GET["publi"]);}

    }

}

?>