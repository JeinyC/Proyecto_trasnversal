<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro</title>
    <link href="../src/img/pngocean.com(2).png" type="image/png">
    <link rel="stylesheet" type="text/css" href="../src/css/registro.css">
</head>
<body>

</body>
</html>
<div id=titulo>
    <h1>REGISTRATE</h1>
<img src="../src/img/pngocean.com(2).png" width="70%">
    <form action="index.php" method="post">
        <div style="text-align: center"><input id="boton" type="submit" value="Regresa a la pagina anterior"></div>
    </form>
<!-- div unidos no separar -->
</div><div id=tabla>
    <table  align="Center">
        <td align="Center">
            <br><br>
                <form id="tablaformu" action="" method="POST">
                    <br><br>
                    <button id="boton" onclick="window.location.href='registro.php'" name="musico" value="Musico">
                        Musico
                    </button>
                    <button id="boton" onclick="window.location.href='registro.php'" name="local" value="Local">
                        Local
                    </button>
                    <button id="boton" onclick="window.location.href='registro.php'" name="fan" value="Fan">
                        Fan
                    </button>
                    <br><br>
                </form>
                <?php
                require_once '../BBDD/bbdd.php';
                if (isset($_POST["musico"])) {
                    ?>
                    <form id="formu" action="" method="POST">

                        <p>Nombre de Usuario <input class="musico"
                                                    type="text"
                                                    name="usuario"
                                                    value=""
                                                    maxlength="100"
                                                    required></p>
                        <p>Contraseña <input type="password"
                                             class="musico"
                                             name="contraseña"
                                             value=""
                                             minlength="4"
                                             required></p>
                        <p> Verificar contraseña <input type="password"
                                                        class="musico"
                                                        name="contraseña2"
                                                        value=""
                                                        required></p>
                        <p> Nombre <input class="musico"
                                          type="text"
                                          name="nombre"
                                          maxlength="200"
                                          value=""
                                          required></p>
                        <p> Apellido <input type="text"
                                            class="musico"
                                            name="apellido"
                                            maxlength="50"
                                            value=""
                                            required></p>


                        <p> Email <input type="email"
                                         class="musico"
                                         name="email"
                                         value=""
                                         required></p>
                        <p> Nº Telefono <input type="number"
                                               class="musico"
                                               name="numero"
                                               value=""
                                               required></p>
                        <p>Genero de musica <select class="musico" name="genero">
                                <option value="1">Reggae</option>
                                <option value="2">Rock</option>
                                <option value="3">Jazz</option>
                                <option value="4">Pop</option>
                                <option value="5">Electro</option>
                                <option value="6">Post-hardcore</option>
                                <option value="7">Dance</option>
                                <option value="8">Hip-Hop</option>
                                <option value="9">Flamenco</option>
                                <option value="10">Punk</option>
                                <option value="11">Salsa</option>
                                <option value="12">Rap</option>
                            </select>
                        </p>
                        <p> Pagina web <input type="text"
                                              class="musico"
                                              name="web"
                                              maxlength="50"
                                              value=""
                                              required</p>
                        <p> Nombre artistico <input type="text"
                                                    class="musico"
                                                    name="artisticName"
                                                    maxlength="50"
                                                    value=""
                                                    required</p>
                        <p> Nº de componentes del grupo <input type="number"
                                                               class="musico"
                                                               name="numComponentes"
                                                               min="1" max="10"
                                                               value=""
                                                               required</p>
                        <p>Provincia <select name="provincia" class="musico">
                                <option value='1'>Barcelona</option>
                                <option value='2'>Caceres</option>
                                <option value='3'>Teruel</option>
                                <option value='4'>Cuenca</option>
                                <option value='5'>Burgos</option>
                                <option value='6'>Ciudad Real</option>
                                <option value='7'>Cadiz</option>
                                <option value='8'>Castellon</option>
                                <option value='9'>Valencia</option>
                                <option value='10'>Zamora</option>
                                <option value='11'>Pontevedra</option>
                                <option value='12'>Tarragona</option>
                                <option value='13'>Madrid</option>
                                <option value='14'>Mallorca</option>
                                <option value='15'>Asturias</option>
                                <option value='16'>Tenerife</option>
                                <option value='17'>Gerona</option>
                                <option value='18'>Girona</option>
                                <option value='19'>Zaragoza</option>
                                <option value='20'>Granada</option>
                            </select></p>
                        <input type="hidden" name="tipo" value="0">
                        <input id="miniboton" type="submit" value="Registrate" name="registromusico">
                    </form>
                    <?php
                }
                ?>
                <?php
                if (isset($_POST["fan"])) {
                    ?>
                    <form  id="formu" action="" method="POST">

                        <p> Nombre de Usuario  <input type="text"
                                                  class="fan"
                                                  name="usuario"
                                                  value=""
                                                  maxlength="10"
                                                  required></p>
                        <p>Contraseña <input type="password"
                                          class="fan"
                                          name="contraseña"
                                          value=""
                                          minlength="3"
                                          required></p>
                        <p> Verificar contraseña:<input type="password"
                                                        class="fan"
                                                    name="contraseña2"
                                                    value=""
                                                    required></p>
                        <p> Email <input type="email"
                                      class="fan"
                                      name="email"
                                      value=""
                                      required></p>
                        <p> Nombre <input type="text"
                                      class="fan"
                                      name="nombre"
                                      maxlength="20"
                                      value=""
                                      required></p>
                        <p> Apellido <input type="text"
                                            class="fan"
                                        name="apellido"
                                        maxlength="50"
                                        value=""
                                        required></p>

                        <p> Provincia <select name="provincia"  class="fan">
                            <option value='1'>Barcelona</option>
                            <option value='2'>Caceres</option>
                            <option value='3'>Teruel</option>
                            <option value='4'>Cuenca</option>
                            <option value='5'>Burgos</option>
                            <option value='6'>Ciudad Real</option>
                            <option value='7'>Cadiz</option>
                            <option value='8'>Castellon</option>
                            <option value='9'>Valencia</option>
                            <option value='10'>Zamora</option>
                            <option value='11'>Pontevedra</option>
                            <option value='12'>Tarragona</option>
                            <option value='13'>Madrid</option>
                            <option value='14'>Mallorca</option>
                            <option value='15'>Asturias</option>
                            <option value='16'>Tenerife</option>
                            <option value='17'>Gerona</option>
                            <option value='18'>Girona</option>
                            <option value='19'>Zaragoza</option>
                            <option value='20'>Granada</option>
                        </select></p>
                       <p> Nº Telefono <input type="number"
                                           class="fan"
                                           name="numero"
                                           max="999999999"
                                           title="Introduce 9 digitos"
                                           value=""
                                           required></p>
                        <p>Añadir imagen</p>
                        <p><input name="archivo" type="file"/></p>
                        <input type="hidden" name="tipo" value="2">
                        <input id="miniboton" type="submit" value="Registrate" name="registrofan">
                    </form>
                    <?php
                }
                ?>
                <?php
                if (isset($_POST["local"])) {
                    ?>
                    <form  id="formu" action="" method="POST">

                        <p> Nombre de Usuario: <input type="text"
                                                      class="local"
                                                  name="usuario"
                                                  value=""
                                                  maxlength="10"
                                                  required></p>
                        <p> Contraseña <input type="password"
                                              class="local"
                                          name="contraseña"
                                          value=""
                                          minlength="4"
                                          required></p>
                        <p>Verificar contraseña:<input type="password"
                                                       class="local"
                                                       name="contraseña2"
                                                    value=""
                                                    required></p>
                        <p> Email: <input type="email"
                                      name="email"
                                      value=""
                                      required></p>
                       <p> Nombre del local:<input type="text"
                                                       class="local"
                                                name="nombreLocal"
                                                maxlength="20"
                                                value=""
                                                required></p>
                        <p>Aforo <input type="number"
                                        class="local"
                                     name="aforo"
                                     max="10000000"
                                     value=""
                                     required></p>
                        <p>Direccion <input type="text"
                                            class="local"
                                         name="direccion"
                                         maxlength="50"
                                         value=""
                                         required></p>
                        <p>Provincia <select name="provincia" class="local" >
                            <option value='1'>Barcelona</option>
                            <option value='2'>Caceres</option>
                            <option value='3'>Teruel</option>
                            <option value='4'>Cuenca</option>
                            <option value='5'>Burgos</option>
                            <option value='6'>Ciudad Real</option>
                            <option value='7'>Cadiz</option>
                            <option value='8'>Castellon</option>
                            <option value='9'>Valencia</option>
                            <option value='10'>Zamora</option>
                            <option value='11'>Pontevedra</option>
                            <option value='12'>Tarragona</option>
                            <option value='13'>Madrid</option>
                            <option value='14'>Mallorca</option>
                            <option value='15'>Asturias</option>
                            <option value='16'>Tenerife</option>
                            <option value='17'>Gerona</option>
                            <option value='18'>Girona</option>
                            <option value='19'>Zaragoza</option>
                            <option value='20'>Granada</option>
                        </select></p>
                        <p> Nº Telefono:<input type="number"
                                               class="local"
                                           name="numero"
                                           max="999999999"
                                           title="Introduce 9 digitos"
                                           value=""
                                           required></p>
                        <p>Añadir imagen</p>
                        <p> <input name="archivo" type="file"></p>
                        <input type="hidden" name="tipo" value="1">
                        <input id="miniboton" type="submit" value="Registrate" name="registrolocal">
                    </form>
                    <?php
                }

                //Si se pasa el valor "registro" ejecutamos el siguiente if
                if (isset($_POST["registromusico"])) {
                    //almacenamos el valor de las contraseñas introducidas
                    $password = $_POST["contraseña"];
                    $password2 = $_POST["contraseña2"];
                    // Verificamos que las 2 contraseñas sean iguales, de ser así se lo enviamos a la bbdd para poder añadirlo
                    if ($password == $password2) {
                        //Almacenamos los siguientes valores
                        $username = $_POST["usuario"];
                        $password = $_POST["contraseña"];
                        $email = $_POST["email"];
                        $name = $_POST["nombre"];
                        $surname = $_POST["apellido"];
                        $numero = $_POST["numero"];
                        $idGender = $_POST["genero"];
                        $web = $_POST["web"];
                        $artisticName = $_POST["artisticName"];
                        $numComponentes = $_POST["numComponentes"];
                        $tipoUsu = $_POST["tipo"];
                        $idCiudad = $_POST["provincia"];
                        //Comprobamos si ya existe el usuario
                        if (existUsername($username) === true) {
                            ?>
                            <br>
                            <?php
                            //Si se intenta registrar un usuario con el nombre de uno que ya existe, muestra el siguiente mensaje
                            //Y no añade nada
                            echo "<br><br><p  style='font-size: 30px'> Ya existe un usuario registrado con ese nombre</p>";
                            //Si no existe otro, ejecutamos el else
                        } else {
                            //Llamamos a la funcion de añadir usuario y comprobamos
                            $id = CrearUsuarios($username, $password, $email, $numero, $tipoUsu, $name, $surname, $idCiudad);
                            $resultado = createUsersMusico($id, $artisticName, $web, $idGender);

                            //Si se ha añadido correctamente lo enviamos a la siguiente pagina
                            if ($resultado == "ok") {
                                header('Location: index.php');
                                //Si no se ha añadido correctamente, mostramos el siguiente mensaje del error
                            } else {
                                echo "$resultado<br>";
                            }

                        }
                    } else {
                        // En caso de no ser iguales las contraseñas se lo notificamos

                        echo "<br><br><p  style='font-size: 30px'>Las contraseñas no son iguales</p>";
                    }
                }
                //Si se pasa el valor "registro" ejecutamos el siguiente if
                if (isset($_POST["registrofan"])) {
                    //almacenamos el valor de las contraseñas introducidas
                    $password = $_POST["contraseña"];
                    $password2 = $_POST["contraseña2"];
                    // Verificamos que las 2 contraseñas sean iguales, de ser así se lo enviamos a la bbdd para poder añadirlo
                    if ($password == $password2) {
                        //Almacenamos los siguientes valores
                        $username = $_POST["usuario"];
                        $password = $_POST["contraseña"];
                        $email = $_POST["email"];
                        $name = $_POST["nombre"];
                        $surname = $_POST["apellido"];
                        $numero = $_POST["numero"];
                        $foto = null;
                        $tipoUsu = $_POST["tipo"];
                        $idCiudad = $_POST["provincia"];
                        //Comprobamos si ya existe el usuario
                        if (existUsername($username) === true) {
                            ?>
                            <br>
                            <?php
                            //Si se intenta registrar un usuario con el nombre de uno que ya existe, muestra el siguiente mensaje
                            //Y no añade nada
                            echo "Ya existe un usuario registrado con ese nombre";
                            //Si no existe otro, ejecutamos el else
                        } else {
                            //Llamamos a la funcion de añadir usuario y comprobamos
                            $id = CrearUsuarios($username, $password, $email, $numero, $tipoUsu, $name, $surname, $idCiudad);
                            $resultado = createUsersFan($id, $foto);
                            //Si se ha añadido correctamente lo enviarmos a la siguiente pagina
                            if ($resultado == "ok") {
                                header('Location: index.php');
                                //Si no se ha añadido correctamente, mostramos el siguiente mensaje del error
                            } else {
                                echo "$resultado<br>";
                            }
                        }
                    } else {
                        // En caso de no ser iguales las contraseñas se lo notificamos

                        echo "<br><br> <p style='font-size: 30px'> Las contraseñas no son iguales</p>";
                    }
                }
                //Si se pasa el valor "registro" ejecutamos el siguiente if
                if (isset($_POST["registrolocal"])) {
                    //almacenamos el valor de las contraseñas introducidas
                    $password = $_POST["contraseña"];
                    $password2 = $_POST["contraseña2"];
                    // Verificamos que las 2 contraseñas sean iguales, de ser así se lo enviamos a la bbdd para poder añadirlo
                    if ($password == $password2) {
                        //Almacenamos los siguientes valores
                        $username = $_POST["usuario"];
                        $password = $_POST["contraseña"];
                        $email = $_POST["email"];
                        $nameLocal = $_POST["nombreLocal"];
                        $numero = $_POST["numero"];
                        $aforo = $_POST["aforo"];
                        $direccion = $_POST["direccion"];
                        $foto = null;
                        $tipoUsu = $_POST["tipo"];
                        $idCiudad = $_POST["provincia"];
                        $surname = null;
                        //Comprobamos si ya existe el usuario
                        if (existUsername($username) === true) {
                            ?>
                            <br>
                            <?php
                            //Si se intenta registrar un usuario con el nombre de uno que ya existe, muestra el siguiente mensaje
                            //Y no añade nada
                            echo "Ya existe un usuario registrado con ese nombre";
                            //Si no existe otro, ejecutamos el else
                        } else {
                            //Llamamos a la funcion de añadir usuario y comprobamos
                            $id = CrearUsuarios($username, $password, $email, $numero, $tipoUsu, $nameLocal, $surname, $idCiudad);
                            $resultado = createUsersLocal($id, $aforo, $direccion, $foto, $tipoUsu);

                            //Si se ha añadido correctamente lo enviamos a la siguiente pagina
                            if ($resultado == "ok") {
                                header('Location: index.php');
                                //Si no se ha añadido correctamente, mostramos el siguiente mensaje del error
                            } else {
                                echo "$resultado<br>";
                            }
                        }
                    } else {
                        // En caso de no ser iguales las contraseñas se lo notificamos

                        echo "<br><br> <p style='font-size: 30px'>Las contraseñas no son iguales.</p>";
                    }
                }
                ?>
            </table>
        </td>
</div>

