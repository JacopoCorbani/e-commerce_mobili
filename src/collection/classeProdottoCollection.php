<?php 
    class CategoriaCollection {
        private $categorie = [];
    
        public function aggiungiCategoria(Categoria $categoria) {
            $this->categorie[] = $categoria;
        }
    
        public function getCategorie() {
            return $this->categorie;
        }
    }
    class ProdottoCollection {
        private $prodotti = [];
    
        public function aggiungiProdotto(Prodotto $prodotto) {
            $this->prodotti[] = $prodotto;
        }
    
        public function getProdotti() {
            return $this->prodotti;
        }
    }
    class AccessorioCollection {
        private $accessori = [];
    
        public function aggiungiAccessorio(Accessorio $accessorio) {
            $this->accessori[] = $accessorio;
        }
    
        public function getAccessori() {
            return $this->accessori;
        }
    }
    class Immagine_ProdottoCollection {
        private $immagini = [];
    
        public function aggiungiImmagine(Immagine_Prodotto $immagine) {
            $this->immagini[] = $immagine;
        }
    
        public function getImmagini() {
            return $this->immagini;
        }
    }
    class Immagine_CategoriaCollection {
        private $immagini = [];
    
        public function aggiungiImmagine(Immagine_Categoria $immagine) {
            $this->immagini[] = $immagine;
        }
    
        public function getImmagini() {
            return $this->immagini;
        }
    }
    
?>