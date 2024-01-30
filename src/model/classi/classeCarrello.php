<?php
class Carrello
{
    private $id;
    private $idUtente;

    public function __construct($id, $idUtente)
    {
        $this->id = $id;
        $this->idUtente = $idUtente;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getIdUtente()
    {
        return $this->idUtente;
    }

    public function setIdUtente($idUtente): self
    {
        $this->idUtente = $idUtente;

        return $this;
    }
}

class DettaglioCarrello
{
    private $id;
    private $idCarrello;
    private $idProdotto;
    private $quantitaProdotto;

    public function __construct($id, $idCarrello, $idProdotto, $quantitaProdotto)
    {
        $this->id = $id;
        $this->idCarrello = $idCarrello;
        $this->idProdotto = $idProdotto;
        $this->quantitaProdotto = $quantitaProdotto;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getIdCarrello()
    {
        return $this->idCarrello;
    }

    public function setIdCarrello($idCarrello): self
    {
        $this->idCarrello = $idCarrello;

        return $this;
    }

    public function getIdProdotto()
    {
        return $this->idProdotto;
    }

    public function setIdProdotto($idProdotto): self
    {
        $this->idProdotto = $idProdotto;

        return $this;
    }

    public function getQuantitaProdotto()
    {
        return $this->quantitaProdotto;
    }

    public function setQuantitaProdotto($quantitaProdotto): self
    {
        $this->quantitaProdotto = $quantitaProdotto;

        return $this;
    }
}
