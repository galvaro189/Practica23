<?php

$mysql = new mysqli("localhost", "muro", "muro", "practica23");
if ($mysql->connect_errno == 2002) {
    header('location:login.php?error=3');
    $error = 3;
} else {
    $modificar = $mysql->query("UPDATE `publicaciones` SET `texto` ='".$_POST["texto"]."' WHERE `publicaciones`.`id_publicacion` = ".$_POST["id"]);
    header('location:muro.php');
}
?>