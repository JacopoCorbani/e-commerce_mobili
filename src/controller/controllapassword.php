<?php
    include '../model/letturaDB/letturaDB.php';
    if(($_SERVER['REQUEST_METHOD'] === 'POST') && isset($_POST["utente"]) && isset($_POST["password"])){
        $nomeUtente = $_POST["utente"];
        $password = $_POST["password"];
        
        if(controllaPassword($nomeUtente, $password)){
            // se le credenziali sono corrette
            header("Location: ../view/index.php");
        }else{
            // se le credenziali sono sbagliate
            header("Location: ../view/login.html?error=password_errata");
        }
    }else{
        header("Location: ../view/login.html");
        exit;
    }
?>