/* Veicoli e assicurazioni coinvolti in un det. Incidente */
/* Si vuole conoscere la marca, il tipo e la denominazione e la validità dell'assicurazione del veicolo coinvolto in un determinato incidente*/
SELECT v.marca, v.tipo, a.denominazione, a.validita
FROM veicoliinincidenti vi, incidenti i, veicoli v, assicurazioni a
WHERE i.idIncidente = vi.idIncidente
  AND vi.idVeicolo = v.idVeicolo
  AND v.idAssicurazione = a.idAssicurazione
  AND i.idIncidente = 2;

/* Elenco testimoni in un det. incidente */
/*Si vuole conoscere i testimoni e il relativo nome e cognome in un determinato incidente*/
SELECT p.nome, p.cognome
FROM incidenti i, ruoli r, persone p
WHERE i.idIncidente = r.idIncidente
    AND p.idPersona = r.idPersona
    AND r.nome = 'Testimone'
    AND i.idIncidente = 1;

/* Numero persone con det. catPatente */
/* Si vuole conoscere il numero di Persone aventi una determinata categoria di Patente, suddivise per categorie Patente*/
SELECT COUNT(*), catPatente
FROM persone
GROUP BY catPatente;

/* Elenco veicoli e intestatari */
/* Si vogliono conoscere tutti i veicoli e i relativi intestatari */
SELECT v.marca, v.tipo, v.targa, p.nome, p.cognome, p.codFiscale
FROM veicoli v, persone p
WHERE v.idPersona = p.idPersona
ORDER BY v.marca;

/* Elenco ruoli in un det. incidente */
/* Si vuole conoscere per un determinato incidente, i vari ruoli presenti e il relativo numero */
SELECT r.nome, COUNT(r.nome)
FROM incidenti i, ruoli r
WHERE i.idIncidente = r.idIncidente
  AND i.idIncidente = '1'
GROUP BY r.nome;

/* Incidenti con più di 2 persone coinvolte */
/* Si vogliono conoscere tutti gli incidenti che hanno più di 2 persone coinvolte */
SELECT i.descrizione, COUNT(r.nome)
FROM incidenti i, ruoli r, persone p
WHERE i.idIncidente = r.idIncidente
    AND r.idPersona = p.idPersona
    AND r.nome = 'Persona Coinvolta'
GROUP BY descrizione
    HAVING COUNT(r.nome) > 2;

/* Incidenti in un determinato periodo */
/* Tutti gli incidenti aggiunti in un dato periodo */
SELECT descrizione, data
FROM incidenti
WHERE data BETWEEN '2008-01-01' AND '2020-06-13';








