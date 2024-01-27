<?php 
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
    
    class DettaglioOrdineProdottoCollection {
        private $dettagliOrdineProdotti = [];
    
        public function aggiungiDettaglioOrdineProdotto(DettaglioOrdineProdotto $dettaglio) {
            $this->dettagliOrdineProdotti[] = $dettaglio;
        }
    
        public function getDettagliOrdineProdotti() {
            return $this->dettagliOrdineProdotti;
        }
    }
    
    class DettaglioOrdineAccessorioCollection {
        private $dettagliOrdineAccessori = [];
    
        public function aggiungiDettaglioOrdineAccessorio(DettaglioOrdineAccessorio $dettaglio) {
            $this->dettagliOrdineAccessori[] = $dettaglio;
        }
    
        public function getDettagliOrdineAccessori() {
            return $this->dettagliOrdineAccessori;
        }
    }
    
?>