<?php 
    include $_SERVER["DOCUMENT_ROOT"] . "/PHP/e-commerce_mobili/src/model/letturaDB/letturaDB.php";
    function selezionaCategorie(){
        return getCategorie()->getCategorie();
    }
    function selezionaImmaginiCategorie(){
        return getImmagini_categorie()->getImmagini();
    }
    function selezionaProdotti(){
        return getProdotti()->getProdotti();
    }
    function selezionaImmaginiProdotti(){
        return getImmagini_prodotti()->getImmagini();
    }
    function selezionaDettagliCarrello($id){
        return getDettaglioCarrello($id)->getDettaglioCarrello();
    }
?>