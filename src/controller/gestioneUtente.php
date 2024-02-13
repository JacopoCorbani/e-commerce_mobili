<?php
    include '../model/scritturaDB/scritturaDB.php';
    if(isset($_POST["via"]) && isset($_POST["citta"]) && isset($_POST["stato"])) {
        aggiungiIndirizzo($_POST["via"], $_POST["citta"], $_POST["stato"]);
        header("Location: ../view/profilo.php");
    }else if(isset($_POST["nome"])){
        registrazione($_POST["nome"], $_POST["cognome"], $_POST["utente"], $_POST["password"]);
        header("Location: ../view/index.php");
    }{
        header("Location: ../view/index.php");
    }
?>
