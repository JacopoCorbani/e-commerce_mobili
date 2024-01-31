<?php 
    session_start();
    unset($_SESSION["ID_UTENTE"]);
    unset($_SESSION["NOME_COGNOME"]);
    unset($_SESSION["RUOLO"]);

    header("Location: ../view/index.php");
?>