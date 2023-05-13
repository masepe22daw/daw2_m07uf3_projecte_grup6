CREATE DATABASE IF NOT EXISTS universitat;
USE universitat;

CREATE TABLE PROJECTES (
  CodiProj CHAR(6) PRIMARY KEY,
  Nom VARCHAR(255),
  DataInici DATE,
  DataFinal DATE,
  Classificacio ENUM('Tècnica','Salut','Científica','Altres'),
  HoresAssignades INT,
  PressupostAssignat DECIMAL(10, 2),
  MaxNumInvestigadors INT,
  Responsable VARCHAR(255),
  Investigacio ENUM('Nacional','Europea','Internacional'),
  Idioma VARCHAR(255)
);

CREATE TABLE INVESTIGADORS (
  Passaport CHAR(9) PRIMARY KEY,
  CodiAssegMèdica VARCHAR(255),
  NomCognoms VARCHAR(255),
  Especialitat VARCHAR(255),
  Telefon VARCHAR(20),
  Adreça VARCHAR(255),
  Ciutat VARCHAR(255),
  País VARCHAR(255),
  Email VARCHAR(255) UNIQUE,
  Titulacio ENUM('Doctor','Master','Grau','Estudiant','Altres')
);

CREATE TABLE PARTICIPA (
  Passaport CHAR(9),
  CodiProj CHAR(6),
  DataInici DATE,
  DataFinal DATE,
  Retribucio DECIMAL(10, 2),
  ParticipacioProrrogable ENUM('Sí','No'),
  ParticipacioPublicacio ENUM('Sí','No'),
  PRIMARY KEY (Passaport, CodiProj),
  FOREIGN KEY (Passaport) REFERENCES INVESTIGADORS(Passaport),
  FOREIGN KEY (CodiProj) REFERENCES PROJECTES(CodiProj)
);

CREATE TABLE users (
  id int (11) AUTO_INCREMENT  PRIMARY KEY,
  name VARCHAR(255),
  email VARCHAR(255) UNIQUE,
  password VARCHAR(255),
  Tipus ENUM('gestor','director'),
  DarreraHoraEntrada DATETIME,
  DarreraHoraSortida DATETIME
);


INSERT INTO users (name, email, password, Tipus, DarreraHoraEntrada, DarreraHoraSortida)
VALUES ('Marc', 'hola@mail.com', '12345678', 'gestor', NULL, NULL);

INSERT INTO users (name, email, password, Tipus, DarreraHoraEntrada, DarreraHoraSortida)
VALUES ('Pere', 'adeu@mail.com', '12345678', 'director', NULL, NULL);

GRANT ALL PRIVILEGES ON universitat.* TO 'admin-clot'@'localhost' IDENTIFIED BY '1234';