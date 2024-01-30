<?php
class Ruolo
{
    public $id;
    public $ruolo;

    public function __construct($id, $ruolo)
    {
        $this->id = $id;
        $this->ruolo = $ruolo;
    }
    public function getId()
    {
        return $this->id;
    }
    public function getRuolo()
    {
        return $this->ruolo;
    }
}

class Utente
{
    public $id;
    public $nome;
    public $cognome;
    public $id_ruolo;

    public function __construct($id, $nome, $cognome, $id_ruolo)
    {
        $this->id = $id;
        $this->nome = $nome;
        $this->cognome = $cognome;
        $this->id_ruolo = $id_ruolo;
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

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getCognome()
    {
        return $this->cognome;
    }

    public function setCognome($cognome): self
    {
        $this->cognome = $cognome;

        return $this;
    }

    public function getIdRuolo()
    {
        return $this->id_ruolo;
    }

    public function setIdRuolo($id_ruolo): self
    {
        $this->id_ruolo = $id_ruolo;

        return $this;
    }
}
class Indirizzo
{
    public $id;
    public $via;
    public $citta;
    public $stato;
    public $id_utente;

    public function __construct($id, $via, $citta, $stato, $id_utente)
    {
        $this->id = $id;
        $this->via = $via;
        $this->citta = $citta;
        $this->stato = $stato;
        $this->id_utente = $id_utente;
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

    public function getVia()
    {
        return $this->via;
    }

    public function setVia($via): self
    {
        $this->via = $via;

        return $this;
    }

    public function getCitta()
    {
        return $this->citta;
    }

    public function setCitta($citta): self
    {
        $this->citta = $citta;

        return $this;
    }

    public function getStato()
    {
        return $this->stato;
    }

    public function setStato($stato): self
    {
        $this->stato = $stato;

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
}
