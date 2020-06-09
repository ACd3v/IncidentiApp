<?php

include_once __DIR__.'/../dao/AssicurazioneDAO.php';

/* getAssicurazione()  - OK
$assicurazione = AssicurazioneDAO::getAssicurazione(1);
$denominazione = $assicurazione->getDenominazione();
$numPolizza = $assicurazione->getNumPolizza();
$validita = $assicurazione->getValidita();
$indirizzo = $assicurazione->getIndirizzo();
$telefono = $assicurazione->getTelefono();
$email = $assicurazione->getEmail();

echo "$denominazione <br> 
    $numPolizza <br>
    $validita <br>
    $indirizzo <br>
    $telefono <br>
    $email <br>"; */

//----------------------------------------------------

/* getElencoTipiUtente() - OK
$elencoAssicurazioni = AssicurazioneDAO::getElencoAssicurazioni();
foreach ($elencoAssicurazioni as $assicurazione) {
    echo "Id = " . $assicurazione->getIdAssicurazione() . " - ";
    echo "Denominazione = " .$assicurazione->getDenominazione()." - ";
    echo "NumPolizza = " .$assicurazione->getNumPolizza(). "<br>";
    echo "Validita = " .$assicurazione->getValidita(). "<br>";
    echo "Indirizzo = " .$assicurazione->getIndirizzo(). "<br>";
    echo "Telefono = " .$assicurazione->getTelefono(). "<br>";
    echo "Email = " .$assicurazione->getEmail(). "<br>";
} */

//----------------------------------------------------

/* aggiungiAssicurazione() - OK
//L'id non è importante perché poi non verrà utilizzato, ma si seguirà l'AUTO_INCREMENT
//Da ricordare che bisogna passare l'idCitta, quindi via frontend bisogna ottenerlo
$assicurazione = new Assicurazione(null,'Test','89SSD898', FALSE, 'Via ROma 41', '3465296874','rocco@peppe.it');
$add = AssicurazioneDAO::aggiungiAssicurazione($assicurazione);
echo "$add";
*/

//----------------------------------------------------

/* aggiornaAssicurazione() - OK
$assicurazione = new Assicurazione(2,'Test01','89SSD898F', FALSE, 'Via Roma 41', '3465296874','rocco@peppe.it');
$o = AssicurazioneDAO::aggiornaAssicurazione($assicurazione);
echo "$o";
*/

//----------------------------------------------------
//
/* cancellaAssicurazione() - OK
$cancella = AssicurazioneDAO::cancellaAssicurazione(2);
echo "$cancella";
*/
//
//----------------------------------------------------