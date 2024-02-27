<?php
    include '../model/scritturaDB/scritturaDB.php';
    if(isset($_POST["via"]) && isset($_POST["citta"]) && isset($_POST["stato"])) {
        if(isset($_POST["modifica"])){
            modificaIndirizzo($_POST["id_indirizzo"], $_POST["via"], $_POST["citta"], $_POST["stato"]);
            header("Location: ../view/profilo.php");
            exit();
        }
        aggiungiIndirizzo($_POST["via"], $_POST["citta"], $_POST["stato"]);
        if(isset($_POST["carrello"])){
            header("Location: ../view/visualizzaCarrello.php");
        }else{
            header("Location: ../view/profilo.php");
        }
    }else if(isset($_POST["nome"])){
        registrazione($_POST["nome"], $_POST["cognome"], $_POST["utente"], $_POST["password"]);
        header("Location: ../view/index.php");
    }else if(isset($_POST["elimina"])){
        eliminaIndirizzo($_POST["id_indirizzo"]);
        header("Location: ../view/profilo.php");
        exit();
    }else{
        header("Location: ../view/index.php");
    }
?>
