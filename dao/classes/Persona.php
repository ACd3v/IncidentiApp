<?php


class Persona   {
    private $idPersona;
    private $nome;
    private $cognome;
    private $dataNascita;
    private $codFiscale;
    private $indirizzo;
    private $cap;
    private $stato;
    private $telefono;
    private $numPatente;
    private $catPatente;
    private $ferito;

    public function __construct($idPersona, $nome, $cognome, $dataNascita, $codFiscale, $indirizzo, $cap, $stato, $telefono, $numPatente, $catPatente, $ferito)
    {
        $this->idPersona = $idPersona;
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->dataNascita = $dataNascita;
        $this->codFiscale = $codFiscale;
        $this->indirizzo = $indirizzo;
        $this->cap = $cap;
        $this->stato = $stato;
        $this->telefono = $telefono;
        $this->numPatente = $numPatente;
        $this->catPatente = $catPatente;
        $this->ferito = $ferito;
    }

    public function getIdPersona()
    {
        return $this->idPersona;
    }

    public function setIdPersona($idPersona)
    {
        $this->idPersona = $idPersona;
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

    public function getDataNascita()
    {
        return $this->dataNascita;
    }

    public function setDataNascita($dataNascita)
    {
        $this->dataNascita = $dataNascita;
    }

    public function getCodFiscale()
    {
        return $this->codFiscale;
    }

    public function setCodFiscale($codFiscale)
    {
        $this->codFiscale = $codFiscale;
    }

    public function getIndirizzo()
    {
        return $this->indirizzo;
    }

    public function setIndirizzo($indirizzo)
    {
        $this->indirizzo = $indirizzo;
    }

    public function getCap()
    {
        return $this->cap;
    }

    public function setCap($cap)
    {
        $this->cap = $cap;
    }

    public function getStato()
    {
        return $this->stato;
    }

    public function setStato($stato)
    {
        $this->stato = $stato;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getNumPatente()
    {
        return $this->numPatente;
    }

    public function setNumPatente($numPatente)
    {
        $this->numPatente = $numPatente;
    }

    public function getCatPatente()
    {
        return $this->catPatente;
    }

    public function setCatPatente($catPatente)
    {
        $this->catPatente = $catPatente;
    }

    public function getFerito()
    {
        return $this->ferito;
    }

    public function setFerito($ferito)
    {
        $this->ferito = $ferito;
    }


}