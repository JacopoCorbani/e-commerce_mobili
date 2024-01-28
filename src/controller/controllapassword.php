<?php 
    session_start();
    include '../model/letturaDB/letturaDBdatiPrivati.php';
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
        $nomeUtente = $_POST["utente"];
        $password = $_POST["password"];
        
        if(controllaPassword($nomeUtente, $password)){
            // se l'utente esiste
            header("Location: ");
        }else{
            // se le credenziali sono sbagliate
            header("Location: ");
        }
    }else{
        header("Location: ../index.php");
        exit;
    }
?>