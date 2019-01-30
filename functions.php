<?php
function hay_publicaciones($id_usuario)
{
    $mysql = new mysqli("localhost", "muro", "muro", "practica23");
    if ($mysql->connect_errno == 2002) {
        return "<p>Error en la conexion de la Base de datos</p>";
    } else {
        $query = $mysql->query("SELECT * FROM publicaciones WHERE id_usuario=" . $id_usuario . ";");
        $publicacion = $query->fetch_assoc();
        if ($publicacion == NULL) {
            return "<p> No tienes ninguna publicacion todavia, crea una</p>";
        } else {
            $texto = "";
            $contador=1;
            while ($publicacion) {
                $query2 = $mysql->query("SELECT COUNT(puntuacion) as TOTAL FROM puntuaciones WHERE id_publicacion=" . $publicacion["id_publicacion"])->fetch_assoc();
                $query3 = $mysql->query("SELECT SUM(puntuacion) as SUMA FROM puntuaciones WHERE id_publicacion=" . $publicacion["id_publicacion"])->fetch_assoc();
                if ($query2["TOTAL"]==0 OR $query2["TOTAL"]==NULL) {
                    $puntua="";
                }
                else {
                    $puntua = ($query3["SUMA"] / $query2["TOTAL"]);
                }
                $texto .= "<div class='container' style='margin-bottom:20px;background-color:lightgray;padding:0;overflow:hidden;width:60%;border: 1px solid gray;border-radius:10px;'><h3 class='text-center' style='background-color:blue;color:white;width:100%;'>Mensaje ".$contador."</h3><p>" . $publicacion["texto"] . "</p><a href='modificar.php?idpubli=".$publicacion["id_publicacion"]."' class='btn btn-primary text-sm-right'>Modificar el mensaje</a><a id='borrar' href='confirmacion.php?idpubli=".$publicacion["id_publicacion"]."' class='btn btn-danger' style='margin-left: 5px;'>Borrar el mensaje</a><p>Puntuación: ".$puntua."</p></div>";
                $publicacion = $query->fetch_assoc();
                $contador++;
            }
            return $texto;
        }
    }
}


?>