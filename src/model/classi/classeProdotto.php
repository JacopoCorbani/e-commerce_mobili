<?php 
    class Categoria {
        private $id;
        private $categoria;
    
        public function __construct($id, $categoria) {
            $this->id = $id;
            $this->categoria = $categoria;
        }
    
        public function getId() {
            return $this->id;
        }
    
        public function getCategoria() {
            return $this->categoria;
        }
    
        public function setCategoria($categoria) {
            $this->categoria = $categoria;
        }
    }
    class Prodotti {
        private $id;
        private $nome;
        private $descrizione;
        private $prezzo;
        private $idCategoria;
        private $idProdotto;
    
        public function __construct($id, $nome, $descrizione, $prezzo, $idCategoria, $idProdotto) {
            $this->id = $id;
            $this->nome = $nome;
            $this->descrizione = $descrizione;
            $this->prezzo = $prezzo;
            $this->idCategoria = $idCategoria;
            $this->idProdotto = $idProdotto;
        }
    
        public function getId() {
            return $this->id;
        }
    
        public function getNome() {
            return $this->nome;
        }
    
        public function getDescrizione() {
            return $this->descrizione;
        }
    
        public function getPrezzo() {
            return $this->prezzo;
        }
    
        public function getIdCategoria() {
            return $this->idCategoria;
        }
    
        public function getIdProdotto() {
            return $this->idProdotto;
        }
    
        public function setIdCategoria($idCategoria) {
            $this->idCategoria = $idCategoria;
        }
    
        public function setIdProdotto($idProdotto) {
            $this->idProdotto = $idProdotto;
        }
    }
    class Immagine_Prodotto {
        public $id;
        public $path_immagine;
        public $id_prodotti;
    
        public function __construct($id, $path_immagine, $id_prodotti) {
            $this->id = $id;
            $this->path_immagine = $path_immagine;
            $this->id_prodotti = $id_prodotti;
        }
        public function getpath_immagine(){
            return $this->path_immagine;
        }
        public function getId_prodotti(){
            return $this->id_prodotti;
        }
        public function setpath_immagine($path_immagine){
            $this->path_immagine = $path_immagine;
        }
    }
    class Immagine_Categoria {
        public $id;
        public $path_immagine;
        public $id_categoria;
    
        public function __construct($id, $path_immagine, $id_categoria) {
            $this->id = $id;
            $this->path_immagine = $path_immagine;
            $this->id_categoria = $id_categoria;
        }
        public function getpath_immagine(){
            return $this->path_immagine;
        }
        public function getId_categoria(){
            return $this->id_categoria;
        }
        public function setpath_immagine($path_immagine){
            $this->path_immagine = $path_immagine;
        }
    }
    
?>