<?php
//iniciamos sesion
session_start();
//Llamamos a las funciones
require_once '../BBDD/bbdd.php';
// verificamos la siguiente informacion
//Verificamos que se haya logeado el usuario
if (isset($_SESSION["username"])) {
    //Pasamos por post los datos del formulario
    if (isset($_POST["votarLike"])) {
        $ID_USUARIO = $_POST["ID_USUARIO"];
        $ID_FAN = $_POST["ID_FAN"];
        $TIPO_VOTO = 'TRUE';
        if (comprobarVoto($ID_USUARIO, $ID_FAN) === true) {
            header('Location: index.php');
        } else {
            $resultado = añadirVoto($ID_USUARIO, $ID_FAN, $TIPO_VOTO);
            if ($resultado == "ok") {
                header('Location: index.php');
            } else {
                echo "$resultado";
            }
        }
    } elseif(isset($_POST["votarDislike"])) {
        $ID_USUARIO = $_POST["ID_USUARIO"];
        $ID_FAN = $_POST["ID_FAN"];
        $TIPO_VOTO = 'FALSE';
        if (comprobarVoto($ID_USUARIO, $ID_FAN) === true) {
            header('Location: index.php');
        } else {
            $resultado = añadirVoto($ID_USUARIO, $ID_FAN, $TIPO_VOTO);
            if ($resultado == "ok") {
                header('Location: index.php');
            } else {
                echo "$resultado";
            }
        }
    } else {
        header('Location: index.php');
    }
}


