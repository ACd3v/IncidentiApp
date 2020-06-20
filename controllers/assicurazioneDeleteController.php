<?php

include_once __DIR__ . '/../dao/AssicurazioneDAO.php';

if (isset($_POST['invia'])) {
    $idAssicurazione = $_POST["idAssicurazione"];

    $delete = AssicurazioneDAO::cancellaAssicurazione($idAssicurazione);
    echo json_encode($delete);
}




