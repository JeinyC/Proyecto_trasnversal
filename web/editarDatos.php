<?php
//Iniciamos sesion en la bbdd
session_start();
// Llamamos a la bbdd
require_once '../BBDD/bbdd.php';
// verificamos la siguiente informacion
if (isset($_SESSION["username"])) {
    $username = $_SESSION['username'];
    // Verificamos si el usuario tiene el nivel de permisos requeridos
    // Con la siguiente funcion podremos modificar los usuarios con los datos que introduzcamos ahora
    ?>
    <!--div y tablas meramente esteticas-->
        <div align="center" id=titulo></h2>
        <table border=1 WIDTH="50%">
        <td align="Center">
        <div id=tabla>
        <!--Alineamos el contenido al centro-->
        <table align="center" WIDTH="100%">
            <div id=titulo><h3 style="color:Black">Modificacion de perfil </h3>
                <?php
        if (isset($_POST['ModificarNom'])||isset($_POST['modificarNombre'])){
            $nombre=$_POST["NOMBRE"];
            ?>
                <form method="POST">
                <table align="center">
                    <!-- Creamos el siguiente formulario el cual mostrará tambien el valor que tenia dicho usuario en cada apartado -->
                    <p>Nombre Actual: <?php echo $nombre ?></p>
                    <form method="POST">
                    <p>Nuevo nombre:<input type="text" name="nombreNuevo" value="" maxlength="30" required></p>
                    <!-- Recogemos los datos introducidos -->
                    <p><input type="submit" name="modificarNombre" value="Modificar">

                    <?php
                    //Cuando le se pulse el boton modificar se almacenan los siguientes valores
                    if (isset($_POST["modificarNombre"])) {
                        echo "hola";
                        $nombreNuevo = $_POST["nombreNuevo"];
                        $resultado = updateNom($nombreNuevo,$username);
                        if ($resultado == "ok") {
                            header('Location:pagUsuLogeado.php');
                        } else {
                            echo "Error: $resultado";
                        }
                    }
        }



if (isset($_POST["ModificarApe"])||isset($_POST['modificarApellidoNuevo'])){
    $apellido=$_POST["APELLIDO"];

            ?>
            <form method="POST">
                <table align="center">
                    <!-- Creamos el siguiente formulario el cual mostrará tambien el valor que tenia dicho usuario en cada apartado -->
                    <p>Apellido Actual: <?php echo $apellido ?></p>
                    <p>Nuevo apellido:<input type="text" name='apellidoNuevo' value="" maxlength="30" required></p>
                    <!-- Recogemos los datos introducidos -->
                    <p><input type="submit" name="modificarApellidoNuevo" value="Modificar">
                </table>
            </form>
            <?php
            //Cuando le se pulse el boton modificar se almacenan los siguientes valores
            if (isset($_POST['modificarApellidoNuevo'])) {
                $apellidoNuevo = $_POST["apellidoNuevo"];
                //Si todo esta correctamente, la siguiente funcion se encargará de modificar los datos en la bbdd
                $resultado = updateApe($apellidoNuevo,$username);
                if ($resultado == "ok") {
                    header('Location: pagUsuLogeado.php');
                } else {
                    echo "Error: $resultado";
                }
            }
        }
if (isset($_POST["ModificarCiu"])||isset($_POST['modificarProvinciaNueva'])) {
    $ciudad=$_POST["NOMBRECIUDAD"];
    ?>
    <form method="POST">
        <table align="center">
                <!-- Creamos el siguiente formulario el cual mostrará tambien el valor que tenia dicho usuario en cada apartado -->
                <p>Provincia Actual: <?php echo $ciudad ?></p>
                <p>Nueva provincia:<select name="provincia">
                        <option value='1' >Barcelona</option>
                        <option value='2'>Caceres</option>
                        <option value='3' >Teruel</option>
                        <option value='4'>Cuenca</option>
                        <option value='5' >Burgos</option>
                        <option value='6' >Ciudad Real</option>
                        <option value='7' >Cadiz</option>
                        <option value='8' >Castellon</option>
                        <option value='9'>Valencia</option>
                        <option value='10' >Zamora</option>
                        <option value='11' >Pontevedra</option>
                        <option value='12' >Tarragona</option>
                        <option value='13' >Madrid</option>
                        <option value='14' >Mallorca</option>
                        <option value='15' >Asturias</option>
                        <option value='16' >Tenerife</option>
                        <option value='17' >Gerona</option>
                        <option value='18' >Girona</option>
                        <option value='19' >Zaragoza</option>
                        <option value='20' >Granada</option>
                    </select></p>
                <!-- Recogemos los datos introducidos -->
                <p><input type="submit" name="modificarProvinciaNueva" value="Modificar">
            </table>
        </form>
        <?php
        //Cuando le se pulse el boton modificar se almacenan los siguientes valores
        if (isset($_POST['modificarProvinciaNueva'])) {
            $provincia = $_POST["provincia"];
            //Si todo esta correctamente, la siguiente funcion se encargará de modificar los datos en la bbdd
            $resultado = updateCiu($provincia,$username);
            if ($resultado == "ok") {
                header('Location: pagUsuLogeado.php');
            } else {
                echo "Error: $resultado";
            }
        }
    }

if (isset($_POST["ModificarEma"])||isset($_POST['modificarEmailNuevo'])) {
    $email=$_POST["EMAIL"];

    ?>
    <form method="POST">
        <table align="center">
            <!-- Creamos el siguiente formulario el cual mostrará tambien el valor que tenia dicho usuario en cada apartado -->
            <p>Email Actual: <?php echo $email ?></p>
            <p>Nuevo email:<input type="email" name='emailNuevo' value=" " maxlength="40" required></p>
            <!-- Recogemos los datos introducidos -->
            <p><input type="submit" name="modificarEmailNuevo" value="Modificar">
        </table>
    </form>
    <?php
    //Cuando le se pulse el boton modificar se almacenan los siguientes valores
    if (isset($_POST['modificarEmailNuevo'])) {
        $emailNuevo = $_POST["emailNuevo"];
        //Si todo esta correctamente, la siguiente funcion se encargará de modificar los datos en la bbdd
        $resultado = updateEmail($emailNuevo,$username);
        if ($resultado == "ok") {
            header('Location: pagUsuLogeado.php');
        } else {
            echo "Error: $resultado";
        }
    }
}
elseif (isset($_POST["ModificarTel"])||isset($_POST['modificarTelefonoNuevo'])) {
    $telefono=$_POST["TELEFONO"];

    ?>
    <form method="POST">
        <table align="center">
            <!-- Creamos el siguiente formulario el cual mostrará tambien el valor que tenia dicho usuario en cada apartado -->
            <p>Numero Actual: <?php echo $telefono ?></p>
            <p>Nuevo numero:<input type="number" name='numeroNuevo' value=" " required></p>
            <!-- Recogemos los datos introducidos -->
            <p><input type="submit" name="modificarTelefonoNuevo" value="Modificar">
        </table>
    </form>
    <?php
    //Cuando le se pulse el boton modificar se almacenan los siguientes valores
    if (isset($_POST['modificarTelefonoNuevo'])) {
        $telefonoNuevo = $_POST["numeroNuevo"];
        //Si todo esta correctamente, la siguiente funcion se encargará de modificar los datos en la bbdd
        $resultado = updateNum($telefonoNuevo,$username);
        if ($resultado == "ok") {
            header('Location: pagUsuLogeado.php');
        } else {
            echo "Error: $resultado";
        }
    }
}
?>
 </div>
    </td>

    </table>
    </div>
    </div>
    <br>
    </table>
<?php



}else {
    // Si el usuario no tiene acceso a esta pagina se lo mostrará con el siguiente mensaje
    echo "<br>Necesitas logearte";
}
?> <br><br><br>

<a class="boton2"  href="pagUsuLogeado.php">Pulse aquí para regresar al menu</a><br>
<!-- css aplicando estilos al boton -->
</body>
</html>