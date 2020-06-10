<?php

include_once __DIR__.'/../dao/VeicoloInIncidenteDAO.php';

/* getVeicoloInIncidente()  - OK
$veicoloInIncidente = VeicoloInIncidenteDAO::getVeicoloInIncidente(1);
$idVeicolo = $veicoloInIncidente->getIdVeicolo();
$idIncidente = $veicoloInIncidente->getIdIncidente();

echo "$idVeicolo <br>
    $idIncidente ";*/

//----------------------------------------------------

/* getElencoTipiUtente() - OK
$elencoVeicoliInIncidenti = VeicoloInIncidenteDAO::getElencoVeicoliInIncidenti();
foreach ($elencoVeicoliInIncidenti as $veicoloInIncidente) {
    echo "Id = " . $veicoloInIncidente->getIdVeicoloInIncidente() . " - ";
    echo "IdVeicolo = " . $veicoloInIncidente->getIdVeicolo() . " - ";
    echo "IdIncidente = " .$veicoloInIncidente->getIdIncidente(). "<br>";
} */

//----------------------------------------------------

/* aggiungiVeicoloInIncidente() - OK
//L'id non è importante perché poi non verrà utilizzato, ma si seguirà l'AUTO_INCREMENT
//Da ricordare che bisogna passare l'idCitta, quindi via frontend bisogna ottenerlo
$veicoloInIncidente = new VeicoloInIncidente(null,2,1);
$add = VeicoloInIncidenteDAO::aggiungiVeicoloInIncidente($veicoloInIncidente);
echo "$add";
*/

//----------------------------------------------------

/* aggiornaVeicoloInIncidente() - OK
$veicoloInIncidente = new VeicoloInIncidente(4, 2, 1);
$o = VeicoloInIncidenteDAO::aggiornaVeicoloInIncidente($veicoloInIncidente);
echo "$o";
*/

//----------------------------------------------------
/* cancellaVeicoloInIncidente() - OK
$cancella = VeicoloInIncidenteDAO::cancellaVeicoloInIncidente(4);
echo "$cancella";
*/
//----------------------------------------------------