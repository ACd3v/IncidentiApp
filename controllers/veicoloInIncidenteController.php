<?php
include_once __DIR__ . '/../dao/VeicoloInIncidenteDAO.php';

    if (isset($_POST['invia'])){
        $idIncidente = $_POST["idIncidente"];
        $idVeicolo = $_POST["idVeicolo"];

        $veicoloInIncidente = new VeicoloInIncidente(null, $idVeicolo, $idIncidente);
        $add = VeicoloInIncidenteDAO::aggiungiVeicoloInIncidente($veicoloInIncidente);
    }




