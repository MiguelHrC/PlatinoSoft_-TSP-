CREATE DATABASE IF NOT EXISTS TWEETMONITOR DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE TWEETMONITOR;

CREATE TABLE Tareas (
  idTareas INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Usuarios_idUsuarios INTEGER UNSIGNED NOT NULL,
  Nombre_tarea VARCHAR(50) NULL,
  Hora_inicio DATE NULL,
  Hora_fin DATE NULL,
  Lunes BOOL NULL,
  Martes BOOL NULL,
  Miercoles BOOL NULL,
  Jueves BOOL NULL,
  Viernes BOOL NULL,
  Sabado BOOL NULL,
  Domingo BOOL NULL,
  PRIMARY KEY(idTareas),
  INDEX Tareas_FKIndex1(Usuarios_idUsuarios)
);

CREATE TABLE Tweet (
  idTweet INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Usuarios_idUsuarios INTEGER UNSIGNED NOT NULL,
  Nombre_usuario VARCHAR(20) NULL,
  Fecha DATETIME NULL,
  Contenido TEXT NULL,
  PRIMARY KEY(idTweet),
  INDEX Tweet_FKIndex1(Usuarios_idUsuarios)
);

CREATE TABLE Usuarios (
  idUsuarios INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  Nombre_usuario VARCHAR(50) NULL,
  Contrasena VARCHAR(20) NULL,
  Correo VARCHAR(50) NULL,
  PRIMARY KEY(idUsuarios)
);


