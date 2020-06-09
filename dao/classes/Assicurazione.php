<?php


class Assicurazione {
    private $idAssicurazione;
    private $denominazione;
    private $numPolizza;
    private $validita;
    private $indirizzo;
    private $telefono;
    private $email;

    public function __construct($idAssicurazione, $denominazione, $numPolizza, $validita, $indirizzo, $telefono, $email)
    {
        $this->idAssicurazione = $idAssicurazione;
        $this->denominazione = $denominazione;
        $this->numPolizza = $numPolizza;
        $this->validita = $validita;
        $this->indirizzo = $indirizzo;
        $this->telefono = $telefono;
        $this->email = $email;
    }

    public function getIdAssicurazione()
    {
        return $this->idAssicurazione;
    }

    public function setIdAssicurazione($idAssicurazione)
    {
        $this->idAssicurazione = $idAssicurazione;
    }

    public function getDenominazione()
    {
        return $this->denominazione;
    }

    public function setDenominazione($denominazione)
    {
        $this->denominazione = $denominazione;
    }

    public function getNumPolizza()
    {
        return $this->numPolizza;
    }

    public function setNumPolizza($numPolizza)
    {
        $this->numPolizza = $numPolizza;
    }

    public function getValidita()
    {
        return $this->validita;
    }

    public function setValidità($validita)
    {
        $this->validità = $validita;
    }

    public function getIndirizzo()
    {
        return $this->indirizzo;
    }

    public function setIndirizzo($indirizzo)
    {
        $this->indirizzo = $indirizzo;
    }

    public function getTelefono()
    {
        return $this->telefono;
    }

    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
}