<?php 
    include '../model/scritturaDB/scritturaDB.php';
    if(!isset($_SESSION["ID_UTENTE"])){
        header("Location: ../view/login.html");
        exit();
    }

    if(isset($_POST['nome']) && isset($_POST['descrizione'])) {
        modificaProdotto($_POST['id'], $_POST['nome'], $_POST['descrizione'], $_POST['prezzo'], $_POST['categoria'], $_POST['id_prodotto']);
        header("Location: ../view/admin.php");
    }else if(isset($_POST["idElimina"])){
        eliminaProdotto($_POST["idElimina"]);
        header("Location: ../view/admin.php");
    }else if(isset($_POST["inputCat"])){
        modificaCategoria($_POST["inputIdCat"], $_POST["inputCat"]);
        header("Location: ../view/admin.php");
    }else if(isset($_POST["inputIdUtente"])){
        modificaUtente($_POST["inputIdUtente"], $_POST["inputNomeUtente"], $_POST["inputCognomeUtente"], $_POST["id_ruolo"]);
        header("Location: ../view/admin.php");
    }else{
        header("Location: ../view/admin.php");
    }
?>