<?php
include_once __DIR__ . '/../dao/IncidenteDAO.php';

    if (isset($_POST['invia'])){
        $descrizione = $_POST["descrizione"];
        $longitudine = $_POST["longitudine"];
        $latitudine = $_POST["latitudine"];
        $data = $_POST["data"];
        $ora = $_POST["ora"];

        $incidente = new Incidente(null, $descrizione, $longitudine, $latitudine, $data, $ora, 'C:');
        $add = IncidenteDAO::aggiungiIncidente($incidente);
    }




