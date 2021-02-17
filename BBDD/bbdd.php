<?php
// Función que se conecta a la bbdd
function conectar()
{
    $conexion = mysqli_connect("localhost", "root", "", "GRUPO4");
    if (!$conexion) {
        die("Error al conectar" . mysqli_connect_error());
    }
    return $conexion;
}

// Función que cierra la conexión
function desconectar($conexion)
{
    mysqli_close($conexion);
}

//Funcion que se encarga de verificar si existe un usuario con el username que le pasamos;
function existUsername($username)
{
    $c = conectar();
    $select = "select * from USUARIOS where USERNAME='$username'";
    // Ejecutamos la consulta recogiendo el resultado
    $resultado = mysqli_query($c, $select);
    // Comprobamos cuantas filas tiene
    if (mysqli_num_rows($resultado) === 1) {
        $resultado = true;
    } else {
        $resultado = false;
    }
    desconectar($c);
    return $resultado;
}
function CrearUsuarios($username, $password, $email, $numero, $tipoUsu, $name,$surname,$idCiudad){
    $id = -1;
    $password_cifrado = password_hash($password,PASSWORD_DEFAULT);
    $c = Conectar();
    $insert =  "insert into USUARIOS value(null,'$name','$surname',$tipoUsu,'$username','$password_cifrado','$email',$numero,$idCiudad)";
    $resultado = mysqli_query($c,$insert);
    if($resultado == true)
    {
        $resultado = mysqli_query($c,"select LAST_INSERT_ID()");
        if($resultado)
        {
            $id = mysqli_fetch_assoc($resultado)['LAST_INSERT_ID()'];
        }
    }
    Desconectar($c);
    return $id;
}
//Funcion que se encarga de crear y añadir un usuario a la bbdd del tipo locales
function createUsersLocal($id,$aforo, $direccion, $foto,$tipoUsu){
    $c = Conectar();
    //insertamos los datos en la tabla  usuario y la tabla locales
    $insert =  "insert into LOCALES value(null,$id,$tipoUsu,'$direccion',$aforo,'$foto')";
    // si no se insertan correctamente los datos en la tabla USUARIOS o en la tabla locales
    if (mysqli_query ($c, $insert)){
        $resultado = "ok";
    }else {
        $resultado = "ERROR:" . mysqli_error($c);
    }
    desconectar($c);
    return $resultado;
}

//Funcion que se encarga de crear y añadir un usuario a la bbdd del tipo fan
function createUsersFan($id,$foto){
    $c = Conectar();
    //insertamos los datos en la tabla  usuario y la tabla fan
    $insert =  "insert into FAN value(null,$id,'$foto')";
    // si no se insertan correctamente los datos en la tabla USUARIOS o en la tabla locales
    if (mysqli_query ($c, $insert)){
        $resultado = "ok";
    }else {
        $resultado = "ERROR:" . mysqli_error($c);
    }
    desconectar($c);
    return $resultado;
}


//Funcion que se encarga de crear y añadir un usuario a la bbdd del tipo musico
function createUsersMusico($id, $artisticName, $web,$idGender){
    $c = conectar();
    //insertamos los datos en la tabla  usuario y la tabla musico
    $insert =  "insert into MUSICO value(null,'$artisticName',$id,$idGender,'$web')";
    // si no se insertan correctamente los datos en la tabla USUARIOS o en la tabla Musicos

    if (mysqli_query ($c, $insert)){
        $resultado = "ok";

    }else {
        $resultado = "ERROR:" . mysqli_error($c);
    }
    desconectar($c);
    return $resultado;
}

// Funcion encargada de verificar si existe la contraseña de un usuario especifico
function login($user, $password) {
    $c = conectar();
    $select = "select password from USUARIOS where username='$user'";
    $resultado = mysqli_query($c, $select);
    if (mysqli_num_rows($resultado) == 0) {
        $verfication = false;
    } else {
        $fila = mysqli_fetch_assoc($resultado);
        $verfication = password_verify($password, $fila["password"]);
    }
    desconectar($c);
    return $verfication;
}

//Funcion que devuelve el tipo de usuario pasandole un usuario
function selectTypeUsu($user)
{
    $c = conectar();
    $select = "select tipo from USUARIOS where username='$user'";
    $resultado = mysqli_query($c, $select);
    $fila = mysqli_fetch_assoc($resultado); //recoge la consulta msquli_query y escoge solo la fila que coincide con el select
    if ($fila == null) {
        $fila == 0;
    } else {
        $tipoUsuario = $fila["tipo"];
        desconectar($c);
        return $tipoUsuario;
    }
}
//Funcion que devuelve el id de usuario pasandole un usuario
function selectIdUsu($user) {
    $c = conectar();
    $select = "select ID_USUARIO from USUARIOS where username='$user'";
    $resultado = mysqli_query($c, $select);
    $fila = mysqli_fetch_assoc($resultado); //recoge la consulta msquli_query y escoge solo la fila que coincide con el select
    if ($fila==null){
        $fila==0;
    }else{
    $tipoUsuario = $fila["ID_USUARIO"];
    desconectar($c);
    return $tipoUsuario;
}
}
//Funcion que devuelve el id de usuario pasandole un usuario
function selectIDFan($IDUsu) {
    $c = conectar();
    $select = "select ID_FAN from fan where ID_USUARIO='$IDUsu'";
    $resultado = mysqli_query($c, $select);
    $fila = mysqli_fetch_assoc($resultado); //recoge la consulta msquli_query y escoge solo la fila que coincide con el select
    if ($fila==null){
        $fila==0;
    }else{
        $tipoUsuario = $fila["ID_FAN"];
        desconectar($c);
        return $tipoUsuario;
    }
}
// Funcion encargada de llamar a todos los valores de usuario donde nombre_usuario sea igual que el introducido
function datosUsu($username) {
    $c = conectar();
    $select = "select * from USUARIOS where USERNAME = '$username'";
    $resultado = mysqli_query($c, $select);
    desconectar($c);
    return $resultado;
}
// Funcion encargada de delvolver el nombre de la ciudad introduciendole el id
function nomCiudad($id) {
    $c = conectar();
    $select = "select * from CIUDAD where ID_CIUDAD = $id";
    $resultado = mysqli_query($c, $select);
    desconectar($c);
    return $resultado;
}
//Funcion encargada de actualizar la tabla mensajes y la casilla de leido cambiarlo a 1 indicandole el id del mensaje
function updateNom($nombreNuevo,$username){
    $c=conectar();
    $update = "UPDATE USUARIOS set NOMBRE='$nombreNuevo'where USERNAME='$username'";
    if (mysqli_query ($c, $update)){
        $resultado = "ok";
    }else {
        $resultado = "ERROR:" . mysqli_error($c);
    }
    desconectar($c);
    return $resultado;
}

//Funcion encargada de actualizar la tabla mensajes y la casilla de leido cambiarlo a 1 indicandole el id del mensaje
function updateApe($apellidoNuevo,$username){
    $c=conectar();
    $select = "update USUARIOS set APELLIDO='$apellidoNuevo'where USERNAME='$username'";
    if (mysqli_query ($c, $select)){
        $resultado = "ok";

    }else {
        $resultado = "ERROR:" . mysqli_error($c);
    }
    desconectar($c);
    return $resultado;
}
//Funcion encargada de actualizar la tabla mensajes y la casilla de leido cambiarlo a 1 indicandole el id del mensaje
function updateCiu($provincia,$username){
    $c=conectar();
    $select = "update USUARIOS set ID_CIUDAD=$provincia where USERNAME='$username'";
    if (mysqli_query ($c, $select)){
        $resultado = "ok";

    }else {
        $resultado = "ERROR:" . mysqli_error($c);
    }
    desconectar($c);
    return $resultado;
}
//Funcion encargada de actualizar la tabla mensajes y la casilla de leido cambiarlo a 1 indicandole el id del mensaje
function updateEmail($emailNuevo,$username){
    $c=conectar();
    $select = "update USUARIOS set EMAIL='$emailNuevo' where USERNAME='$username'";
    if (mysqli_query ($c, $select)){
        $resultado = "ok";

    }else {
        $resultado = "ERROR:" . mysqli_error($c);
    }
    desconectar($c);
    return $resultado;
}
//Funcion encargada de actualizar la tabla mensajes y la casilla de leido cambiarlo a 1 indicandole el id del mensaje
function updateNum($telefonoNuevo,$username){
    $c=conectar();
    $select = "update USUARIOS set TELEFONO=$telefonoNuevo where USERNAME='$username'";
    if (mysqli_query ($c, $select)){
        $resultado = "ok";

    }else {
        $resultado = "ERROR:" . mysqli_error($c);
    }
    desconectar($c);
    return $resultado;
}

//funcion que selecciona a locales y musicos en orden.
function selectLocales(){
    $c = conectar();
    $select = "select u.NOMBRE as nombreusuario, locales.AFORO, locales.ubicacion as UBICACION, c.NOMBRE, u.TELEFONO, locales.ID_USUARIO  from locales
    inner join usuarios u on locales.id_usuario = u.ID_USUARIO
    inner join ciudad c on u.id_ciudad = c.id_ciudad order by c.nombre";
    $resultado = mysqli_query($c, $select);
    desconectar($c);
    return $resultado;
}

function selectMusicos(){
    $c = conectar();
    $select = "select musico.NOMBRE_ARTISTICO as NOMBRE, musico.WEB, g.NOMBRE as GENERO, MUSICO.ID_USUARIO from musico 
inner join genero g on musico.ID_GENERO = g.ID_GENERO order by g.NOMBRE;";
    $resultado = mysqli_query($c, $select);
    desconectar($c);
    return $resultado;
}
function crearConciertos($fechaConcierto, $horaConcierto, $idlocal, $precio,$genero){
    $c = Conectar();
    $insert =  "insert into CONCIERTO value(null, '$fechaConcierto', '$horaConcierto',$idlocal, $precio,$genero,0)";
    if (mysqli_query ($c, $insert)){
        $resultado = "ok";

    }else {
        $resultado = "ERROR:" . mysqli_error($c);
    }
    Desconectar($c);
    return $resultado;
}

//funcion que selecciona a los conciertos y locales en orden.
function selectConciertosEspera(){
    $c = conectar();
    $select = "select CONCIERTO.FECHA as FECHA, CONCIERTO.HORA as HORA, LOCALES.UBICACION as UBICACION, GENERO.NOMBRE as GENERO, USUARIOS.NOMBRE as NOMBRE, CIUDAD.NOMBRE as CIUDAD, CONCIERTO.ID_CONCIERTO as ID  from CONCIERTO 
    inner join LOCALES on CONCIERTO.ID_LOCAL = LOCALES.ID_LOCAL
    inner join USUARIOS on LOCALES.ID_USUARIO = USUARIOS.ID_USUARIO
    inner join CIUDAD on USUARIOS.ID_CIUDAD = CIUDAD.ID_CIUDAD
    inner join GENERO on CONCIERTO.ID_GENERO = GENERO.ID_GENERO where CONCIERTO.ESTADO=0 order by CONCIERTO.FECHA,CONCIERTO.HORA";
    $resultado = mysqli_query($c, $select);
    desconectar($c);
    return $resultado;

}
function selectIDMusico($IdUsu){
    $c = conectar();
    $select = "select ID_MUSICO FROM MUSICO WHERE ID_USUARIO=$IdUsu";
    $resultado = mysqli_query($c, $select);
    $fila = mysqli_fetch_assoc($resultado); //recoge la consulta msquli_query y escoge solo la fila que coincide con el select
    $resultado = $fila["ID_MUSICO"];
    desconectar($c);
    return $resultado;
}

function añadirInscripcion($IdMusico,$idconcierto){
    $c = Conectar();
    $insert =  "insert into SOLICITUD_MUSICOS values ($IdMusico,$idconcierto,0)";
    if (mysqli_query ($c, $insert)){
        $resultado = "ok";
    }else {
        $resultado = "ERROR:" . mysqli_error($c);
    }
    Desconectar($c);
    return $resultado;
}

function selectIdConciertoInscrito($IdMusico,$IDCONCIERTO){
    $c = conectar();
    $select = "SELECT * FROM GRUPO4.SOLICITUD_MUSICOS where ID_MUSICO=$IdMusico and ID_CONCIERTO=$IDCONCIERTO";
    $resultado = mysqli_query($c, $select);
    if (mysqli_num_rows($resultado) == 1) {
        $resultado = true;
    } else {
        $resultado = false;
    }
    desconectar($c);
    return $resultado;
}
function selectIDLocal($IdUsu){
    $c = conectar();
    $select = "select ID_LOCAL FROM GRUPO4.LOCALES WHERE ID_USUARIO=$IdUsu";
    $resultado = mysqli_query($c, $select);
    $fila = mysqli_fetch_assoc($resultado); //recoge la consulta msquli_query y escoge solo la fila que coincide con el select
    $idLocal = $fila["ID_LOCAL"];
    desconectar($c);
    return $idLocal;
}


function selectPropuestasEspera($IdMusico){
    $c = conectar();
    $select = "select CONCIERTO.FECHA as FECHA, CONCIERTO.HORA as HORA, LOCALES.UBICACION as UBICACION, GENERO.NOMBRE as GENERO, USUARIOS.NOMBRE as NOMBRE, CONCIERTO.ID_CONCIERTO as ID, SOLICITUD_MUSICOS.ESTADO as ESTADO  from CONCIERTO 
	inner join LOCALES on CONCIERTO.ID_LOCAL = LOCALES.ID_LOCAL
    inner join USUARIOS on LOCALES.ID_USUARIO = USUARIOS.ID_USUARIO
    inner join CIUDAD on USUARIOS.ID_CIUDAD = CIUDAD.ID_CIUDAD
    inner join SOLICITUD_MUSICOS on CONCIERTO.ID_CONCIERTO = SOLICITUD_MUSICOS.ID_CONCIERTO
    inner join GENERO on CONCIERTO.ID_GENERO = GENERO.ID_GENERO where CONCIERTO.ESTADO=0 AND SOLICITUD_MUSICOS.ID_MUSICO=$IdMusico order by CONCIERTO.FECHA,CONCIERTO.HORA ";
    $resultado = mysqli_query($c, $select);
    desconectar($c);
    return $resultado;

}


function selectConciertosPropuestos($IdLocal) {
    $c = conectar();
    $select = "select usuarios.NOMBRE, locales.UBICACION, genero.NOMBRE as GENERO, concierto.FECHA, concierto.HORA,CONCIERTO.ID_CONCIERTO as ID, concierto.PRECIO from genero 
    inner join concierto on genero.ID_GENERO = concierto.ID_GENERO 
    inner join locales on concierto.ID_LOCAL = locales.ID_LOCAL 
    inner join usuarios on locales.ID_USUARIO = usuarios.ID_USUARIO where concierto.ID_LOCAL = $IdLocal and concierto.ESTADO=0";
    $resultado = mysqli_query($c, $select);
    desconectar($c);
    return $resultado;
}

function selectConciertosAceptados() {
    $c = conectar();
    $select = "select USUARIOS.NOMBRE, LOCALES.UBICACION, GENERO.NOMBRE as GENERO, CONCIERTO.FECHA, CONCIERTO.HORA, CONCIERTO.PRECIO from GENERO 
    inner join CONCIERTO on GENERO.ID_GENERO = CONCIERTO.ID_GENERO 
    inner join LOCALES on CONCIERTO.ID_LOCAL = LOCALES.ID_LOCAL 
    inner join USUARIOS on LOCALES.ID_USUARIO = USUARIOS.ID_USUARIO 
    where concierto.ESTADO=1 order by CONCIERTO.FECHA,CONCIERTO.HORA";
    $resultado = mysqli_query($c, $select);
    desconectar($c);
    return $resultado;
}
function selectConciertosLocal() {
    $c = conectar();
    $select = "select USUARIOS.NOMBRE, LOCALES.UBICACION, GENERO.NOMBRE as GENERO, CONCIERTO.FECHA, CONCIERTO.HORA, CONCIERTO.PRECIO,CONCIERTO.ESTADO from GENERO 
    inner join CONCIERTO on GENERO.ID_GENERO = CONCIERTO.ID_GENERO 
    inner join LOCALES on CONCIERTO.ID_LOCAL = LOCALES.ID_LOCAL 
    inner join USUARIOS on LOCALES.ID_USUARIO = USUARIOS.ID_USUARIO 
    where concierto.ESTADO!=0 order by CONCIERTO.FECHA,CONCIERTO.HORA";
    $resultado = mysqli_query($c, $select);
    desconectar($c);
    return $resultado;
}
function aceptarConcierto($idConcierto) {
    $c = conectar();
    $update = "UPDATE concierto SET ESTADO = 1 WHERE ID_CONCIERTO LIKE $idConcierto";
    if (mysqli_query ($c, $update)){
        $resultado = "ok";

    }else {
        $resultado = "ERROR:" . mysqli_error($c);
    }
    desconectar($c);
    return $resultado;
}
function cancelarConcierto($idConcierto)
{
    $c = conectar();
    $update = "UPDATE concierto SET ESTADO = 2 WHERE ID_CONCIERTO LIKE $idConcierto";
    if (mysqli_query ($c, $update)){
        $resultado = "ok";

    }else {
        $resultado = "ERROR:" . mysqli_error($c);
    }
    desconectar($c);
    return $resultado;
}

function listadoInteresados($idConcierto){
    $c=conectar();
    $select="select USUARIOS.NOMBRE,USUARIOS.APELLIDO,MUSICO.NOMBRE_ARTISTICO,MUSICO.web,GENERO.NOMBRE as GENERO, USUARIOS.TELEFONO, MUSICO.ID_MUSICO as IDMUSICO from SOLICITUD_MUSICOS 
    inner join MUSICO on SOLICITUD_MUSICOS.ID_MUSICO = MUSICO.ID_MUSICO
    inner join USUARIOS on MUSICO.ID_USUARIO = USUARIOS.ID_USUARIO 
    inner join GENERO on MUSICO.ID_GENERO = GENERO.ID_GENERO
    inner join CIUDAD ON USUARIOS.ID_CIUDAD = CIUDAD.ID_CIUDAD
    where SOLICITUD_MUSICOS.ID_CONCIERTO=$idConcierto and SOLICITUD_MUSICOS.ESTADO=0";
    $resultado=mysqli_query($c,$select);
    desconectar($c);
    return $resultado;
}
function listadoMusicosConfirmados($idConcierto){
    $c=conectar();
    $select="select USUARIOS.NOMBRE,USUARIOS.APELLIDO,MUSICO.NOMBRE_ARTISTICO,MUSICO.web,GENERO.NOMBRE as GENERO, USUARIOS.TELEFONO, MUSICO.ID_MUSICO as IDMUSICO from SOLICITUD_MUSICOS 
    inner join MUSICO on SOLICITUD_MUSICOS.ID_MUSICO = MUSICO.ID_MUSICO
    inner join USUARIOS on MUSICO.ID_USUARIO = USUARIOS.ID_USUARIO 
    inner join GENERO on MUSICO.ID_GENERO = GENERO.ID_GENERO
    inner join CIUDAD ON USUARIOS.ID_CIUDAD = CIUDAD.ID_CIUDAD
    where SOLICITUD_MUSICOS.ID_CONCIERTO=$idConcierto and SOLICITUD_MUSICOS.ESTADO=1";
    $resultado=mysqli_query($c,$select);
    desconectar($c);
    return $resultado;
}
function aceptarMusico($idconcierto,$IDMusico) {
    $c = conectar();
    $update = "UPDATE SOLICITUD_MUSICOS SET ESTADO = 1 WHERE ID_CONCIERTO LIKE $idconcierto and ID_MUSICO LIKE $IDMusico";
    if (mysqli_query ($c, $update)){
        $resultado = "ok";

    }else {
        $resultado = "ERROR:" . mysqli_error($c);
    }
    desconectar($c);
    return $resultado;
}
function rechazarMusico($idconcierto,$IDMusico) {
    $c = conectar();
    $update = "UPDATE SOLICITUD_MUSICOS SET ESTADO = 2 WHERE ID_CONCIERTO LIKE $idconcierto and ID_MUSICO LIKE $IDMusico";
    if (mysqli_query ($c, $update)){
        $resultado = "ok";

    }else {
        $resultado = "ERROR:" . mysqli_error($c);
    }
    desconectar($c);
    return $resultado;
}
function retirarSolicitud($idconcierto,$IDMusico) {
    $c = conectar();
    $delete = "DELETE FROM SOLICITUD_MUSICOS WHERE ID_CONCIERTO LIKE $idconcierto and ID_MUSICO LIKE $IDMusico";
    if (mysqli_query ($c, $delete)){
        $resultado = "ok";
    }else {
        $resultado = "ERROR:" . mysqli_error($c);
    }
    desconectar($c);
    return $resultado;
}
function contadorLikes($ID_USU){
    $c = conectar();
    $select = "SELECT COUNT(ID_USUARIO) as numVotos from VOTOS WHERE ID_USUARIO=$ID_USU and tipoVoto=1";
    $resultado = mysqli_query($c, $select);
    $fila = mysqli_fetch_assoc($resultado); //recoge la consulta msquli_query y escoge solo la fila que coincide con el select
    $contLikes = $fila["numVotos"];
    desconectar($c);
    return $contLikes;
}
function añadirVoto($ID_USUARIO, $ID_FAN,$TIPO_VOTO){
    $c = Conectar();
    $insert =  "insert into VOTOS value($ID_USUARIO,$ID_FAN,TRUE,$TIPO_VOTO)";
    if (mysqli_query ($c, $insert)){
        $resultado = "ok";

    }else {
        $resultado = "ERROR1:" . mysqli_error($c);
    }
    Desconectar($c);
    return $resultado;
}
function comprobarVoto($ID_USUARIO,$ID_FAN)
{
    $c = conectar();
    $select = "select * from VOTOS where ID_USUARIO=$ID_USUARIO AND ID_FAN=$ID_FAN";
    // Ejecutamos la consulta recogiendo el resultado
    $resultado = mysqli_query($c, $select);
    // Comprobamos cuantas filas tiene
    if (mysqli_num_rows($resultado) === 1) {
        $resultado = TRUE;
    } else {
        $resultado = FALSE;
    }
    desconectar($c);
    return $resultado;
}