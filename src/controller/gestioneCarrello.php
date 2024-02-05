<?php
    include '../model/scritturaDB/scritturaDB.php';
    if(!isset($_SESSION["ID_UTENTE"])){
        header("Location: ../view/login.html");
        exit();
    }

    if(isset($_POST['id_mobile'])) {
        $id_mobile = $_POST['id_mobile'];
        $id_accessori[] = null;

        foreach ($_POST['accessori'] as $valore) {
            $id_accessori[] = $valore;
        }

        aggiungiAlCarrello($id_mobile, $id_accessori);
        header("Location: ../view/visualizzaPerCategoria.php");
    }else if(isset($_POST["rimuovere_mobile"])){
        $str = $_POST["rimuovere_mobile"];
        //var_dump($str);
        $id_rimuovere = explode(';', $str[0]);
        //var_dump($id_rimuovere);
        //exit();
        array_pop($id_rimuovere);
        rimuoviDalCarrello($id_rimuovere);
        header("Location: ../view/visualizzaCarrello.php");
    }else if(isset($_POST["indirizzo"])){
        ordina($_POST["indirizzo"], $_POST["costo_consenga"]);
        header("Location: ../view/visualizzaPerCategoria.php");
    }else {
        header("Location: ../view/index.php");
    }
?>
