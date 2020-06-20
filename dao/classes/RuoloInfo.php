<?php


class RuoloInfo{
    private $nome;
    private $cognome;
    private $denominazione;
    private $descrizione;

    public function __construct($nome, $cognome, $denominazione, $descrizione)
    {
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->denominazione = $denominazione;
        $this->descrizione = $descrizione;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    public function getCognome()
    {
        return $this->cognome;
    }

    public function setCognome($cognome)
    {
        $this->cognome = $cognome;
    }

    public function getDenominazione()
    {
        return $this->denominazione;
    }

    public function setDenominazione($denominazione)
    {
        $this->denominazione = $denominazione;
    }

    public function getDescrizione()
    {
        return $this->descrizione;
    }

    public function setDescrizione($descrizione)
    {
        $this->descrizione = $descrizione;
    }
}