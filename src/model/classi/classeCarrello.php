<?php 
    class CarrelloProdotto {
        public $id;
        public $id_prodotto;
        public $quantita_prodotto;
        public $id_utente;
    
        public function __construct($id, $id_prodotto, $quantita_prodotto, $id_utente) {
            $this->id = $id;
            $this->id_prodotto = $id_prodotto;
            $this->quantita_prodotto = $quantita_prodotto;
            $this->id_utente = $id_utente;
        }
    }
    class CarrelloAccessorio {
        public $id;
        public $id_accessorio;
        public $quantita_accessorio;
        public $id_utente;
    
        public function __construct($id, $id_accessorio, $quantita_accessorio, $id_utente) {
            $this->id = $id;
            $this->id_accessorio = $id_accessorio;
            $this->quantita_accessorio = $quantita_accessorio;
            $this->id_utente = $id_utente;
        }
    }
    
?>