<?php

include_once __DIR__.'/../dao/RuoloDAO.php';

/* getRuolo()  - OK
$ruolo = RuoloDAO::getRuolo(1);
$nome = $ruolo->getNome();
$descrizione = $ruolo->getDescrizione();
$idPersona = $ruolo->getIdPersona();
$idIncidente = $ruolo->getIdIncidente();

echo "$nome <br>
    $descrizione <br>
    $idPersona <br>
    $idIncidente ";*/

//----------------------------------------------------

/* getElencoTipiUtente() - OK
$elencoRuoli = RuoloDAO::getElencoRuoli();
foreach ($elencoRuoli as $ruolo) {
    echo "Id = " . $ruolo->getIdRuolo() . " - ";
    echo "Nome = " .$ruolo->getNome()." - ";
    echo "Descrizione = " .$ruolo->getDescrizione(). "<br>";
    echo "IdPersona = " .$ruolo->getIdPersona(). "<br>";
    echo "IdIncidente = " .$ruolo->getIdIncidente(). "<br>";
} */

//----------------------------------------------------

/* aggiungiRuolo() - OK
//L'id non è importante perché poi non verrà utilizzato, ma si seguirà l'AUTO_INCREMENT
//Da ricordare che bisogna passare l'idCitta, quindi via frontend bisogna ottenerlo
$ruolo = new Ruolo(null,'Test','Tesla', 1, 1);
$add = RuoloDAO::aggiungiRuolo($ruolo);
echo "$add";
*/

//----------------------------------------------------

/* aggiornaRuolo() - OK
$ruolo = new Ruolo(2,'Test01','TeslOne',1, 2);
$o = RuoloDAO::aggiornaRuolo($ruolo);
echo "$o";
*/

//----------------------------------------------------
/* cancellaRuolo() - OK
$cancella = RuoloDAO::cancellaRuolo(2);
echo "$cancella";
*/
//----------------------------------------------------