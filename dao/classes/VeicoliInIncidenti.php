<?php


class VeicoliInIncidenti {
    private $idVeicoloInIncidente;
    private $idVeicolo;
    private $idIncidente;

    public function __construct($idVeicoloInIncidente, $idVeicolo, $idIncidente)
    {
        $this->idVeicoloInIncidente = $idVeicoloInIncidente;
        $this->idVeicolo = $idVeicolo;
        $this->idIncidente = $idIncidente;
    }

    public function getIdVeicoloInIncidente()
    {
        return $this->idVeicoloInIncidente;
    }

    public function setIdVeicoloInIncidente($idVeicoloInIncidente)
    {
        $this->idVeicoloInIncidente = $idVeicoloInIncidente;
    }

    public function getIdVeicolo()
    {
        return $this->idVeicolo;
    }

    public function setIdVeicolo($idVeicolo)
    {
        $this->idVeicolo = $idVeicolo;
    }

    public function getIdIncidente()
    {
        return $this->idIncidente;
    }

    public function setIdIncidente($idIncidente)
    {
        $this->idIncidente = $idIncidente;
    }
}