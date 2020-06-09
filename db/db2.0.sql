DROP TABLE IF EXISTS assicurazioni;
DROP TABLE IF EXISTS veicoli;
DROP TABLE IF EXISTS veicoliInIncidenti;
DROP TABLE IF EXISTS incidenti;
DROP TABLE IF EXISTS ruoli;
DROP TABLE IF EXISTS persone;

CREATE TABLE assicurazioni (
    idAssicurazione INT(5) PRIMARY KEY AUTO_INCREMENT,
    denominazione VARCHAR(30) NOT NULL,
    numPolizza VARCHAR(30) NOT NULL,
    validita BOOLEAN NOT NULL,
    indirizzo VARCHAR(50) NOT NULL,
    telefono VARCHAR(15) NOT NULL,
    email VARCHAR(50) NOT NULL,
    UNIQUE (denominazione),
    UNIQUE (numPolizza)
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
    ferito BOOLEAN NOT NULL,
    UNIQUE (nome),
    UNIQUE (cognome),
    UNIQUE (codFiscale)
);

CREATE TABLE veicoli (
    idVeicolo INT(5) PRIMARY KEY AUTO_INCREMENT,
    marca VARCHAR(30) NOT NULL,
    tipo VARCHAR(30) NOT NULL,
    targa VARCHAR(10) NOT NULL,
    idAssicurazione INT(5) NOT NULL,
    idPersona INT(5) NOT NULL,
    FOREIGN KEY (idAssicurazione) REFERENCES assicurazioni(idAssicurazione),
    FOREIGN KEY (idPersona) REFERENCES persone(idPersona),
    UNIQUE (targa)
);

CREATE TABLE incidenti (
  idIncidente INT(5) PRIMARY KEY AUTO_INCREMENT,
  descrizione VARCHAR(150) NOT NULL,
  longitudine DECIMAL NOT NULL,
  latitudine DECIMAL NOT NULL,
  data DATE NOT NULL,
  ora TIME NOT NULL ,
  pathFoto VARCHAR(100) NOT NULL
);

CREATE TABLE ruoli (
    idRuolo INT(5) PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(30) NOT NULL,
    descrizione VARCHAR(100) NOT NULL,
    idPersona INT(5) NOT NULL,
    idIncidente INT(5) NOT NULL,
    FOREIGN KEY (idPersona) REFERENCES persone(idPersona),
    FOREIGN KEY (idIncidente) REFERENCES incidenti(idIncidente),
    UNIQUE (nome)
);

CREATE TABLE veicoliInIncidenti (
  idVeicoliInIncidenti INT(5) PRIMARY KEY AUTO_INCREMENT,
  idVeicolo INT(5) NOT NULL,
  idIncidente INT(5) NOT NULL,
  FOREIGN KEY (idVeicolo) REFERENCES veicoli(idVeicolo),
  FOREIGN KEY (idIncidente) REFERENCES incidenti(idIncidente)
);

INSERT INTO assicurazioni (denominazione, numPolizza, validita, indirizzo, telefono, email) VALUES
    ('Asil', '45XJ', TRUE, 'Via appi 45', '3468526455', 'alex@gmail.com');

INSERT INTO persone (nome, cognome, datanascita, codicefiscale, indirizzo, cap, stato, telefono, numpatente, catpatente, ferito) VALUES
('Alex', 'Calabrese', '2002-02-08', 'CLBLXA085S5', 'Via Pergola 45', '85050', 'Italia','3468526455', '45B78', 'B', FALSE);

