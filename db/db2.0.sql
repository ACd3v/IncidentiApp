DROP TABLE IF EXISTS ruoli;
DROP TABLE IF EXISTS veicoliInIncidenti;
DROP TABLE IF EXISTS veicoli;
DROP TABLE IF EXISTS assicurazioni;
DROP TABLE IF EXISTS persone;
DROP TABLE IF EXISTS incidenti;

CREATE TABLE assicurazioni (
    idAssicurazione INT(5) PRIMARY KEY AUTO_INCREMENT,
    denominazione VARCHAR(30) NOT NULL,
    validita BOOLEAN NOT NULL,
    indirizzo VARCHAR(50) NOT NULL,
    telefono VARCHAR(15) NOT NULL,
    email VARCHAR(50) NOT NULL,
    UNIQUE (denominazione)
);

CREATE TABLE persone (
    idPersona INT(5) PRIMARY KEY  AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,
    cognome VARCHAR(30) NOT NULL,
    dataNascita DATE NOT NULL,
    codFiscale VARCHAR(16) NOT NULL,
    indirizzo VARCHAR(30) NOT NULL,
    cap VARCHAR(5) NOT NULL,
    stato VARCHAR(15) NOT NULL,
    telefono VARCHAR(15) NOT NULL,
    numPatente VARCHAR(15) NOT NULL,
    catPatente CHAR NOT NULL,
    UNIQUE (codFiscale)
);

CREATE TABLE veicoli (
    idVeicolo INT(5) PRIMARY KEY AUTO_INCREMENT,
    marca VARCHAR(30) NOT NULL,
    tipo VARCHAR(30) NOT NULL,
    targa VARCHAR(10) NOT NULL,
    numPolizza VARCHAR(30) NOT NULL,
    idAssicurazione INT(5) NOT NULL,
    idPersona INT(5) NOT NULL,
    FOREIGN KEY (idAssicurazione) REFERENCES assicurazioni(idAssicurazione),
    FOREIGN KEY (idPersona) REFERENCES persone(idPersona),
    UNIQUE (targa),
    UNIQUE (numPolizza)
);

CREATE TABLE incidenti (
  idIncidente INT(5) PRIMARY KEY AUTO_INCREMENT,
  descrizione VARCHAR(150) NOT NULL,
  longitudine DECIMAL(11,8) NOT NULL,
  latitudine DECIMAL(10,8) NOT NULL,
  data DATE NOT NULL,
  ora TIME NOT NULL ,
  pathFoto VARCHAR(100) NOT NULL
);

CREATE TABLE ruoli (
    idRuolo INT(5) PRIMARY KEY AUTO_INCREMENT,
    denominazione VARCHAR(30) NOT NULL,
    ferito BOOLEAN NOT NULL,
    descrizione VARCHAR(100) NOT NULL,
    idPersona INT(5) NOT NULL,
    idIncidente INT(5) NOT NULL,
    FOREIGN KEY (idPersona) REFERENCES persone(idPersona),
    FOREIGN KEY (idIncidente) REFERENCES incidenti(idIncidente)
);

CREATE TABLE veicoliInIncidenti (
  idVeicoloInIncidente INT(5) PRIMARY KEY AUTO_INCREMENT,
  idVeicolo INT(5) NOT NULL,
  idIncidente INT(5) NOT NULL,
  FOREIGN KEY (idVeicolo) REFERENCES veicoli(idVeicolo),
  FOREIGN KEY (idIncidente) REFERENCES incidenti(idIncidente)
);

INSERT INTO assicurazioni (denominazione, validita, indirizzo, telefono, email) VALUES
('Sicura', TRUE, 'Via appia 45', '3468526455', 'sicura@gmail.com');

INSERT INTO assicurazioni (denominazione, validita, indirizzo, telefono, email) VALUES
('Cara', TRUE, 'Via Roma 29', '3986129874', 'cara@gmail.com');

INSERT INTO assicurazioni (denominazione, validita, indirizzo, telefono, email) VALUES
('PFL', TRUE, 'Via Napoli 48', '398326874', 'pfl@gmail.com');

INSERT INTO assicurazioni (denominazione, validita, indirizzo, telefono, email) VALUES
('CGL', TRUE, 'Via Napoleone 36', '8431469726', 'cgl@gmail.com');

INSERT INTO assicurazioni (denominazione, validita, indirizzo, telefono, email) VALUES
('Bene', TRUE, 'Via Napoleone 12', '3261469726', 'bene@gmail.com');

INSERT INTO assicurazioni (denominazione, validita, indirizzo, telefono, email) VALUES
('Direct', TRUE, 'Via Appia 43', '325987634', 'direct@gmail.com');

INSERT INTO persone (nome, cognome, datanascita, codfiscale, indirizzo, cap, stato, telefono, numpatente, catpatente) VALUES
('Alex', 'Calabrese', '2002-02-08', 'CLBLXA085S5', 'Via Pergola 45', '85050', 'Italia','3468526455', '45B78', 'B');

INSERT INTO persone (nome, cognome, datanascita, codfiscale, indirizzo, cap, stato, telefono, numpatente, catpatente) VALUES
('Antonio', 'Verdi', '1997-08-23', 'ANTVRD65GE2B', 'Via Danzi 113', '89234', 'Italia','3491693478', 'F321RSA489', 'C');

INSERT INTO persone (nome, cognome, datanascita, codfiscale, indirizzo, cap, stato, telefono, numpatente, catpatente) VALUES
('Rocco', 'Rossi', '1976-07-15', 'RCROSS15MLR23', 'Via Garibaldi 89', '14693', 'Italia','3441955379', 'C456EW1', 'B');

INSERT INTO persone (nome, cognome, datanascita, codfiscale, indirizzo, cap, stato, telefono, numpatente, catpatente) VALUES
('Nicola', 'Bossetti', '1989-08-23', 'NCLBSS23G85S26', 'Via Zarri 42', '78945', 'Italia','2356897412', 'SAD8956AS', 'A');

INSERT INTO persone (nome, cognome, datanascita, codfiscale, indirizzo, cap, stato, telefono, numpatente, catpatente) VALUES
('Roberto', 'Losasso', '2000-02-14', 'RBRLS2E5S2S5', 'Via Limiti 59', '612548', 'Italia','326987415', 'SA58W5SA54', 'A');

INSERT INTO veicoli (marca, tipo, targa, numPolizza, idAssicurazione, idPersona) VALUES
('FCA', '500X', 'RFXJSIE', 'CGL96S4F4', 1, 1);

INSERT INTO veicoli (marca, tipo, targa, numPolizza, idAssicurazione, idPersona) VALUES
('FCA', 'Renegade', 'DAS879ER645', 'S5S564E', 3, 4);

INSERT INTO veicoli (marca, tipo, targa, numPolizza, idAssicurazione, idPersona) VALUES
('volkswagen', 'F38', 'FASD456R879', 'SDF456SDF321', 2, 4);

INSERT INTO veicoli (marca, tipo, targa, numPolizza, idAssicurazione, idPersona) VALUES
('AUDI', 'A5', 'FG4GTHD456', 'FBN4FD4213', 4, 2);

INSERT INTO veicoli (marca, tipo, targa, numPolizza, idAssicurazione, idPersona) VALUES
('Fiat', 'Punto', 'HFD2516DGF456', 'GFD213DRT123', 5, 5);

INSERT INTO incidenti (descrizione, longitudine, latitudine, data, ora, pathFoto) VALUES
('Incidente accuduto a Roccopolis', '40.785091', '-73.968285','2020-06-06', '12:52', 'C://Windows/Desktop');

INSERT INTO incidenti (descrizione, longitudine, latitudine, data, ora, pathFoto) VALUES
('Incidente accuduto a Mineapolis', '38.427463', '-49.476913','2019-03-22', '06:34', 'C://Windows/Desktop/IncidenteX');

INSERT INTO incidenti (descrizione, longitudine, latitudine, data, ora, pathFoto) VALUES
('Incidente accuduto a Roma', '26.136489', '-68.36479','2020-11-18', '22:00', 'C://Windows/Desktop/IncidenteX/Foto');

INSERT INTO ruoli (denominazione, ferito,descrizione, idPersona, idIncidente) VALUES
('Testimone', TRUE,'Testimone visivo', '2', '1');

INSERT INTO ruoli (denominazione,  ferito, descrizione, idPersona, idIncidente) VALUES
('Peronsa Coinvolta', TRUE,'La persona in questione è stata coinvolta', '1', '1');

INSERT INTO ruoli (denominazione,  ferito, descrizione, idPersona, idIncidente) VALUES
('Peronsa Coinvolta', FALSE,'La persona in questione è stata coinvolta', '3', '1');

INSERT INTO veicoliInIncidenti (idVeicolo, idIncidente) VALUES
(2, 3);

INSERT INTO veicoliInIncidenti (idVeicolo, idIncidente) VALUES
(2, 2);