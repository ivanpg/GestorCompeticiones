DROP SCHEMA IF EXISTS gestorCompeticiones;
CREATE SCHEMA gestorCompeticiones;
USE gestorCompeticiones;

CREATE TABLE usuario (
	login varchar(15) UNIQUE NOT NULL,
	password varchar(50) UNIQUE NOT NULL,
	nombre VARCHAR(30) NOT NULL,
	apellidos VARCHAR(50) NOT NULL,
	email VARCHAR(50) DEFAULT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE clasificacion(
	id_clasificacion SMALLINT UNSIGNED NOT NULL,
	posicion_equipo SMALLINT UNSIGNED NOT NULL,
	nombre_equipo  VARCHAR(50) NOT NULL,
	puntosEquipo SMALLINT UNSIGNED NOT NULL,
	PRIMARY KEY (id_clasificacion,posicion_equipo)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE liga(
	id_liga SMALLINT UNSIGNED UNIQUE NOT NULL AUTO_INCREMENT,
	id_clasificacion SMALLINT UNSIGNED UNIQUE NOT NULL,
	nombre_competicion  VARCHAR(50) NOT NULL,
	equipos_competicion SMALLINT UNSIGNED NOT NULL,
	PRIMARY KEY (id_liga),
	CONSTRAINT fk_liga_clasificacion FOREIGN KEY (id_clasificacion) REFERENCES clasificacion (id_clasificacion) ON DELETE RESTRICT ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE jornada(
	id_liga SMALLINT UNSIGNED NOT NULL,
	id_jornada SMALLINT UNSIGNED NOT NULL,
	id_partido SMALLINT UNSIGNED UNIQUE NOT NULL AUTO_INCREMENT,
	fecha  DATE NOT NULL,
	equipoCasa VARCHAR(50) NOT NULL,
	equipoFuera VARCHAR(50) NOT NULL,
	goles_equipoCasa SMALLINT UNSIGNED NULL,
	goles_equipoFuera SMALLINT UNSIGNED NULL,
	PRIMARY KEY (id_liga,id_jornada,id_partido),
	CONSTRAINT fk_jornada_liga FOREIGN KEY (id_liga) REFERENCES liga (id_liga) ON DELETE RESTRICT ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE comentario(
	id_partido SMALLINT UNSIGNED NOT NULL,
	id_comentario SMALLINT UNSIGNED UNIQUE NOT NULL AUTO_INCREMENT,
	texto_comentario VARCHAR(200) DEFAULT NULL,
	PRIMARY KEY (id_partido,id_comentario),
	CONSTRAINT fk_comentario_jornada FOREIGN KEY (id_partido) REFERENCES jornada (id_partido) ON DELETE RESTRICT ON UPDATE CASCADE
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `gestorCompeticiones`.`usuario` (`login` ,`password` ,`nombre` ,`apellidos` ,`email`)
VALUES ('admin', MD5( 'admin' ) , 'usuario', 'Apellido1 Apellido2', 'usuario@gmail.com');