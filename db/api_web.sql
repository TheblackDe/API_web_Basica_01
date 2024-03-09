-- CREAR BASE DE DATOS--------------------------------
DROP DATABASE IF EXISTS api_web;
CREATE DATABASE api_web;
USE api_web;

-- CREAR TABLAS --------------------------------

CREATE TABLE usuarios(
	Id INT NOT NULL,
    Nombre VARCHAR (40) NOT NULL
);

-- CREAR PRIMARY KEY Y AUTO_INCREMENT --------------------------------

ALTER TABLE usuarios
	ADD PRIMARY KEY (Id),
    MODIFY Id INT NOT NULL AUTO_INCREMENT;
    




		

    

