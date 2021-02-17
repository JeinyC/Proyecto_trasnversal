Drop database if exists proyecto_transversal;
Create database proyecto_transversal; 
Use proyecto_transversal; 

CREATE TABLE CIUDAD (
ID_CIUDAD INT (11) auto_increment PRIMARY KEY,
NOMBRE VARCHAR(100),
PROVINCIA VARCHAR(100)
);


CREATE TABLE USUARIOS(
ID_USUARIO integer(10) auto_increment primary KEY,
TIPO INT (4),
USERNAME VARCHAR(20),
PASSWORD varchar(20),
EMAIL VARCHAR(320),
TELEFONO tinyint(9),
ID_CIUDAD INT (11),
FOREIGN KEY (ID_CIUDAD) REFERENCES CIUDAD(ID_CIUDAD)
);


CREATE TABLE MUSICO(
ID_MUSICO INTEGER (10) auto_increment PRIMARY KEY,
NOMBRE varchar(20),
APELLIDO  varchar(20),
NOMBRE_ARTISTICO  varchar(20),
ID_USUARIO integer(10),
web VARCHAR (20),
GENERO VARCHAR(10),
FOREIGN KEY (ID_USUARIO) REFERENCES USUARIOS(ID_USUARIO)
);

CREATE TABLE LOCALES(
ID_LOCAL INTEGER (10) auto_increment PRIMARY KEY, 
ID_USUARIO integer(10),
TIPO_LOCAL VARCHAR (20),
UBICACION VARCHAR (20),
AFORO integer(255),
IMAGEN BOOLEAN,
FOREIGN KEY (ID_USUARIO) REFERENCES USUARIOS(ID_USUARIO)
);

CREATE TABLE FAN(
ID_FAN INTEGER (10) auto_increment PRIMARY KEY, 
ID_USUARIO integer(10),
NOMBRE varchar(20),
APELLIDO  varchar(20),
FOREIGN KEY (ID_USUARIO) REFERENCES USUARIOS(ID_USUARIO)
);

CREATE TABLE ADMINISTRADOR(
ID_ADMI INTEGER (10) auto_increment PRIMARY KEY, 
ID_USUARIO integer(10),
NOMBRE varchar(20),
APELLIDO  varchar(20),
FOREIGN KEY (ID_USUARIO) REFERENCES USUARIOS(ID_USUARIO)
);

CREATE TABLE ENCUENTRO (
ID_MUSICO INTEGER (10),
ID_GROUP INTEGER (10),
ID_LOCAL INTEGER (10),
HORA_DIA DATETIME,
COMENTARIO VARCHAR(20),
FOREIGN KEY (ID_MUSICO) REFERENCES MUSICO(ID_MUSICO),
FOREIGN KEY (ID_LOCAL) REFERENCES LOCALES(ID_LOCAL)
);

CREATE TABLE CONCIERTO (
ID_CONCIERTO INTEGER (10) auto_increment PRIMARY KEY,
FECHA_HORA datetime,
ID_MUSICO INTEGER (10),
ID_GROUP INTEGER (10),
ID_LOCAL INTEGER (10),
PRECIO INTEGER(20),
GENERO VARCHAR(10),
FOREIGN KEY (ID_MUSICO) REFERENCES MUSICO(ID_MUSICO),
FOREIGN KEY (ID_LOCAL) REFERENCES LOCALES(ID_LOCAL)
);

CREATE TABLE VOTOS(
ID_FAN INTEGER (10),
ID_MUSICO INTEGER (10),
ID_CONCIERTO INTEGER (10),
VOTO BOOLEAN,
FOREIGN KEY (ID_FAN) REFERENCES FAN(ID_FAN),
FOREIGN KEY (ID_MUSICO) REFERENCES MUSICO(ID_MUSICO),
FOREIGN KEY (ID_CONCIERTO) REFERENCES CONCIERTO(ID_CONCIERTO)
);




