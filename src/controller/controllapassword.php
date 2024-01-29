<?php
    include '../model/letturaDB/letturaDBdatiPrivati.php';
    if(($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST["utente"]) && isset($_POST["password"])){
        $nomeUtente = $_POST["utente"];
        $password = $_POST["password"];
        
        if(controllaPassword($nomeUtente, $password)){
            // se l'utente esiste
            header("Location: ../view/index.php");
        }else{
            // se le credenziali sono sbagliate
            header("Location: ../view/login.html");
        }
    }else{
        header("Location: ../view/login.html");
        exit;
    }
?>