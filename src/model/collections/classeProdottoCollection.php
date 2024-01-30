<?php 
    include $_SERVER["DOCUMENT_ROOT"] . '/PHP/e-commerce_mobili/src/model/classi/classeProdotto.php';

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
    
        public function aggiungiProdotto(Prodotti $prodotto) {
            $this->prodotti[] = $prodotto;
        }
    
        public function getProdotti() {
            return $this->prodotti;
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