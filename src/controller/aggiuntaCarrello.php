<?php
    include '../model/scritturaDB/scritturaDB.php';
    if(!isset($_SESSION["ID_UTENTE"])){
        $url = $_SERVER['HTTP_REFERER'];
        header("Location: $url?error=not_logged");
    }

    if(isset($_POST['id_mobile'])) {
        $id_mobile = $_POST['id_mobile'];
        $id_accessori[] = null;

        foreach ($_POST['accessori'] as $valore) {
            $id_accessori[] = $valore;
        }

        aggiungiAlCarrello($id_mobile, $id_accessori);
        header("Location: ../view/visualizzaPerCategoria.php");
    }else{
        header("Location: ../view/index.php");
    }
?>
