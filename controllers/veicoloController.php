<?php
include_once __DIR__ . '/../dao/VeicoloDAO.php';

    if (isset($_POST['invia'])){
        $marca = $_POST["marca"];
        $tipo = $_POST["tipo"];
        $targa = $_POST["targa"];
        $numPolizza = $_POST["numPolizza"];
        $idAssicurazione = $_POST["idAssicurazione"];
        $idPersona = $_POST["idPersona"];


        $veicolo = new Veicolo(null, $marca, $tipo, $targa, $numPolizza, $idAssicurazione, $idPersona);
        $add = VeicoloDAO::aggiungiVeicolo($veicolo);
    }




