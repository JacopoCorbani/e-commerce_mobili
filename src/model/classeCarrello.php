<?php 
    class Carrello {
        public $id;
        public $id_utente;
    
        public function __construct($id, $id_utente) {
            $this->id = $id;
            $this->id_utente = $id_utente;
        }
    }
    class DettaglioCarrelloProdotto {
        public $id;
        public $id_prodotto;
        public $quantita_prodotto;
        public $id_carrello;
    
        public function __construct($id, $id_prodotto, $quantita_prodotto, $id_carrello) {
            $this->id = $id;
            $this->id_prodotto = $id_prodotto;
            $this->quantita_prodotto = $quantita_prodotto;
            $this->id_carrello = $id_carrello;
        }
    }
    class DettaglioCarrelloAccessorio {
        public $id;
        public $id_accessorio;
        public $quantita_accessorio;
        public $id_carrello;
    
        public function __construct($id, $id_accessorio, $quantita_accessorio, $id_carrello) {
            $this->id = $id;
            $this->id_accessorio = $id_accessorio;
            $this->quantita_accessorio = $quantita_accessorio;
            $this->id_carrello = $id_carrello;
        }
    }
    
?>