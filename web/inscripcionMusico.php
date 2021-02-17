<?php
//iniciamos sesion
session_start();
//Llamamos a las funciones
require_once '../BBDD/bbdd.php';
$IdUsu = $_SESSION['IdUsu'];
// verificamos la siguiente informacion
//Verificamos que se haya logeado el usuario
if (isset($_SESSION["username"])) {
    //Pasamos por post los datos del formulario
    if (isset($_POST["participar"])) {
        $idconcierto = $_POST["IDconcierto"];
        $IdMusico = selectIDMusico($IdUsu);
        $resultado=añadirInscripcion($IdMusico,$idconcierto);
        if ($resultado == "ok") {
            header('Location: pagUsuLogeado.php');
        } else {
            echo "$resultado";
        }
    }else{
        header('Location: index.php');
    }
}else{
    header('Location: index.php');
}
