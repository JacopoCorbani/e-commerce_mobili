<?php 
    include $_SERVER["DOCUMENT_ROOT"] . '/PHP/e-commerce_mobili/src/model/classi/classeOrdine.php';
    class StatusOrdineCollection {
        private $statusOrdini = [];
    
        public function aggiungiStatusOrdine(StatusOrdine $status) {
            $this->statusOrdini[] = $status;
        }
    
        public function getStatusOrdini() {
            return $this->statusOrdini;
        }
    }
    
    class OrdineCollection {
        private $ordini = [];
    
        public function aggiungiOrdine(Ordine $ordine) {
            $this->ordini[] = $ordine;
        }
    
        public function getOrdini() {
            return $this->ordini;
        }
    }
    
    class DettaglioOrdineCollection {
        private $dettagliOrdineProdotti = [];
    
        public function aggiungiDettaglioOrdineProdotto(DettaglioOrdine $dettaglio) {
            $this->dettagliOrdineProdotti[] = $dettaglio;
        }
    
        public function getDettagliOrdine() {
            return $this->dettagliOrdineProdotti;
        }
    }
?>