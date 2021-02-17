<!--div y tablas meramente esteticas-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Ooh-Music - login</title>
    <link rel="stylesheet" type="text/css" href="../src/css/login.css">
    <link rel="stylesheet" type="text/css" href="../src/tipografia/Doctor%20Glitch.otf">
    <link rel="shortcut icon" href="../src/img/Posicion_Logo.png" type="image/png">
</head>

<body>
<br/>
    <h1 class="h1Titulo" align="Center" style="color:black">INICIA SESION</h1>
<div style="width: 25% "><img src="../src/img/pngwave(3).png"></div>
    <div class="Divtabla"align="Center">
        <table align="Center" id="tabla">
                <br/>
                <form id="Formulario" action="" method="post">
                    <div class="usuario">
                        <p>Usuario</p>
                        <input type="text"
                               name="usuario"
                               value=""
                               style="color: white"
                               required><br><br>
                    </div>
                    <div class="contra">
                        <p>Contraseña</p>
                        <input type="password"
                               name="password"
                               value=""
                               style="color: white"
                               required>
                    </div>
                    <br/><br><br/><br>
                    <?php
                    //Llamamos a la bbdd
                    require_once '../BBDD/bbdd.php';
                    //Si se pulsa el boton ejecutamos el siguiente if
                    if (isset($_POST["login"])) {
                        //Almacenamos los siguientes valores
                        $user = $_POST["usuario"];
                        $password = $_POST["password"];
                        //Almacenamos en $verificacion el valor de respuesta de la funcion login
                        $verificacion = login($user, $password);
                        //$veritype almacena el tipo de usario que el usuario introducido

                        $veriType = selectTypeUsu($user);
                        $IdUsuario = selectIdUsu($user);
                        //Si la verificacion del nombre de usuario y contraseña son correctos ejecutamos el siguiente if
                        if ($verificacion) {
                            //Iniciamos sesion
                            session_start();
                            //Guardamos los valores del nombre de usuario y el tipo en la sesion
                            $_SESSION["username"] = $user;
                            $_SESSION["tipo"] = $veriType;
                            $_SESSION["IdUsu"] = $IdUsuario;
                            //Pues nos enviará a la pagina principal
                            header('Location: pagUsuLogeado.php');

                            //Si la verificacion falla
                        } else {
                            ?>
                            <?php
                            //Mostramos el siguiente mensaje indicando que el usuario o contraseña son incorrectos
                            echo '<div style="font-size: 20px;"><span style="color:black;text-align:center;">Usuario o contraseña incorrecta</span><br/></div>';
                        }
                    }
                    ?>

                    <input id="boton" type="submit" value="Iniciar sesion" name="login">
                </form><form action="registro.php" method="post">
                    <input id="boton" type="submit" value="No tienes cuenta?">
                </form>
                <br/><br/>
                <form action="index.php" method="post">
                    <input id="boton" type="submit" value="Regresa a la pagina anterior">
                </form>
        </table>
    </div>
<div style="width: 25% "></div>
</body>
</html>










