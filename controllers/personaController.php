<?php
include_once __DIR__ . '/../dao/PersonaDAO.php';

    if (isset($_POST['invia'])){
        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];
        $dataNascita = $_POST["dataNascita"];
        $codFiscale = $_POST["codFiscale"];
        $indirizzo = $_POST["indirizzo"];
        $cap = $_POST["cap"];
        $stato = $_POST["stato"];
        $telefono = $_POST["telefono"];
        $numPatente = $_POST["numPatente"];
        $catPatente = $_POST["catPatente"];

        $persona = new Persona(null, $nome, $cognome, $dataNascita, $codFiscale, $indirizzo, $cap, $stato, $telefono, $numPatente, $catPatente);
        $add = PersonaDAO::aggiungiPersona($persona);
    }




