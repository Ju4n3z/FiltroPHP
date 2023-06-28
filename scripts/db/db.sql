CREATE DATABASE campuslands;

USE campuslands;

CREATE TABLE pais(
    idPais INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombrePais VARCHAR(50) NOT NULL
);

CREATE TABLE departamento(
    idDep INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombreDep VARCHAR(50) NOT NULL,
    idPais INT NOT NULL
);

CREATE TABLE region(
    idReg INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombreReg VARCHAR(50) NOT NULL,
    idDep INT NOT NULL
);

CREATE TABLE campers(
    idCamper INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombreCamper VARCHAR(50) NOT NULL,
    apellidoCamper VARCHAR(50) NOT NULL,
    fechaNac DATE NOT NULL,
    idReg INT NOT NULL
);

ALTER TABLE departamento ADD CONSTRAINT fk_pais FOREIGN KEY (idPais) REFERENCES pais(idPais);

ALTER TABLE region ADD CONSTRAINT fk_dep FOREIGN KEY (idDep) REFERENCES departamento(idDep);

ALTER TABLE campers ADD CONSTRAINT fk_reg FOREIGN KEY (idReg) REFERENCES region(idReg);

INSERT INTO pais(nombrePais) VALUES ('Colombia');

INSERT INTO departamento(nombreDep, idPais) VALUES ('Santander', 1);

INSERT INTO region(nombreReg, idDep) VALUES ('Bucaramanga', 1);

