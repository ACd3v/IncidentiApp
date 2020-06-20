<?php

include_once __DIR__ . '/../dao/PersonaDAO.php';

if (isset($_POST['invia'])) {
    $idPersona = $_POST["idPersona"];

    $delete = PersonaDAO::cancellaPersona($idPersona);
}




