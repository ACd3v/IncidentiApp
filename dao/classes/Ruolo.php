<?php


class Ruolo {
    private $idRuolo;
    private $denominazione;
    private $ferito;
    private $descrizione;
    private $idPersona;
    private $idIncidente;


    public function __construct($idRuolo, $denominazione, $ferito, $descrizione, $idPersona, $idIncidente)
    {
        $this->idRuolo = $idRuolo;
        $this->denominazione = $denominazione;
        $this->ferito = $ferito;
        $this->descrizione = $descrizione;
        $this->idPersona = $idPersona;
        $this->idIncidente = $idIncidente;
    }

    public function getIdRuolo()
    {
        return $this->idRuolo;
    }

    public function setIdRuolo($idRuolo)
    {
        $this->idRuolo = $idRuolo;
    }

    public function getDenominazione()
    {
        return $this->denominazione;
    }

    public function setDenominazione($denominazione)
    {
        $this->denominazione = $denominazione;
    }

    public function getFerito()
    {
        return $this->ferito;
    }

    public function setFerito($ferito)
    {
        $this->ferito = $ferito;
    }


    public function getDescrizione()
    {
        return $this->descrizione;
    }

    public function setDescrizione($descrizione)
    {
        $this->descrizione = $descrizione;
    }

    public function getIdPersona()
    {
        return $this->idPersona;
    }

    public function setIdPersona($idPersona)
    {
        $this->idPersona = $idPersona;
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






