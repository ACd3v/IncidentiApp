<?php
include_once __DIR__ . '/../dao/AssicurazioneDAO.php';

    if (isset($_POST['invia'])){
        $denominazione = $_POST["denominazione"];
        $indirizzo = $_POST["indirizzo"];
        $telefono = $_POST["telefono"];
        $email = $_POST["email"];
        $validita = false;


        $assicurazione = new Assicurazione(null, $denominazione, $validita ,$indirizzo, $telefono, $email);
        $add = AssicurazioneDAO::aggiungiAssicurazione($assicurazione);
    }




