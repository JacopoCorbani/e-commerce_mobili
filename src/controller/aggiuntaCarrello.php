<?php
    include '../model/scritturaDB/scritturaDB.php';

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
