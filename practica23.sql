CREATE DATABASE Practica23;
use Practica23;
CREATE USER 'muro'@'localhost' IDENTIFIED BY 'muro';
GRANT ALL ON practica23.* TO 'muro'@'localhost';
CREATE TABLE usuarios(
  id_usuario INT(3) auto_increment,
  nombre VARCHAR(30) NOT NULL,
  apellido1 VARCHAR(30) NOT NULL,
  apellido2 VARCHAR(30) NOT NULL,
  login VARCHAR(16) NOT NULL,
  pass VARCHAR(30) NOT NULL,
  CONSTRAINT id_usuario_pk PRIMARY KEY (id_usuario),
  CONSTRAINT login_uk UNIQUE (login)
);
SELECT * from usuarios;
CREATE TABLE publicaciones(
  id_publicacion INT(6) AUTO_INCREMENT,
  texto VARCHAR(300) NOT NULL,
  id_usuario INT(3),
  CONSTRAINT id_publicacion_pk PRIMARY KEY (id_publicacion),
  CONSTRAINT id_usuario_fk1 FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario)
);
SELECT * FROM publicaciones WHERE id_usuario=1;
CREATE TABLE puntuaciones(
  puntuacion INT(2) NOT NULL,
  id_usuario INT(3) NOT NULL,
  id_publicacion INT(3) NOT NULL,
  CONSTRAINT id_voto_pk PRIMARY KEY (id_usuario,id_publicacion),
  CONSTRAINT id_usuario_fk2 FOREIGN KEY (id_usuario) REFERENCES usuarios(id_usuario),
  CONSTRAINT id_publicacion_fk1 FOREIGN KEY (id_publicacion) REFERENCES publicaciones(id_publicacion)
);
DROP TABLE puntuaciones;
SELECT * FROM puntuaciones;
SELECT COUNT(puntuacion) as SUMA FROM puntuaciones WHERE id_publicacion=6;
