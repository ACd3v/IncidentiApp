<?php

include_once __DIR__ . '/../dao/VeicoloDAO.php';

if (isset($_POST['invia'])) {
    $idVeicolo = $_POST["idVeicolo"];

    $delete = VeicoloDAO::cancellaVeicolo($idVeicolo);
    echo json_encode($delete);
}




