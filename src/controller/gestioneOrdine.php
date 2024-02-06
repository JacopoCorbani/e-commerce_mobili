<?php
    include '../model/scritturaDB/scritturaDB.php';
    if(!isset($_SESSION["ID_UTENTE"])){
        header("Location: ../view/login.html");
        exit();
    }

    if(isset($_POST['annulla'])) {
        annullaOrdine($_POST['annulla']);
        header("Location: ../view/visualizzaOrdini.php");
    }else {
        header("Location: ../view/visualizzaOrdini.php");
    }
?>
