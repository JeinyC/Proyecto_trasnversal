Drop database if exists proyecto_transversal;
Create database proyecto_transversal; 
Use proyecto_transversal; 

CREATE TABLE CIUDAD (
ID_CIUDAD INT (100) auto_increment PRIMARY KEY,
NOMBRE VARCHAR(100),
PROVINCIA VARCHAR(100)
);

CREATE TABLE USUARIOS(
ID_USUARIO integer(100) auto_increment primary KEY,
NOMBRE varchar(20),
TIPO INT (4),
USERNAME VARCHAR(20),
PASSWORD varchar(100),
EMAIL VARCHAR(320),
TELEFONO integer(9),
ID_CIUDAD integer (100),
FOREIGN KEY (ID_CIUDAD) REFERENCES CIUDAD(ID_CIUDAD)
);

CREATE TABLE MUSICO(
ID_MUSICO INTEGER (100) auto_increment PRIMARY KEY,
APELLIDO  varchar(20),
NOMBRE_ARTISTICO  varchar(20),
ID_USUARIO integer(100),
web VARCHAR (100),
GENERO VARCHAR(100),
FOREIGN KEY (ID_USUARIO) REFERENCES USUARIOS(ID_USUARIO)
);

CREATE TABLE LOCALES(
ID_LOCAL INTEGER (100) auto_increment PRIMARY KEY, 
ID_USUARIO integer(100),
TIPO_LOCAL VARCHAR (100),
UBICACION VARCHAR (100),
AFORO integer(255),
IMAGEN VARCHAR(100),
FOREIGN KEY (ID_USUARIO) REFERENCES USUARIOS(ID_USUARIO)
);

CREATE TABLE FAN(
ID_FAN INTEGER (100) auto_increment PRIMARY KEY, 
ID_USUARIO integer(100),
APELLIDO  varchar(20),
IMAGEN VARCHAR(100),
FOREIGN KEY (ID_USUARIO) REFERENCES USUARIOS(ID_USUARIO)
);

CREATE TABLE ENCUENTRO (
ID_MUSICO INTEGER (100),
ID_GROUP INTEGER (100),
ID_LOCAL INTEGER (100),
HORA_DIA DATETIME,
COMENTARIO VARCHAR(100),
FOREIGN KEY (ID_MUSICO) REFERENCES MUSICO(ID_MUSICO),
FOREIGN KEY (ID_LOCAL) REFERENCES LOCALES(ID_LOCAL)
);

CREATE TABLE CONCIERTO (
ID_CONCIERTO INTEGER (100) auto_increment PRIMARY KEY,
FECHA_HORA datetime,
ID_MUSICO INTEGER (100),
ID_GROUP INTEGER (100),
ID_LOCAL INTEGER (100),
PRECIO INTEGER(100),
GENERO VARCHAR(100),
FOREIGN KEY (ID_MUSICO) REFERENCES MUSICO(ID_MUSICO),
FOREIGN KEY (ID_LOCAL) REFERENCES LOCALES(ID_LOCAL)
);

CREATE TABLE VOTOS(
ID_FAN INTEGER (100),
ID_MUSICO INTEGER (100),
ID_CONCIERTO INTEGER (100),
VOTO BOOLEAN,
FOREIGN KEY (ID_FAN) REFERENCES FAN(ID_FAN),
FOREIGN KEY (ID_MUSICO) REFERENCES MUSICO(ID_MUSICO),
FOREIGN KEY (ID_CONCIERTO) REFERENCES CONCIERTO(ID_CONCIERTO)
);




