DROP TABLE IF EXISTS incidenti;
DROP TABLE IF EXISTS persone;
DROP TABLE IF EXISTS ruoli;
DROP TABLE IF EXISTS veicoli;
DROP TABLE IF EXISTS assicurazioni;

CREATE TABLE ruoli (
    idRuolo INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(15) NOT NULL,
    descrizione VARCHAR(30) NOT NULL,
    UNIQUE (nome)
);

CREATE TABLE assicurazioni (
   idAssicurazione INT PRIMARY KEY AUTO_INCREMENT,
   denominazione VARCHAR(15) NOT NULL,
   numeroCartaVerde INT NOT NULL,
   valido BOOLEAN NOT NULL,
   indirizzo VARCHAR NOT NULL,
   telefono VARCHAR NOT NULL,
   email VARCHAR NOT NULL,
   UNIQUE (denominazione),
   UNIQUE (numeroCartaVerde)
);

CREATE TABLE persone (
  idPersona INT PRIMARY KEY  AUTO_INCREMENT,
  nome VARCHAR NOT NULL,
  cognome VARCHAR NOT NULL,
  dataNascita DATE NOT NULL,
  codiceFiscale VARCHAR NOT NULL,
  indirizzo VARCHAR NOT NULL,
  telefono VARCHAR NOT NULL,
  categoriaPatente CHAR NOT NULL,
  validPatente BOOLEAN NOT NULL,
  ferito BOOLEAN NOT NULL,
  idRuolo INT(2) NOT NULL,
  FOREIGN KEY (idRuolo) REFERENCES ruoli(idRuolo),
  UNIQUE (nome),
  UNIQUE (cognome),
  UNIQUE (codiceFiscale)
);

CREATE TABLE veicoli (
    idVeicolo INT PRIMARY KEY AUTO_INCREMENT,
    marca VARCHAR NOT NULL,
    tipo VARCHAR NOT NULL,
    targa VARCHAR NOT NULL,
    statoImmatricolazione VARCHAR NOT NULL,
    idAssicurazione INT(2) NOT NULL,
    FOREIGN KEY (idAssicurazione) REFERENCES assicurazioni(idAssicurazione),
    UNIQUE (targa)
)