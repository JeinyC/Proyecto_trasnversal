<?php
//iniciamos sesion
session_start();
//Llamamos a las funciones
require_once '../BBDD/bbdd.php';
// verificamos la siguiente informacion
//Verificamos que se haya logeado el usuario
if (isset($_SESSION["username"])) {
    //Pasamos por post los datos del formulario
    if (isset($_POST["retirar"])) {
        $idconcierto = $_POST["ID_CONCIERTO"];
        $IDMusico=$_POST["IDMusico"];
        $resultado =retirarSolicitud($idconcierto,$IDMusico);
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
