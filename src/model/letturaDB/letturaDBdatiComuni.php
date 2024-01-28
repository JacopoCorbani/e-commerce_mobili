<?php 
    include '../connessione.php';
    include '../collections/classeProdottoCollection.php';
    include '../collections/classeCarrelloCollection.php';
    include '../collections/classeOrdiniCollection.php';
    
    $categorie = new CategoriaCollection();
    $prodotti = new ProdottoCollection();
    $accessori = new AccessorioCollection();
    $immagini_prodotto = new Immagine_ProdottoCollection();
    $immagini_categoria = new Immagine_CategoriaCollection();

    //collections/classeOrdiniCollection.php
    $status = new StatusOrdineCollection();
    $ordini = new OrdineCollection();
    $dettaglioOrdiniProdotti = new DettaglioOrdineProdottoCollection();
    $dettaglioOrdiniAccessori = new DettaglioOrdineAccessorioCollection();

    //collections/classeProdottoCollection.php
    $carrelloProdotti = new CarrelloProdottoCollection();
    $carrelloAccessori = new CarrelloAccessorioCollection();

    $conn = new mysqli($hostname, $username, $password, $dbname);
    if ($conn->connect_error) {
        echo "Connessione fallita: " . die($conn->connect_error);
    }

    $query = "SELECT * FROM categoria";
    $risultato = $conn->query($query);
    if($risultato->num_rows > 0){
        while($cat = $risultato->fetch_assoc()){
            $categorie->aggiungiCategoria(new Categoria($cat["id"], $cat["categoria"]));
        }
    }

    $query = "SELECT * FROM prodotti";
    $risultato = $conn->query($query);
    if($risultato->num_rows > 0){
        while($prod = $risultato->fetch_assoc()){
            $prodotti->aggiungiProdotto(new Prodotto($prod["id"], $prod["nome"], $prod["descrizione"], $prod["prezzo"], $prod["id_categoria"]));
        }
    }

    $query = "SELECT * FROM accessori";
    $risultato = $conn->query($query);
    if($risultato->num_rows > 0){
        while($acc = $risultato->fetch_assoc()){
            $accessori->aggiungiAccessorio(new Accessorio($acc["id"], $acc["nome"], $acc["descrizione"], $acc["prezzo"], $acc["id_prodotto"]));
        }
    }

    $query = "SELECT * FROM immagini_prodotti";
    $risultato = $conn->query($query);
    if($risultato->num_rows > 0){
        while($imm = $risultato->fetch_assoc()){
            $immagini_prodotto->aggiungiImmagine(new Immagine_Prodotto($imm["id"], $imm["path_immagine"], $imm["id_prodotti"]));
        }
    }

    $query = "SELECT * FROM immagini_categorie";
    $risultato = $conn->query($query);
    if($risultato->num_rows > 0){
        while($imm = $risultato->fetch_assoc()){
            $immagini_categoria->aggiungiImmagine(new Immagine_Categoria($imm["id"], $imm["path_immagine"], $imm["id_prodotti"]));
        }
    }

    $conn = new mysqli($hostname, $username, $password, $dbname);
        if ($conn->connect_error) {
            echo "Connessione fallita: " . die($conn->connect_error);
        }

        $query = "SELECT * FROM status_ordine";
        $risultato = $conn->query($query);
        if($risultato->num_rows > 0){
            while($stat = $risultato->fetch_assoc()){
                $status->aggiungiStatusOrdine(new StatusOrdine($stat["id"], $status_ordine["status_ordine"]));
            }
        }

        $query = "SELECT * FROM ordine WHERE id_utente = $id_utente";
        $risultato = $conn->query($query);
        if($risultato->num_rows > 0){
            while($ord = $risultato->fetch_assoc()){
                $ordini->aggiungiOrdine(new Ordine($ord["id"], $ord["id_utente"], $ord["id_status"]));
            }
        }

        $query = "SELECT * FROM dettaglio_ordine_prodotti INNER JOIN ordine ON dettaglio_ordine_prodotti.id_ordine = ordine.id";
        $risultato = $conn->query($query);
        if($risultato->num_rows > 0){
            while($dett = $risultato->fetch_assoc()){
                $dettaglioOrdiniProdotti->aggiungiDettaglioOrdineProdotto(new DettaglioOrdineProdotto($dett["id"], $dett["id_prodotto"], $dett["quantita_prodotto"], $dett["id_ordine"]));
            }
        }

        $query = "SELECT * FROM dettaglio_ordine_accessori INNER JOIN ordine ON dettaglio_ordine_accessori.id_ordine = ordine.id";
        $risultato = $conn->query($query);
        if($risultato->num_rows > 0){
            while($dett = $risultato->fetch_assoc()){
                $dettaglioOrdiniAccessori->aggiungiDettaglioOrdineAccessorio(new DettaglioOrdineAccessorio($dett["id"], $dett["id_accessorio"], $dett["quantita_accessorio"], $dett["id_ordine"]));
            }
        }
        
        $query = "SELECT * FROM carrello_prodotti";
        $risultato = $conn->query($query);
        if($risultato->num_rows > 0){
            while($car = $risultato->fetch_assoc()){
                $carrelloProdotti->aggiungiCarrelloProdotto(new CarrelloProdotto($car["id"], $car["id_prodotto"], $car["quantita_prodotto"], $car["id_utente"]));
            }
        }

        $query = "SELECT * FROM carrello_accessori";
        $risultato = $conn->query($query);
        if($risultato->num_rows > 0){
            while($car = $risultato->fetch_assoc()){
                $carrelloAccessori->aggiungiCarrelloAccessorio(new CarrelloAccessorio($car["id"], $car["id_accessorio"], $car["quantita_accessorio"], $car["id_utente"]));
            }
        }

    $conn->close();
?>