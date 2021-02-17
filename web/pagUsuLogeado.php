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

<?php
require_once '../BBDD/bbdd.php';
//Iniciamos sesion
session_start();
//Comprobamos que sesion está almacenado el valor 'username' es decir, si se ha iniciado sesion
if (isset($_SESSION["username"])) {

if ($_SESSION["tipo"] == 0) {
    $tipo = "musico";
}
if ($_SESSION["tipo"] == 1) {
    $tipo = "local";
}
if ($_SESSION["tipo"] == 2) {
    $tipo = "fan";
}
?>
<div align="center" class="anchoAltoForm">
    <h1 id="BigTitulo" style="color:Black">P e r f i l</h1>
    <!--div y tablas meramente esteticas-->

                <!--Alineamos el contenido al centro-->


                    <div id=titulo>
                        <h3 style="color:Black">Modificacion de perfil </h3>
                    </div>
                    <table id=tabla>


                        <?php
                        //Almacenamos en la variable $resultado la respuesta de la funcion encargada de mostrar los mensajes del usuario logeado
                        $username = $_SESSION['username'];
                        $modificar = datosUsu($username);
                        $fila = mysqli_fetch_assoc($modificar);
                        $id = $fila['ID_CIUDAD'];
                        $nomCiudad = nomCiudad($id);
                        $Ciudad = mysqli_fetch_assoc($nomCiudad);


                        ?><!--Iniciamos un formulario -->

                        <tr>
                            <th>Datos de Perfil</th>
                        </tr>

                        <tr>
                            <form action="editarDatos.php" method="post">
                                <input type="hidden" name="NOMBRE" value="<?php echo $fila['NOMBRE']; ?>">
                                <th>Nombre:&nbsp;</th>
                                <td><?php echo $fila['NOMBRE'] ?></td>
                                <td><input id="botonmod" type="submit" value="Modificar" name="ModificarNom"></td>
                            </form>
                        </tr>

                            <?php
                            if ($_SESSION["tipo"]!=1) {

                                ?>
                        <tr>
                                <form action="editarDatos.php" method="post">
                                    <input type="hidden" name="APELLIDO" value="<?php echo $fila['APELLIDO']; ?>">
                                    <th>Apellido&nbsp;</th>
                                    <td><?php echo $fila['APELLIDO'] ?></td>
                                    <td><input id="botonmod" type="submit" value="Modificar" name="ModificarApe"></td>
                                </form>
                        </tr>
                                <?php
                            }
                            ?>

                        <tr>
                            <form action="editarDatos.php" method="post">
                                <input type="hidden" name="NOMBRECIUDAD" value="<?php echo $Ciudad['NOMBRE']; ?>">
                                <th>Ciudad&nbsp;</th>
                                <td><?php echo $Ciudad["NOMBRE"] ?></td>
                                <td><input id="botonmod" type="submit" value="Modificar" name="ModificarCiu"></td>
                            </form>
                        </tr>
                        <tr>
                            <form action="editarDatos.php" method="post">
                                <input type="hidden" name="EMAIL" value="<?php echo $fila['EMAIL']; ?>">
                                <th>Email</th>
                                <td><?php echo $fila["EMAIL"] ?></td>
                                <td><input id="botonmod" type="submit" value="Modificar" name="ModificarEma"></td>
                            </form>
                        </tr>
                        <tr>
                            <form action="editarDatos.php" method="post">
                                <input type="hidden" name="TELEFONO" value="<?php echo $fila['TELEFONO']; ?>">
                                <th>Telefono</th>
                                <td><?php echo $fila["TELEFONO"] ?></td>
                                <td><input id="botonmod" type="submit" value="Modificar" name="ModificarTel"></td>
                            </form>
                        </tr>
                    </table>
    <!--los div de abajo siempre han de estar juntos... donde acaba uno termina otro-->
</div><div class="anchoAltoImagenPerfil">
    <section align="center" >

    <div class="ImagenPerfil"><img id="imgPerfil" src="../src/img/foto%20perlil.jpg" alt="logoCentral"></div>
    <div id="DivInfoUsu">
    <?php
    //Almacenamos en la variable $user el valor del session username
    $user = $_SESSION["username"];
    ?>
        <p id='p' >Nombre de usuario</p>
        <?php
        echo "<p >".$_SESSION["username"]."</p>";
        ?>

        <form action="logout.php" method="POST">
            <input id="botonmod" type="submit" name="logout" value="Cerrar Sesion">
        </form>
</div>
    </section>
</div>
    <?php

    $IdUsu = $_SESSION['IdUsu'];
    //SI EL USUARIO LOGEADO SU TIPO ES LOCAL, MUSICO O FAN SE LE MOSTRARAN UNAS OPCIONES O OTRAS
    if ($_SESSION["tipo"] == 0) {
    ?>

<h3 id="titulo">CONCIERTOS DISPONIBLE </h3>
<?php
$conciertosEspera = selectConciertosEspera();
$IdMusico = selectIDMusico($IdUsu);
$contadorConciertosDisponible = 0;
while ($fila1 = mysqli_fetch_assoc($conciertosEspera)) {
    $IDCONCIERTO = $fila1['ID'];
    $conciertosInscritos = selectIdConciertoInscrito($IdMusico, $IDCONCIERTO);
    if ($conciertosInscritos == false) {
        $contadorConciertosDisponible++;
    }
}
if ($contadorConciertosDisponible == 0){
    echo "ACTUALMENTE NO HAY CONCIERTOS DISPONIBLES A LOS QUE PUEDA REGISTRARSE, INTENTELO DE NUEVO MAS TARDE";
}else {
?>
<table id="tabla">
    <tr>
        <th>NOMBRE DEL LOCAL</th>
        <th>GENERO</th>
        <th>CIUDAD</th>
        <th>DIRECCION</th>
        <th>FECHA</th>
        <th>HORA</th>
        <th>INSCRIBIRSE</th>
    </tr>
    <?php
    $conciertosEspera = selectConciertosEspera();
    $contadorConciertos = 0;
    if (isset($conciertosEspera)) {
        while ($fila = mysqli_fetch_assoc($conciertosEspera)) {
            $IDCONCIERTO = $fila['ID'];
            $conciertosInscritos = selectIdConciertoInscrito($IdMusico, $IDCONCIERTO);
            if ($conciertosInscritos == false) {
                echo "<tr>";
                echo "<td>" . $fila['NOMBRE'] . "</td>";
                echo "<td>" . $fila['GENERO'] . "</td>";
                echo "<td>" . $fila['CIUDAD'] . "</td>";
                echo "<td>" . $fila['UBICACION'] . "</td>";
                echo "<td>" . $fila['FECHA'] . "</td>";
                echo "<td>" . $fila['HORA'] . "</td>";

                ?>
                <form action="inscripcionMusico.php" method="post">
                <input type="hidden" name="IDconcierto" value="<?php echo $IDCONCIERTO; ?>">
                <?php echo "<td align='center'><input type=\"submit\" value=\"INSCRIBIRSE\" name=\"participar\"></td>"; ?>
                </form><?php
                echo "<tr>";

            }
        }
    }
    }
    ?>

</table>

<br><br><br>

<h2 id="titulo">ESTADO DE INSCRIPCIONES </h2>
<?php
$conciertosEspera = selectPropuestasEspera($IdMusico);
$contadorConciertosDisponible = 0;
while ($fila = mysqli_fetch_assoc($conciertosEspera)) {
    $contadorConciertosDisponible++;
}
if ($contadorConciertosDisponible == 0) {
    echo "ACTUALMENTE NO HAS SOLICITADO NINGUNA INSCRIPCION";
} else {


?>


<table id="tabla">
    <tr>
        <th>NOMBRE DEL LOCAL</th>
        <th>GENERO</th>
        <th>DIRECCION</th>
        <th>FECHA</th>
        <th>HORA</th>
        <th>ESTADO</th>
        <th>OPCIONES</th>
    </tr>
    <?php
    $conciertosEspera = selectPropuestasEspera($IdMusico);
    $contadorConciertos = 0;
    if (isset($conciertosEspera)) {
        while ($fila = mysqli_fetch_assoc($conciertosEspera)) {
            echo "<tr>";
            echo "<td>" . $fila['NOMBRE'] . "</td>";
            echo "<td>" . $fila['GENERO'] . "</td>";
            echo "<td>" . $fila['UBICACION'] . "</td>";
            echo "<td>" . $fila['FECHA'] . "</td>";
            echo "<td>" . $fila['HORA'] . "</td>";
            if ($fila['ESTADO'] == 0) {
                echo "<td> EN ESPERA </td>";
            }
            if ($fila['ESTADO'] == 1) {
                echo "<td> ACEPTADO </td>";
            }
            if ($fila['ESTADO'] == 2) {
                echo "<td> RECHAZADO </td>";
            }
            ?>
            <form action="retirarSolicitud.php" method="post">
            <input type="hidden" name="ID_CONCIERTO" value="<?php echo $fila['ID']; ?>">
            <input type="hidden" name="IDMusico" value="<?php echo $IdMusico; ?>">
                <?php echo "<td align='center'><input type=\"submit\" value=\"RETIRAR SOLICITUD\" name=\"retirar\"></td>"; ?>
            </form><?php
                echo "<tr>";

        }
    }
    }

            ?>

    </table>
        <?php

        //METER FUNCIONES DE MUSICO AQUI O HTML CON CSS



    }
    if ($_SESSION["tipo"] == 1) {
        //METER FUNCIONES DE LOCAL AQUI O HTML CON CSS
        ?>

        <button id="botonmod" role="link" onclick="window.location='crearConciertos.php'">Crear Conciertos</button>
        <h3 id="titulo">Conciertos Propuestos en espera</h3>

        <?php
        $IdLocal = selectIDLocal($IdUsu);
        $conciertosPropuestos = selectConciertosPropuestos($IdLocal);
        $contadorConciertosCreados = 0;
        while ($fila = mysqli_fetch_assoc($conciertosPropuestos)) {
            $contadorConciertosCreados++;
        }
        if ($contadorConciertosCreados == 0) {
            echo "AUN NO HAS CREADO NINGUN CONCIERTO";
        } else {


            ?>

            <table id="tabla">
                <tr>
                    <th>NOMBRE DEL LOCAL</th>
                    <th>DIRECCION</th>
                    <th>GENERO</th>
                    <th>FECHA</th>
                    <th>HORA</th>
                    <th>PRECIO</th>
                    <th>Confirmar Concierto</th>
                    <th>Cancelar Concierto</th>
                    <th>Musicos Interesados</th>
                </tr>
                <?php
                $IdLocal = selectIDLocal($IdUsu);
                $conciertosPropuestos = selectConciertosPropuestos($IdLocal);
                $contadorPropuestos = 0;
                if (isset($conciertosPropuestos)) {
                    while ($fila = mysqli_fetch_assoc($conciertosPropuestos)) {
                        $IDCONCIERTO = $fila['ID'];
                        $contadorPropuestos++;
                        echo "<tr>";
                        echo "<td>" . $fila['NOMBRE'] . "</td>";
                        echo "<td>" . $fila['UBICACION'] . "</td>";
                        echo "<td>" . $fila['GENERO'] . "</td>";
                        echo "<td>" . $fila['FECHA'] . "</td>";
                        echo "<td>" . $fila['HORA'] . "</td>";
                        echo "<td>" . $fila['PRECIO'] . "</td>";
                        ?>
                        <form action="gestionarConcierto.php" method="post">
                        <input type="hidden" name="IDconcierto" value="<?php echo $IDCONCIERTO; ?>">
                        <?php echo "<td align='center'><input type=\"submit\" value=\"CONFIRMAR\" name=\"confirmar\"></td>"; ?>
                        </form>
                        <form action="gestionarConcierto.php" method="post">
                        <input type="hidden" name="IDconcierto" value="<?php echo $IDCONCIERTO; ?>">
                        <?php echo "<td align='center'><input type=\"submit\" value=\"CANCELAR\" name=\"cancelar\"></td>"; ?>
                        </form>
                        <form action="propuestaMusico.php" method="post">
                        <input type="hidden" name="IDconcierto" value="<?php echo $IDCONCIERTO; ?>">
                        <?php echo "<td align='center'><input type=\"submit\" value=\"INTERESADOS\" name=\"musicos\"></td>"; ?>
                        </form><?php
                        echo "<tr>";
                    }
                }
                ?>
            </table>
            <?php
            }
        ?>

            <h2 id="titulo">CONCIERTOS ACEPTADOS Y CANCELADOS</h2>
<?php
$conciertosPropuestos = selectConciertosLocal();
$contadorConciertos2 = 0;
while ($fila = mysqli_fetch_assoc($conciertosPropuestos)) {
    $contadorConciertos2++;
}
if ($contadorConciertos2 == 0) {
    echo "ACTUALMENTE NO HAY CONCIERTOS ACEPTADOS O RECHAZADOS PARA MOSTRAR 2";
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
        <th>ESTADO</th>
    </tr>
    <?php
    $conciertosPropuestos = selectConciertosLocal();
    if (isset($conciertosPropuestos)) {
        while ($fila = mysqli_fetch_assoc($conciertosPropuestos)) {
            echo "<tr>";
            echo "<td>" . $fila['NOMBRE'] . "</td>";
            echo "<td>" . $fila['UBICACION'] . "</td>";
            echo "<td>" . $fila['GENERO'] . "</td>";
            echo "<td>" . $fila['FECHA'] . "</td>";
            echo "<td>" . $fila['HORA'] . "</td>";
            echo "<td>" . $fila['PRECIO'] . "</td>";
            if ($fila['ESTADO']==1){
                echo "<td>ACEPTADO</td>";
            }if ($fila['ESTADO']==2){
                echo "<td>RECHAZADO</td>";
            }
            echo "<tr>";
        }

    }
    }

    ?>

</table>
<?php



    }

    if ($_SESSION["tipo"] == 2) {

        //METER FUNCIONES DE FAN AQUI O HTML CON CSS
    }


    ?>

<!--Boton que te regresa a la pagina principal-->
<form action="index.php" method="post">
    <input id="botonmod" type="submit" value="Regresa a la pagina anterior">
</form>
<br><br>
<?php
} else {
    echo "<br>No te has logeado para poder acceder aqui ";
}

?>
<!-- Boton que nos envia a la pagina encargada de cerrar sesion  -->
<br>
</body>
</html>
