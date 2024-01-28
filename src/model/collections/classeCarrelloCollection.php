<?php 
    include '../classi/classeCarrello.php';
    class CarrelloProdottoCollection {
        private $dettagliCarrelloProdotti = [];
    
        public function aggiungiCarrelloProdotto(CarrelloProdotto $dettaglio) {
            $this->dettagliCarrelloProdotti[] = $dettaglio;
        }
    
        public function getDettagliCarrelloProdotti() {
            return $this->dettagliCarrelloProdotti;
        }
    }
    class CarrelloAccessorioCollection {
        private $dettagliCarrelloAccessori = [];
    
        public function aggiungiCarrelloAccessorio(CarrelloAccessorio $dettaglio) {
            $this->dettagliCarrelloAccessori[] = $dettaglio;
        }
    
        public function getDettagliCarrelloAccessori() {
            return $this->dettagliCarrelloAccessori;
        }
    }
?>