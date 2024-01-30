<?php 
    include $_SERVER["DOCUMENT_ROOT"] . '/PHP/e-commerce_mobili/src/model/classi/classeUtente.php';

    class RuoloCollection{
        private $ruoli = [];

        public function aggiungiRuolo(Ruolo $ruolo){
            $this->ruoli[] = $ruolo;
        }
        
        public function getRuoli(){
            return $this->ruoli;
        }
    }

    class UtenteCollection{
        private $utenti = [];

        public function aggiungiUtente(Utente $utente){
            $this->utenti[] = $utente;
        }

        public function getUtente(){
            return $this->utenti;
        }
    }

    class IndirizzoCollection{
        private $indirizzi = [];

        public function aggiungiIndirizzi(Indirizzo $indirizzo){
            $this->indirizzi[] = $indirizzo;
        }

        public function getIndirizzi(){
            return $this->indirizzi;
        }
    }
?>