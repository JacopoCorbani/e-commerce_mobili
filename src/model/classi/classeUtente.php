<?php 
    class Ruolo {
        public $id;
        public $ruolo;
    
        public function __construct($id, $ruolo) {
            $this->id = $id;
            $this->ruolo = $ruolo;
        }
    }
    
    class Utente {
        public $id;
        public $nome;
        public $cognome;
        public $id_ruolo;

        public function __construct($id, $nome, $cognome, $id_ruolo) {
            $this->id = $id;
            $this->nome = $nome;
            $this->cognome = $cognome;
            $this->id_ruolo = $id_ruolo;
        }
    }
    class Indirizzo {
        public $id;
        public $via;
        public $citta;
        public $stato;
        public $id_utente;

        public function __construct($id, $via, $citta, $stato, $id_utente) {
            $this->id = $id;
            $this->via = $via;
            $this->citta = $citta;
            $this->stato = $stato;
            $this->id_utente = $id_utente;
        }
    }
?>