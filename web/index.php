<!DOCTYPE html>
<html lang="en">
<?php
require_once '../BBDD/bbdd.php';
//Iniciamos sesion
session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../src/css/index.css">
    <link rel="stylesheet" type="text/css" href="../src/css/responsiveIndex.css">
    <link rel="stylesheet" type="text/css" href="../src/tipografia/Doctor%20Glitch.otf">
    <link rel="shortcut icon" href="../src/img/Posicion_Logo.png" type="image/png">
    <title>Main Page</title>
</head>

<body>
<br><br>
<div class="BigTitulo">Bienvenidos</div>
<!--los div de abajo siempre han de estar juntos... donde acaba uno termina otro-->
<div id="parteSuperior">
    <?php
    if (isset($_SESSION["username"])) {
        $tipoUsu=$_SESSION["tipo"];
        $IDUsu=$_SESSION["IdUsu"];
        $idfan=selectIDFan($IDUsu);

        ?>
        <div id="parteIzquierdaTopbar">
            <button class="enlace" role="link" onclick="window.location='logout.php'">Cerrar sesion</button>
        </div><div id="parteDerechaTopbar">
            <button class="enlace" role="link" onclick="window.location='pagUsuLogeado.php'">Pagina usuario</button>
        </div>
        <?php
    } else {
        ?>
        <div id="parteIzquierdaTopbar">
            <button class="enlace" role="link" onclick="window.location='registro.php'">Registrate</button>
        </div><div id="parteDerechaTopbar">
            <button class="enlace" role="link" onclick="window.location='login.php'">Login</button>
        </div>
        <?php
    }
    ?>

    <div>
        <img id="imgLogo" src="../src/img/pngwave.png">
    </div>
</div>
<h2 id="titulo">LOCALES TOP</h2>
<?php
        $locales = selectLocales();
        $contadorLocales = 0;
        while ($fila = mysqli_fetch_assoc($locales)) {
            $contadorLocales++;
        }
        if ($contadorLocales == 0) {
            echo "ACTUALMENTE NO HAY LOCALES DISPONIBLES PARA MOSTRAR";
        }else{
?>
<table id="tablaInformacionConciertos">

    <tr>
        <th>NOMBRE DEL LOCAL</th>
        <th>AFORO</th>
        <th>UBICACION</th>
        <th>CIUDAD</th>
        <th>TELEFONO</th>
        <th>Nº DE ME GUSTA</th>
        <?php
        if (isset($_SESSION["username"])) {
            if ($tipoUsu == 2) {
                ?>
                <th>VOTO POSITIVO</th>
                <th>VOTO NEGATIVO</th>
                <?php
            }
        }
        ?>
    </tr>
    <?php
    require_once '../BBDD/bbdd.php';
    $locales = selectLocales();
    if (isset($locales)) {
        while ($fila = mysqli_fetch_assoc($locales)) {
            echo "<tr>";
            echo "<td>" . $fila['nombreusuario'] . "</td>";
            echo "<td>" . $fila["AFORO"] . "</td>";
            echo "<td>" . $fila['UBICACION'] . "</td>";
            echo "<td>" . $fila['NOMBRE'] . "</td>";
            echo "<td>" . $fila["TELEFONO"] . "</td>";

            $numvotos = contadorLikes($ID_USU = $fila['ID_USUARIO']);
            echo "<td>" . $numvotos . "</td>";
            if (isset($_SESSION["username"])) {
                if ($tipoUsu == 2) {
                    if (comprobarVoto($fila['ID_USUARIO'], $idfan)) {
                        echo "<td> GRACIAS POR VOTAR </td>";
                        echo "<td> GRACIAS POR VOTAR </td>";
                    } else {
                        ?>
                        <form action="votos.php" method="post">
                            <input type="hidden" name="ID_USUARIO" value="<?php echo $fila['ID_USUARIO']; ?>">
                            <input type="hidden" name="ID_FAN" value="<?php echo $idfan; ?>">
                            <?php echo "<td align='center'><input type=\"submit\" value=\"LIKE\" name=\"votarLike\"></td>"; ?>
                        </form>
                        <form action="votos.php" method="post">
                        <input type="hidden" name="ID_USUARIO" value="<?php echo $fila['ID_USUARIO']; ?>">
                        <input type="hidden" name="ID_FAN" value="<?php echo $idfan; ?>">
                        <?php echo "<td align='center'><input type=\"submit\" value=\"DISLIKE\" name=\"votarDislike\"></td>"; ?>
                        </form><?php
                    }
                }
            }
        }
    }
    }
            echo "<tr>";
    ?>
</table>
<br><br>
<h2 id="titulo">MUSICOS TOP  </h2>
<?php
$musicos = selectMusicos();
$contadorMusicos = 0;
while ($fila = mysqli_fetch_assoc($musicos)) {
    $contadorMusicos++;
}
if ($contadorMusicos == 0) {
    echo "ACTUALMENTE NO HAY MUSICOS DISPONIBLES PARA MOSTRAR";
}else{
?>
<table id="tablaInformacionConciertos">
    <tr>
        <th>NOMBRE DEL MUSICO</th>
        <th>PAGINA WEB</th>
        <th>GENERO</th>
        <th>Nº DE ME GUSTA</th>
        <?php
        if (isset($_SESSION["username"])) {
            if ($tipoUsu == 2) {
                ?>
                <th>VOTO POSITIVO</th>
                <th>VOTO NEGATIVO</th>
                <?php
            }
        }
        ?>
    </tr>
    <?php
    $musicos = selectMusicos();
    if (isset($musicos)) {

        if (isset($musicos)) {
            while ($fila = mysqli_fetch_assoc($musicos)) {
                echo "<tr>";
                echo "<td>" . $fila['NOMBRE'] . "</td>";
                echo "<td>" . $fila['WEB'] . "</td>";
                echo "<td>" . $fila['GENERO'] . "</td>";

                $numvotos = contadorLikes($ID_USU = $fila['ID_USUARIO']);
                echo "<td>" . $numvotos . "</td>";
                if (isset($_SESSION["username"])) {
                    if ($tipoUsu == 2) {
                        if (comprobarVoto($fila['ID_USUARIO'], $idfan)) {
                            echo "<td> GRACIAS POR VOTAR </td>";
                            echo "<td> GRACIAS POR VOTAR </td>";
                        } else {
                            ?>
                            <form action="votos.php" method="post">
                                <input type="hidden" name="ID_USUARIO" value="<?php echo $fila['ID_USUARIO']; ?>">
                                <input type="hidden" name="ID_FAN" value="<?php echo $idfan; ?>">
                                <?php echo "<td align='center'><input type=\"submit\" value=\"LIKE\" name=\"votarLike\"></td>"; ?>
                            </form>
                            <form action="votos.php" method="post">
                            <input type="hidden" name="ID_USUARIO" value="<?php echo $fila['ID_USUARIO']; ?>">
                            <input type="hidden" name="ID_FAN" value="<?php echo $idfan; ?>">
                            <?php echo "<td align='center'><input type=\"submit\" value=\"DISLIKE\" name=\"votarDislike\"></td>"; ?>
                            </form><?php
                        }
                    }
                }
                echo "<tr>";
            }
        }
    }
    }
    ?>

</table>
<br><br>
<h2 id="titulo">PROXIMOS CONCIERTOS </h2>
<?php
$conciertosPropuestos = selectConciertosAceptados();
$contadorConciertos = 0;
while ($fila = mysqli_fetch_assoc($conciertosPropuestos)) {
    $contadorConciertos++;
}
if ($contadorConciertos == 0) {
    echo "ACTUALMENTE NO HAY CONCIERTOS DISPONIBLES PARA MOSTRAR";
}else{
?>
<table id="tablaInformacionConciertos">
    <tr>
        <th>NOMBRE DEL LOCAL</th>
        <th>DIRECCION</th>
        <th>GENERO</th>
        <th>FECHA</th>
        <th>HORA</th>
        <th>PRECIO</th>
    </tr>
    <?php
    $conciertosPropuestos = selectConciertosAceptados();
    if (isset($conciertosPropuestos)) {
        while ($fila = mysqli_fetch_assoc($conciertosPropuestos)) {
            echo "<tr>";
            echo "<td>" . $fila['NOMBRE'] . "</td>";
            echo "<td>" . $fila['UBICACION'] . "</td>";
            echo "<td>" . $fila['GENERO'] . "</td>";
            echo "<td>" . $fila['FECHA'] . "</td>";
            echo "<td>" . $fila['HORA'] . "</td>";
            echo "<td>" . $fila['PRECIO'] . "</td>";
            echo "<tr>";
        }

    }
    }

    ?>

</table>
</div>
<br>
<footer style="text-align: center">Alumnos Stucom ©</footer>
</body>

</html>