<?php
    include '../model/scritturaDB/scritturaDB.php';
    if(!isset($_SESSION["ID_UTENTE"])){
        header("Location: ../view/login.html");
        exit();
    }
    if(isset($_POST["via"]) && isset($_POST["citta"]) && isset($_POST["stato"])) {
        aggiungiIndirizzo($_POST["via"], $_POST["citta"], $_POST["stato"]);
        header("Location: ../view/profilo.php");
    }else {
        header("Location: ../view/index.php");
    }
?>
