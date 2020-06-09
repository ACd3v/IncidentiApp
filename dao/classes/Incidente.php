<?php


class Incidente {
    private $idIncidente;
    private $descrizione;
    private $longitudine;
    private $latitudine;
    private $data;
    private $ora;
    private $pathFoto;

    public function __construct($idIncidente, $descrizione, $longitudine, $latitudine, $data, $ora, $pathFoto)
    {
        $this->idIncidente = $idIncidente;
        $this->descrizione = $descrizione;
        $this->longitudine = $longitudine;
        $this->latitudine = $latitudine;
        $this->data = $data;
        $this->ora = $ora;
        $this->pathFoto = $pathFoto;
    }

    public function getIdIncidente()
    {
        return $this->idIncidente;
    }

    public function setIdIncidente($idIncidente)
    {
        $this->idIncidente = $idIncidente;
    }

    public function getDescrizione()
    {
        return $this->descrizione;
    }

    public function setDescrizione($descrizione)
    {
        $this->descrizione = $descrizione;
    }

    public function getLongitudine()
    {
        return $this->longitudine;
    }

    public function setLongitudine($longitudine)
    {
        $this->longitudine = $longitudine;
    }

    public function getLatitudine()
    {
        return $this->latitudine;
    }

    public function setLatitudine($latitudine)
    {
        $this->latitudine = $latitudine;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getOra()
    {
        return $this->ora;
    }

    public function setOra($ora)
    {
        $this->ora = $ora;
    }

    public function getPathFoto()
    {
        return $this->pathFoto;
    }

    public function setPathFoto($pathFoto)
    {
        $this->pathFoto = $pathFoto;
    }
}