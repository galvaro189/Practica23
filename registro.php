<?php
if (isset($_POST["nombre"]) && isset($_POST["apellido1"]) && isset($_POST["apellido2"]) && isset($_POST["user"]) && isset($_POST["pass"]) && isset($_POST["passconf"])) {
    $nombre = $_POST["nombre"];
    $apellido1 = $_POST["apellido1"];
    $apellido2 = $_POST["apellido2"];
    $login = $_POST["user"];
    $pass = $_POST["pass"];
    $passconf = $_POST["passconf"];
    if($pass==$passconf) {
        $mysql= new mysqli("localhost","muro","muro","practica23");
        if ($mysql->connect_errno == 2002) {
            header('location:registrate.php?error=3');
            $error=3;
        }
        else {
        $query=$mysql->query("INSERT INTO usuarios VALUES(NULL,'$nombre','$apellido1','$apellido2','$login','$pass')");
        header('location:index.php');
        }
    }
    else {
        $error=2;
        header('location:registrate.php?error=2');
    }
}
else {
    $error=1;
    header('location:registrate.php?error=1');
}

?>