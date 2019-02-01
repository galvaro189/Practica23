<?php
if (!isset($_POST["opcion"]) or !isset($_POST["usuario"])) {
    header('location:buscar.php?error=2');
    //Error 2 --> No se han enviado parametros
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
    <h1 class="jumbotron text-center">Usuarios</h1>
</header>
<main class="container text-center">
    <?php
    $usuariobuscar = $_POST["usuario"];
    $tipo = $_POST["opcion"];
    $mysql = new mysqli("localhost", "muro", "muro", "practica23");
    if ($mysql->connect_errno == 2002) {
        return "<p>Error en la conexion de la Base de datos</p>";
    } else {
        $query = $mysql->query('SELECT * FROM usuarios;');
        $usuario = $query->fetch_assoc();
        if (!isset($usuario)) {
            echo '<p> No se han encontrado usuarios</p>';
        }
        while ($usuario) {
            if ($tipo == 'nombre') {
                if ($usuariobuscar == $usuario["nombre"]) {
                    echo '<a href="muroajeno.php?idusuario='.$usuario["id_usuario"].'">'.$usuario["nombre"].'</a>';
                }
            } elseif ($tipo == 'apellido1') {
                if ($usuariobuscar == $usuario["apellido1"]) {
                    echo '<a href="muroajeno.php?idusuario='.$usuario["id_usuario"].'">'.$usuario["nombre"].'</a>';
                }
            } elseif ($tipo == 'id_usuario') {
                if ($usuariobuscar == $usuario["login"]) {
                    echo '<a href="muroajeno.php?idusuario='.$usuario["id_usuario"].'">'.$usuario["nombre"].'</a>';
                }
            }
            $usuario = $query->fetch_assoc();
        }
    }

    ?>
</main>
</body>
</html>