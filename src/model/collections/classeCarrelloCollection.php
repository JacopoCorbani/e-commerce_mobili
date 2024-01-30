<?php 
    include $_SERVER["DOCUMENT_ROOT"] . '/PHP/e-commerce_mobili/src/model/classi/classeCarrello.php';
    class DettaglioCarrelloCollection {
        private $dettagliCarrello = [];
    
        public function aggiungiDettaglioCarrello(DettaglioCarrello $dettaglio) {
            $this->dettagliCarrello[] = $dettaglio;
        }
    
        public function getDettaglioCarrello() {
            return $this->dettagliCarrello;
        }
    }
?>