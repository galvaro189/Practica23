<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrate</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<h1>Registrate</h1>
<form action="registro.php" class="form-group" method="post">
    <label for="nombre">Nombre:</label>
    <input class="form-control" type="text" name="nombre" id="nombre" required>
    <label for="apellido1">Primer apellido:</label>
    <input class="form-control" type="text" name="apellido1" id="apellido1" required>
    <label for="apellido2">Segundo Apellido:</label>
    <input class="form-control" type="text" name="apellido2" id="apellido2" required>
    <label for="user">Nombre de usuario:</label>
    <input class="form-control" type="text" name="user" id="user" required>
    <label for="pass">Contraseña:</label>
    <input class="form-control" type="password" name="pass" id="pass" minlength="8" required>
    <label for="passconf">Confima la contraseña:</label>
    <input class="form-control" type="password" name="passconf" id="passconf" minlength="8" required>
    <button class="btn btn-primary">Enviar</button>
</form>
<br>
    <?php
    if(isset($_GET["error"])) {
        if ($_GET["error"]==2) {
            echo "<p class='alert-danger'>Las contraseñas no coinciden</p>";
        }
        elseif ($_GET["error"]==1) {
            echo "<p class='alert-danger'>Todos los campos son obligatorios</p>";
        }
        elseif ($_GET["error"]==3) {
            echo "<p class='alert-danger'>Error en la conexión a la Base de datos</p>";
        }
    }
    ?>
</body>
</html>