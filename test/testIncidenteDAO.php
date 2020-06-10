<?php

include_once __DIR__ . '/../dao/IncidenteDAO.php';

/* getIncidente()  - OK
$incidente = IncidenteDAO::getIncidente(2);
$descrizione = $incidente->getDescrizione();
$longitudine = $incidente->getLongitudine();
$latitudine = $incidente->getLatitudine();
$data = $incidente->getData();
$ora = $incidente->getOra();
$pathFoto = $incidente->getPathFoto();

echo "$descrizione <br>
    $longitudine <br>
    $latitudine <br>
    $data <br>
    $ora <br>
    $pathFoto ";*/

//----------------------------------------------------

/* getElencoTipiUtente() - OK
$elencoIncidenti = IncidenteDAO::getElencoIncidenti();
foreach ($elencoIncidenti as $incidente) {
    echo "Id = " . $incidente->getIdIncidente() . " - ";
    echo "Descrizione = " .$incidente->getDescrizione()." - ";
    echo "Longitudine = " .$incidente->getLongitudine(). "<br>";
    echo "Latitudine = " .$incidente->getLatitudine(). "<br>";
    echo "Data = " .$incidente->getData(). "<br>";
    echo "Ora = " .$incidente->getOra(). "<br>";
    echo "PathFoto = " .$incidente->getPathFoto(). "<br>";
} */

//----------------------------------------------------

/* aggiungiIncidente() - OK
//L'id non è importante perché poi non verrà utilizzato, ma si seguirà l'AUTO_INCREMENT
//Da ricordare che bisogna passare l'idCitta, quindi via frontend bisogna ottenerlo
$incidente = new Incidente(null,'Test','74.5632321', '-45.564645', '2002-11-26', '06:22', 'D:/Linux://');
$add = IncidenteDAO::aggiungiIncidente($incidente);
echo "$add";
*/

//----------------------------------------------------

/* aggiornaIncidente() - OK
$incidente = new Incidente(7,'Test01','74.5632321', '-45.564645', '2002-11-26', '06:22', 'D:/Ubuntu');
$o = IncidenteDAO::aggiornaIncidente($incidente);
echo "$o";
*/

//----------------------------------------------------
/* cancellaIncidente() - OK
$cancella = IncidenteDAO::cancellaIncidente(7);
echo "$cancella";
*/
//----------------------------------------------------