<?php
//iniciamos sesion
session_start();
//Llamamos a las funciones
require_once '../BBDD/bbdd.php';
// verificamos la siguiente informacion
//Verificamos que se haya logeado el usuario
if (isset($_SESSION["username"])) {
    //Pasamos por post los datos del formulario
    if (isset($_POST["confirmar"])) {
        $idconcierto = $_POST["IDconcierto"];
        $resultado = aceptarConcierto($idconcierto);
        if ($resultado == "ok") {
            header('Location: pagUsuLogeado.php');
        } else {
            echo "$resultado";
        }
    }elseif(isset($_POST["cancelar"])) {
    $idconcierto = $_POST["IDconcierto"];
    $resultado=cancelarConcierto($idconcierto);
    if ($resultado == "ok") {
        header('Location: pagUsuLogeado.php');
    } else {
        echo "$resultado";
    }
}else {
    header('Location: index.php');
    }
}else{
    header('Location: index.php');
}
