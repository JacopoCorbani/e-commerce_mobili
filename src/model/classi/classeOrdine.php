<?php 
    class StatusOrdine {
        public $id;
        public $status_ordine;
    
        public function __construct($id, $status_ordine) {
            $this->id = $id;
            $this->status_ordine = $status_ordine;
        }
    }
    
    class Ordine {
        public $id;
        public $id_utente;
        public $id_status;
    
        public function __construct($id, $id_utente, $id_status) {
            $this->id = $id;
            $this->id_utente = $id_utente;
            $this->id_status = $id_status;
        }
    }
    
    class DettaglioOrdineProdotto {
        public $id;
        public $id_prodotto;
        public $quantita_prodotto;
        public $id_ordine;
    
        public function __construct($id, $id_prodotto, $quantita_prodotto, $id_ordine) {
            $this->id = $id;
            $this->id_prodotto = $id_prodotto;
            $this->quantita_prodotto = $quantita_prodotto;
            $this->id_ordine = $id_ordine;
        }
    }
    class DettaglioOrdineAccessorio {
        public $id;
        public $id_accessorio;
        public $quantita_accessorio;
        public $id_ordine;
    
        public function __construct($id, $id_accessorio, $quantita_accessorio, $id_ordine) {
            $this->id = $id;
            $this->id_accessorio = $id_accessorio;
            $this->quantita_accessorio = $quantita_accessorio;
            $this->id_ordine = $id_ordine;
        }
    }
?>