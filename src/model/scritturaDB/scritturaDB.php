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
    function ordina($indirizzo, $costo_consegna){
        global $conn;
        $id_utente = $_SESSION["ID_UTENTE"];
        $data = date("Y-m-d");
        $query = "INSERT INTO ordine (id_utente, id_status, costo_consegna, data_ordine, id_indirizzo) VALUES ($id_utente, 1, $costo_consegna, $data, $indirizzo);";
        $conn->query($query);
        $id_ordine = $conn->insert_id;

        $query = "SELECT * FROM dettaglio_carrello INNER JOIN carrello ON dettaglio_carrello.id_carrello = carrello.id WHERE carrello.id_utente = $id_utente";
        $risultato = $conn->query($query);
        if($risultato->num_rows > 0){
            while ($dettaglio = $risultato->fetch_assoc()) {
                $id_prodotto = $dettaglio["id_prodotto"];
                $quantita = $dettaglio["quantita_prodotto"];
                $query = "INSERT INTO dettaglio_ordine (id_prodotto, quantita_prodotto, id_ordine) VALUES ($id_prodotto, $quantita, $id_ordine);";
                $conn->query($query);
                $query = "DELETE dettaglio_carrello FROM dettaglio_carrello INNER JOIN carrello ON dettaglio_carrello.id_carrello = carrello.id WHERE carrello.id_utente = $id_utente";
                $conn->query($query);
            }
        }
    }
    function modificaIndirizzo($id, $via, $citta, $stato){
        global $conn;
        $query = "UPDATE indirizzi SET via='$via', citta='$citta', stato='$stato' WHERE id=$id;";
        $conn->query($query);
    }
    function aggiungiIndirizzo($via, $citta, $stato){
        global $conn;
        $id_utente = $_SESSION["ID_UTENTE"];

        $query = "INSERT INTO indirizzi (via, citta, stato, id_utente) VALUES ('$via', '$citta', '$stato', $id_utente);";
        $conn->query($query);
    }
    function annullaOrdine($id_ordine){
        global $conn;
        $query = "UPDATE ordine SET id_status = 6 WHERE id = $id_ordine";
        $conn->query($query);
    }
    function modificaProdotto($id, $nome, $descrizione, $prezzo, $categoria, $id_prodotto){
        global $conn;

        $descrizione = $descrizione == '' ? 'null' : $descrizione;
        $categoria = $categoria == '' ? 'null' : $categoria;
        $id_prodotto = $id_prodotto == '' ? 'null' : $id_prodotto;

        $query = "UPDATE prodotti SET nome = '$nome', descrizione = '$descrizione', prezzo = $prezzo, id_categoria = $categoria, id_prodotto = $id_prodotto WHERE id = $id";
        $conn->query($query);
    }
    function eliminaProdotto($id){
        global $conn;
        $query = "DELETE prodotti FROM prodotti WHERE id = $id";
        $conn->query($query);
    }
    function modificaCategoria($id, $categoria){
        global $conn;
        $query = "UPDATE categoria SET categoria = '$categoria' WHERE id = $id";
        $conn->query($query);
    }
    function modificaUtente($id, $nome, $cognome, $id_ruolo){
        global $conn;
        $query = "UPDATE utente SET nome = '$nome', cognome = '$cognome', id_ruolo = $id_ruolo WHERE id = $id";
        $conn->query($query);
    }
    function aggiungiProdotto($nome, $descrizione, $prezzo, $id_categoria, $id_prodotto){
        global $conn;
        $id_categoria = $id_categoria == '' ? 'NULL' : $id_categoria;
        $id_prodotto = $id_prodotto == '' ? 'NULL' : $id_prodotto;

        $query = "INSERT INTO prodotti(nome, descrizione, prezzo, id_categoria, id_prodotto) VALUES ('$nome',";

        if(isset($descrizione) && !empty($descrizione)) {
            $query .= " '$descrizione',";
        } else {
            $query .= " NULL,";
        }

        $query .= " $prezzo, $id_categoria, $id_prodotto);";

        $conn->query($query);
    }
    function aggiungiCategoria($categoria){
        global $conn;
        $query = "INSERT INTO categoria(categoria) VALUES ('$categoria');";
        $conn->query($query);
    }
    function registrazione($nome, $cognome, $utente, $password){
        global $conn;
        $query = "INSERT INTO utente(nome, cognome) VALUES ('$nome', '$cognome');";
        $conn->query($query);
        $id = $conn->insert_id;
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $query = "INSERT INTO credenziali(nome_utente, password_utente, id_utente) VALUES ('$utente', '$hashed', $id);";
        $conn->query($query);

        $_SESSION["ID_UTENTE"] = $id;
        $_SESSION["NOME_COGNOME"] = $nome . ' ' . $cognome;
        $_SESSION["RUOLO"] = "USER";
    }
?>