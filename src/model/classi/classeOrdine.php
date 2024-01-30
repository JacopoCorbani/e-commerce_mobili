<?php
class StatusOrdine
{
    public $id;
    public $status_ordine;

    public function __construct($id, $status_ordine)
    {
        $this->id = $id;
        $this->status_ordine = $status_ordine;
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

    public function getStatusOrdine()
    {
        return $this->status_ordine;
    }

    public function setStatusOrdine($status_ordine): self
    {
        $this->status_ordine = $status_ordine;

        return $this;
    }
}

class Ordine
{
    public $id;
    public $id_utente;
    public $id_status;

    public function __construct($id, $id_utente, $id_status)
    {
        $this->id = $id;
        $this->id_utente = $id_utente;
        $this->id_status = $id_status;
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
        return $this->id_utente;
    }
    public function setIdUtente($id_utente): self
    {
        $this->id_utente = $id_utente;

        return $this;
    }
    public function getIdStatus()
    {
        return $this->id_status;
    }
    public function setIdStatus($id_status): self
    {
        $this->id_status = $id_status;

        return $this;
    }
}

class DettaglioOrdine
{
    private $id;
    private $idProdotto;
    private $quantitaProdotto;
    private $idOrdine;

    public function __construct($id, $idProdotto, $quantitaProdotto, $idOrdine)
    {
        $this->id = $id;
        $this->idProdotto = $idProdotto;
        $this->quantitaProdotto = $quantitaProdotto;
        $this->idOrdine = $idOrdine;
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

    public function getIdOrdine()
    {
        return $this->idOrdine;
    }

    public function setIdOrdine($idOrdine): self
    {
        $this->idOrdine = $idOrdine;

        return $this;
    }
}
