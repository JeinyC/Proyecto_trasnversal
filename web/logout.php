<?php
//Seleccionamos todas las sesiones abiertas
@session_start();
//Las cerramos con el siguiente comando
session_destroy();
//Reedirigimos hacia el login
header("Location: index.php");
?>
