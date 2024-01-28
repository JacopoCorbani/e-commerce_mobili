<?php 
    class Categoria {
        public $id;
        public $categoria;
    
        public function __construct($id, $categoria) {
            $this->id = $id;
            $this->categoria = $categoria;
        }
    }
    class Prodotto {
        public $id;
        public $nome;
        public $descrizione;
        public $prezzo;
        public $id_categoria;
    
        public function __construct($id, $nome, $descrizione, $prezzo, $id_categoria) {
            $this->id = $id;
            $this->nome = $nome;
            $this->descrizione = $descrizione;
            $this->prezzo = $prezzo;
            $this->id_categoria = $id_categoria;
        }
    }
    class Accessorio {
        public $id;
        public $nome;
        public $descrizione;
        public $prezzo;
        public $id_prodotto;
    
        public function __construct($id, $nome, $descrizione, $prezzo, $id_prodotto) {
            $this->id = $id;
            $this->nome = $nome;
            $this->descrizione = $descrizione;
            $this->prezzo = $prezzo;
            $this->id_prodotto = $id_prodotto;
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
    }
    
?>