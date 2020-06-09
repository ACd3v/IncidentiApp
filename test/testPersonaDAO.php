<?php

include_once __DIR__.'/../dao/PersonaDAO.php';

/* getPersona()  - OK
$persona = PersonaDAO::getPersona(1);
$nome = $persona->getNome();
$cognome = $persona->getCognome();
$dataNscita = $persona->getDataNascita();
$codFiscale = $persona->getCodFiscale();
$indirizzo = $persona->getIndirizzo();
$cap = $persona->getCap();
$stato = $persona->getStato();
$telefono = $persona->getTelefono();
$numPatente = $persona->getNumPatente();
$catPatente = $persona->getCatPatente();
$ferito = $persona->getFerito();

echo "$nome <br> 
    $cognome <br>
    $dataNscita <br>
    $codFiscale <br>
    $indirizzo <br>
    $cap <br>
    $stato <br>
    $telefono <br>
    $numPatente <br>  
    $catPatente <br>
    $ferito <br>";*/

//----------------------------------------------------

/* getElencoTipiUtente() - OK
$elencoPersone = PersonaDAO::getElencoPersone();
foreach ($elencoPersone as $persona) {
    echo "Id = " . $persona->getIdPersona() . " - ";
    echo "Nome = " .$persona->getNome()." - ";
    echo "Cognome = " .$persona->getCognome(). "<br>";
    echo "dataNascita = " .$persona->getDataNascita(). "<br>";
    echo "Indirizzo = " .$persona->getIndirizzo(). "<br>";
    echo "Cap = " .$persona->getCap(). "<br>";
    echo "Stato = " .$persona->getStato(). "<br>";
    echo "Telefono = " .$persona->getTelefono(). "<br>";
    echo "numPatente = " .$persona->getnumPatente(). "<br>";
    echo "catPatente = " .$persona->getcatPatente(). "<br>";
    echo "Ferito = " .$persona->getFerito(). "<br>";
} */

//----------------------------------------------------

/* aggiungiPersona() - OK
//L'id non è importante perché poi non verrà utilizzato, ma si seguirà l'AUTO_INCREMENT
//Da ricordare che bisogna passare l'idCitta, quindi via frontend bisogna ottenerlo
$persona = new Persona(null,'Test','Testina', '1999-06-26', 'TSTCLR45S5', 'Via Ambiente 42', '45268', 'Italia', '3465296874','45F23', 'B', TRUE);
$add = PersonaDAO::aggiungiPersona($persona);
echo "$add";
*/

//----------------------------------------------------

/* aggiornaPersona() - OK
$persona = new Persona(1,'Test01','Testilone','2002-02-08', 'TSRTO05F','Via Roma 41', '56325', 'Romania', '3465296874','2689S', 'A', FALSE);
$o = PersonaDAO::aggiornaPersona($persona);
echo "$o";
*/

//----------------------------------------------------
// cancellaPersona() - OK
$cancella = PersonaDAO::cancellaPersona(4);
echo "$cancella";
//
//----------------------------------------------------