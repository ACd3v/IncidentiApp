<?php

include_once __DIR__ . '/../dao/VeicoloInIncidenteDAO.php';

if (isset($_POST['invia'])) {
    $idVeicoloInIncidente = $_POST["idVeicoloInIncidente"];

    $delete = VeicoloInIncidenteDAO::cancellaVeicoloInIncidente($idVeicoloInIncidente);
    echo json_encode($delete);
}




