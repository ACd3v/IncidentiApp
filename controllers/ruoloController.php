<?php
include_once __DIR__ . '/../dao/RuoloDAO.php';

    if (isset($_POST['invia'])){
        $denominazione = $_POST["denominazione"];
        $ferito = $_POST["ferito"];
        $descrizione = $_POST["descrizione"];
        $idPersona = $_POST["idPersona"];
        $idIncidente = $_POST["idIncidente"];

        $ruolo = new Ruolo(null,$denominazione, $ferito, $descrizione, $idPersona, $idIncidente);
        $add = RuoloDAO::aggiungiRuolo($ruolo);
    }




