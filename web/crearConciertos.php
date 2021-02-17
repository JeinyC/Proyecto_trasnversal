<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concierto</title>
    <link rel="stylesheet" type="text/css" href="../src/css/crearConciertos.css">
    <link rel="import" href="../src/img/publico.png">
    <link rel="import" href="../src/tipografia/Doctor%20Glitch.otf">
</head>
<body>
<?php
session_start();
require_once '../BBDD/bbdd.php';
if (isset($_SESSION["tipo"])) {
if ($_SESSION["tipo"] == 1) {
$IdUsu = $_SESSION["IdUsu"]; ?>

<!--web formulario crear conciertos-->
<!--div y tablas meramente esteticas-->
<!--Arreglo de html y la estetica-->
<div align="center">
    <h2>CREADOR DE CONCIERTOS </h2>
</div>
    <div id=tabla>
        <!--Alineamos el contenido al centro-->
        <form method="post">
            Fecha:
            <input type="date" name="fechaConcierto" required><br><br>
            Hora:
            <input type="time" name="horaConcierto" required><br><br>
            Precio entrada:
            <input type="number" size="3" required name="precio" min="0">
            <br><br>Genero de musica <select name="genero">
                <option value="1">Reggae</option>
                <option value="2">Rock</option>
                <option value="3">Jazz</option>
                <option value="4">Pop</option>
                <option value="5">Electro</option>
                <option value="6">Post-hardcore</option>
                <option value="7">Dance</option>
                <option value="8">Hip-Hop</option>
                <option value="9">Flamenco</option>
                <option value="10">Punk</option>
                <option value="11">Salsa</option>
                <option value="12">Rap</option>
            </select>
            <br><br>
            &nbsp;<input type="submit" value="CREAR" name="crearConcierto">
        </form>
        <!--Boton que te regresa a la pagina principal-->
        <br><br>
        <form action="pagUsuLogeado.php" method="post">
            <input type="submit" value="Regresa a la pagina anterior">
        </form>
    </div>
    <!--div unidos no tocar-->
    <div id="imgLateral">
        <img src="../src/img/publico.png">
    </div><div id="imgLateral">
        <img src="../src/img/publico.png">
    </div>
    <?php
    if (isset($_POST["crearConcierto"])) {
        $fechaConcierto = $_POST["fechaConcierto"];
        $horaConcierto = $_POST["horaConcierto"];
        $precio = $_POST["precio"];
        $genero = $_POST["genero"];
        $idlocal = selectIDLocal($IdUsu);
        $today = date("Y-m-d");
        $fecha1 = strtotime($today);
        $fecha2 = strtotime($fechaConcierto);
        if ($fecha1 > $fecha2) {
            echo "DEBE INTRODUCIRSE UNA FECHA MAYOR A LA FECHA ACTUAL";
        } else {
            $resultado = crearConciertos("$fechaConcierto", "$horaConcierto", $idlocal, $precio, $genero);
            if ($resultado == "ok") {
                header('Location: pagUsuLogeado.php');
            } else {
                echo "error: $resultado<br>";
                echo "$IdUsu<br>";

            }
        }
    }
    } else {
        echo "Tu usuario no tiene permisos para acceder a esta pagina.";
    }
    } else {
        echo "<br> &nbsp; <u> No te has logeado para poder acceder aquí </u>";
    }
    ?>

</body>
</html>