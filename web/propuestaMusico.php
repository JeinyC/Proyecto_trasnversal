<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
    <link rel="shortcut icon" href="../src/img/Posicion_Logo.png" type="image/png">
    <link rel="stylesheet" type="text/css" href="../src/css/pagUsuLogeado.css">
</head>
<body>
<div align="center">
    <div><h2 style="color:white">SOLICITUDES DE MUSICOS </h2>
                    <!--Alineamos el contenido al centro-->
                    <table>

<?php
require_once '../BBDD/bbdd.php';
//Iniciamos sesion
session_start();
//Comprobamos que sesion está almacenado el valor 'username' es decir, si se ha iniciado sesion
if (isset($_SESSION["username"])) {
    if (isset($_POST["musicos"])) {
?>
<div align="center" class="anchoAltoForm2">

    <h3 id="titulo">Listado de inscripciones de musico</h3>

    <?php
    $idconcierto = $_POST["IDconcierto"];
    $listaMusicos=listadoInteresados($idconcierto);
    $contadorInteresados = 0;
        while ($fila = mysqli_fetch_assoc($listaMusicos)) {
            $contadorInteresados++;
        }
        if ($contadorInteresados == 0) {
            echo "AUN NO HAY NINGUN INTERESADO EN SU CONCIERTO";
        } else {
            ?>
            <table id="tabla">
                <tr>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>NOMBRE ARTISTICO</th>
                    <th>PAGINA WEB</th>
                    <th>GENERO</th>
                    <th>Nº TELEFONO</th>
                    <th>ACEPTAR MUSICO</th>
                    <th>RECHAZAR MUSICO</th>
                </tr>
                <?php
                $listaMusicos=listadoInteresados($idconcierto);
                if (isset($listaMusicos)) {
                    while ($fila = mysqli_fetch_assoc($listaMusicos)) {
                        echo "<tr>";
                        echo "<td>" . $fila['NOMBRE'] . "</td>";
                        echo "<td>" . $fila['APELLIDO'] . "</td>";
                        echo "<td>" . $fila['NOMBRE_ARTISTICO'] . "</td>";
                        echo "<td>" . $fila['web'] . "</td>";
                        echo "<td>" . $fila['GENERO'] . "</td>";
                        echo "<td>" . $fila['TELEFONO'] . "</td>";
                        ?>
                        <form action="gestionarSolucitudes.php" method="post">
                            <input type="hidden" name="IDconcierto" value="<?php echo $idconcierto ?>">
                            <input type="hidden" name="IDMUSICO" value="<?php echo $fila['IDMUSICO']?>">
                            <?php echo "<td align='center'><input type=\"submit\" value=\"ACEPTAR\" name=\"aceptar\"></td>"; ?>
                        </form>
                        <form action="gestionarSolucitudes.php" method="post">
                        <input type="hidden" name="IDconcierto" value="<?php echo $idconcierto ?>">
                        <input type="hidden" name="IDMUSICO" value="<?php echo $fila['IDMUSICO']?>">
                        <?php echo "<td align='center'><input type=\"submit\" value=\"RECHAZAR\" name=\"rechazar\"></td>"; ?>
                        </form><?php
                        echo "<tr>";
                    }
                }
                ?>
            </table>
            <?php



        }






    ?>
    <h3 id="titulo">Listado de Musicos confirmados</h3>

    <?php
    $listaMusicos=listadoMusicosConfirmados($idconcierto);
    $contadorInteresados = 0;
    while ($fila = mysqli_fetch_assoc($listaMusicos)) {
        $contadorInteresados++;
    }
    if ($contadorInteresados == 0) {
        echo "AUN NO HAY NINGUN MUSICO CONFIRMADO EN SU CONCIERTO";
    } else {
        ?>
        <table id="tabla">
            <tr>
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>NOMBRE ARTISTICO</th>
                <th>PAGINA WEB</th>
                <th>GENERO</th>
                <th>Nº TELEFONO</th>
            </tr>
            <?php
            $listaMusicos=listadoMusicosConfirmados($idconcierto);
            if (isset($listaMusicos)) {
                while ($fila = mysqli_fetch_assoc($listaMusicos)) {
                    echo "<tr>";
                    echo "<td>" . $fila['NOMBRE'] . "</td>";
                    echo "<td>" . $fila['APELLIDO'] . "</td>";
                    echo "<td>" . $fila['NOMBRE_ARTISTICO'] . "</td>";
                    echo "<td>" . $fila['web'] . "</td>";
                    echo "<td>" . $fila['GENERO'] . "</td>";
                    echo "<td>" . $fila['TELEFONO'] . "</td>";
                    echo "<tr>";
                }
            }
            ?>
        </table>
        <?php



    }






    ?>

    <!--Boton que te regresa a la pagina principal-->
    <form action="pagUsuLogeado.php" method="post">
        <input id="botonmod" type="submit" value="Regresa a la pagina anterior">
    </form>
    <br><br>
    <?php
    } else {
        header('Location: index.php');
    }
    }else{
        header('Location: index.php');
    }

?>
            </table>
        </div>
    </td>

</table>
</div>
<br><br>

</div>
</body>

