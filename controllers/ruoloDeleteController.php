<?php

include_once __DIR__ . '/../dao/RuoloDAO.php';

if (isset($_POST['invia'])) {
    $idRuolo = $_POST["idRuolo"];

    $delete = RuoloDAO::cancellaRuolo($idRuolo);
    echo json_encode($delete);
}




