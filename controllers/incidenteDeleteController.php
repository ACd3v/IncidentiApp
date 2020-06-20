<?php

include_once __DIR__ . '/../dao/IncidenteDAO.php';

if (isset($_POST['invia'])) {
    $idIncidente = $_POST["idIncidente"];

    $delete = IncidenteDAO::cancellaIncidente($idIncidente);
    echo json_encode($delete);
}




