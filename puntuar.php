<?php
session_start();
if (!isset($_GET["idpubli"])) {
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
    <h1 class="jumbotron text-center">Vota La Publicacion</h1>
</header>
<main class="container text-center">
    <form action="votar.php">
        <select name="voto" id="voto">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        <input type="hidden" id="publi" name="publi" value="<?=$_GET["idpubli"] ?>">
        <button>Enviar</button>
    </form>
    <br><br>
    <?php
    if(isset($_GET["error"])) {
        if ($_GET["error"]==1){
            echo '<p class="alert-danger">Ya se ha puntuado este mensaje</p>';
        }
    }
    ?>
</main>
</body>
</html>