<?php

include_once __DIR__.'/../dao/AssicurazioneDAO.php';

/* getAssicurazione()  - OK
$assicurazione = AssicurazioneDAO::getAssicurazione(1);
$denominazione = $assicurazione->getDenominazione();
$validita = $assicurazione->getValidita();
$indirizzo = $assicurazione->getIndirizzo();
$telefono = $assicurazione->getTelefono();
$email = $assicurazione->getEmail();

echo "$denominazione <br> 
    $validita <br>
    $indirizzo <br>
    $telefono <br>
    $email <br>"; */

//----------------------------------------------------

/* getElencoAssicurazioni() - OK
$elencoAssicurazioni = AssicurazioneDAO::getElencoAssicurazioni();
foreach ($elencoAssicurazioni as $assicurazione) {
    echo "Id = " . $assicurazione->getIdAssicurazione() . " - ";
    echo "Denominazione = " .$assicurazione->getDenominazione()." - ";
    echo "Validita = " .$assicurazione->getValidita(). "<br>";
    echo "Indirizzo = " .$assicurazione->getIndirizzo(). "<br>";
    echo "Telefono = " .$assicurazione->getTelefono(). "<br>";
    echo "Email = " .$assicurazione->getEmail(). "<br>";
} */

//----------------------------------------------------

/* aggiungiAssicurazione() - OK
//L'id non è importante perché poi non verrà utilizzato, ma si seguirà l'AUTO_INCREMENT
//Da ricordare che bisogna passare l'idAssicurazione, quindi via frontend bisogna ottenerlo
$assicurazione = new Assicurazione(null,'Test', FALSE, 'Via ROma 41', '3465296874','rocco@peppe.it');
$add = AssicurazioneDAO::aggiungiAssicurazione($assicurazione);
echo "$add";
*/

//----------------------------------------------------

/* aggiornaAssicurazione() - OK
$assicurazione = new Assicurazione(4,'Test01', FALSE, 'Via Roma 41', '3465296874','rocco@peppe.it');
$o = AssicurazioneDAO::aggiornaAssicurazione($assicurazione);
echo "$o";
*/

//----------------------------------------------------

/* cancellaAssicurazione() - OK
$cancella = AssicurazioneDAO::cancellaAssicurazione(2);
echo "$cancella";
*/
//----------------------------------------------------