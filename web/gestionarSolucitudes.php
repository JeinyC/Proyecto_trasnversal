<?php
//iniciamos sesion
session_start();
//Llamamos a las funciones
require_once '../BBDD/bbdd.php';
// verificamos la siguiente informacion
//Verificamos que se haya logeado el usuario
if (isset($_SESSION["username"])) {
    //Pasamos por post los datos del formulario
    if (isset($_POST["aceptar"])) {
        $idconcierto = $_POST["IDconcierto"];
        $IDMusico = $_POST["IDMUSICO"];
        $resultado = aceptarMusico($idconcierto,$IDMusico);
        if ($resultado == "ok") {
            header('Location: pagUsuLogeado.php');
        } else {
            echo "$resultado";
        }
    }elseif(isset($_POST["rechazar"])) {
        $idconcierto = $_POST["IDconcierto"];
        $IDMusico = $_POST["IDMUSICO"];
        $resultado=rechazarMusico($idconcierto,$IDMusico);
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


