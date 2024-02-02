<?php 
    session_start();
    include $_SERVER["DOCUMENT_ROOT"] . '/PHP/e-commerce_mobili/src/model/connessione.php';
    include $_SERVER["DOCUMENT_ROOT"] . '/PHP/e-commerce_mobili/src/model/collections/classeProdottoCollection.php';
    include $_SERVER["DOCUMENT_ROOT"] . '/PHP/e-commerce_mobili/src/model/collections/classeCarrelloCollection.php';
    include $_SERVER["DOCUMENT_ROOT"] . '/PHP/e-commerce_mobili/src/model/collections/classeOrdiniCollection.php';
    
    $conn = new mysqli($hostname, $username, $password, $dbname);
    if ($conn->connect_error) {
        echo "Connessione fallita: " . die($conn->connect_error);
    }
    function aggiungiAlCarrello($id_mobile, $id_accessori){
        global $conn;
        $id_utente = $_SESSION["ID_UTENTE"];

        $id_carrello = false;

        $query = "SELECT id FROM carrello WHERE id_utente = $id_utente";
        $risultato = $conn->query($query);
        if ($risultato->num_rows > 0) {
            while ($u = $risultato->fetch_assoc()) {
                $id_carrello = $u["id"];
            }
        }
        if($id_carrello == null){
            $query = "INSERT INTO carrello (id_utente) VALUES ($id_utente)";
            $conn->query($query);
            $id_carrello = $conn->insert_id;
        }
 
        $query = "INSERT INTO dettaglio_carrello (id_carrello, id_prodotto, quantita_prodotto) VALUES ($id_carrello, $id_mobile, 1);";
        $conn->query($query);

        if($id_accessori != null){
            array_shift($id_accessori);
            foreach ($id_accessori as $accessorio) {
                $query = "INSERT INTO dettaglio_carrello (id_carrello, id_prodotto, quantita_prodotto) VALUES ($id_carrello, $accessorio, 1);";
                $conn->query($query);
            }
        }        

        $conn->close();
    }
    function rimuoviDalCarrello($id_mobile){
        global $conn;
        $id_utente = $_SESSION["ID_UTENTE"];
        foreach ($id_mobile as $mob) {
            $query = "DELETE dettaglio_carrello FROM dettaglio_carrello
            INNER JOIN carrello ON dettaglio_carrello.id_carrello = carrello.id
            WHERE carrello.id_utente = $id_utente AND dettaglio_carrello.id_prodotto = $mob";
            $conn->query($query);
        }
    }
?>