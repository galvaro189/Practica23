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
<h1 class="jumbotron text-center">Inicia sesión</h1>
<div class="container">
<form action="muro.php" class="form-group" method="post">
   <div class="text-center">
    <input class="form-control" type="text" name="user" id="user" placeholder="Usuario"><br><br>
    <input class="form-control" type="password" name="pass" id="pass" placeholder="Contraseña"><br>
    <button class="btn btn-primary">Enviar</button>
    </div>
</form>
</div>
<br>
<?php
if(isset($_GET["error"])) {
    if ($_GET["error"]==2) {
        echo "<p class='alert-danger'>Usuario y contraseña incorrectos</p>";
    }
    elseif ($_GET["error"]==3) {
        echo "<p class='alert-danger'>Error en la conexión a la Base de datos</p>";
    }
}
?>
</body>
</html>