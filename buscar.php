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
    <h1 class="jumbotron text-center">Buscar Usuarios</h1>
</header>
<main class="container text-center">
    <form action="buscarusuario.php" method="post">
        <select name="opcion" id="option">
            <option value="nombre">Nombre</option>
            <option value="apellido1">Apellido</option>
            <option value="id_usuario">Nombre de usuario</option>
        </select>
        <input type="text" name="usuario" id="usuario">
        <button class="btn btn-primary">Enviar</button>
    </form>
</main>
</body>
</html>