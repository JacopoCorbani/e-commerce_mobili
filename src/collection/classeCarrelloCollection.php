<?php 
    class CarrelloCollection {
        private $carrelli = [];
    
        public function aggiungiCarrello(Carrello $carrello) {
            $this->carrelli[] = $carrello;
        }
    
        public function getCarrelli() {
            return $this->carrelli;
        }
    }
    class DettaglioCarrelloProdottoCollection {
        private $dettagliCarrelloProdotti = [];
    
        public function aggiungiDettaglioCarrelloProdotto(DettaglioCarrelloProdotto $dettaglio) {
            $this->dettagliCarrelloProdotti[] = $dettaglio;
        }
    
        public function getDettagliCarrelloProdotti() {
            return $this->dettagliCarrelloProdotti;
        }
    }
    class DettaglioCarrelloAccessorioCollection {
        private $dettagliCarrelloAccessori = [];
    
        public function aggiungiDettaglioCarrelloAccessorio(DettaglioCarrelloAccessorio $dettaglio) {
            $this->dettagliCarrelloAccessori[] = $dettaglio;
        }
    
        public function getDettagliCarrelloAccessori() {
            return $this->dettagliCarrelloAccessori;
        }
    }
?>