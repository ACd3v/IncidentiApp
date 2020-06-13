<?php


class Veicolo   {
    private $idVeicolo;
    private $marca;
    private $tipo;
    private $targa;
    private $numPolizza;
    private $idAssicurazione;
    private $idPersona;

    public function __construct($idVeicolo, $marca, $tipo, $targa, $numPolizza, $idAssicurazione, $idPersona)
    {
        $this->idVeicolo = $idVeicolo;
        $this->marca = $marca;
        $this->tipo = $tipo;
        $this->targa = $targa;
        $this->numPolizza = $numPolizza;
        $this->idAssicurazione = $idAssicurazione;
        $this->idPersona = $idPersona;
    }

    public function getIdVeicolo()
    {
        return $this->idVeicolo;
    }

    public function setIdVeicolo($idVeicolo)
    {
        $this->idVeicolo = $idVeicolo;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    public function getTarga()
    {
        return $this->targa;
    }

    public function getNumPolizza()
    {
        return $this->numPolizza;
    }

    public function setNumPolizza($numPolizza)
    {
        $this->numPolizza = $numPolizza;
    }

    public function setTarga($targa)
    {
        $this->targa = $targa;
    }

    public function getIdAssicurazione()
    {
        return $this->idAssicurazione;
    }

    public function setIdAssicurazione($idAssicurazione)
    {
        $this->idAssicurazione = $idAssicurazione;
    }

    public function getIdPersona()
    {
        return $this->idPersona;
    }

    public function setIdPersona($idPersona)
    {
        $this->idPersona = $idPersona;
    }
}