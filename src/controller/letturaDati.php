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
    function selezionaIndirizzi($id){
        return getIndirizzi($id)->getIndirizzi();
    }
    function selezionaOrdini($id){
        return getOrdini($id)->getOrdini();
    }
    function selezionaDettagliOrdini($id_ordine){
        return getDettagliOrdine($id_ordine)->getDettagliOrdine();
    }
    function selezionaTotaleOrdine($id_ordine){
        return getTotaleOrdine($id_ordine);
    }
    function selezionaIndirizzoOrdine($id_ordine){
        return getIndirizzoOrdine($id_ordine);
    }
    function selezionaStatusOrdine($id_ordine){
        return getStatusOrdine($id_ordine);
    }
    function selezionaProdottiOrdine($id_ordine){
        return getProdottiOrdine($id_ordine);
    }
    function selezionaUtenti(){
        return getUtenti()->getUtente();
    }
    function selezionaRuoli(){
        return getRuoli()->getRuoli();
    }
    function selezionaRuoloUtente($id){
        return getRuoloUtente($id);
    }
?>