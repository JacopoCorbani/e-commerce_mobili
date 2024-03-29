<?php
session_start();
include $_SERVER["DOCUMENT_ROOT"] . '/PHP/e-commerce_mobili/src/model/connessione.php';
include $_SERVER["DOCUMENT_ROOT"] . '/PHP/e-commerce_mobili/src/model/collections/classeProdottoCollection.php';
include $_SERVER["DOCUMENT_ROOT"] . '/PHP/e-commerce_mobili/src/model/collections/classeCarrelloCollection.php';
include $_SERVER["DOCUMENT_ROOT"] . '/PHP/e-commerce_mobili/src/model/collections/classeOrdiniCollection.php';
include $_SERVER["DOCUMENT_ROOT"] . '/PHP/e-commerce_mobili/src/model/collections/classeUtenteCollection.php';

$conn = new mysqli($hostname, $username, $password, $dbname);
if ($conn->connect_error) {
    echo "Connessione fallita: " . die($conn->connect_error);
}

function controllaPassword($nome_utente, $password_utente)
{
    include $_SERVER["DOCUMENT_ROOT"] . '/PHP/e-commerce_mobili/src/model/connessione.php';

    $conn = new mysqli($hostname, $username, $password, $dbname);
    if ($conn->connect_error) {
        echo "Connessione fallita: " . die($conn->connect_error);
    }

    $query = "SELECT id_utente, password_utente FROM credenziali WHERE nome_utente = '$nome_utente'";
    $risultato = $conn->query($query);
    $id_utente = null;
    $password_criptata = "";
    if ($risultato->num_rows > 0) {
        while ($ut = $risultato->fetch_assoc()) {
            $id_utente = $ut["id_utente"];
            $password_criptata = $ut["password_utente"];
        }
    } else {
        // echo "non esiste";
        // exit();
        return false; //l'utente non esiste
    }
    echo $id_utente . ' ' . $password_criptata . '-';
    if (password_verify($password_utente, $password_criptata)) {
        $query = "SELECT utente.nome, utente.cognome, ruolo.ruolo FROM utente INNER JOIN credenziali ON utente.id = credenziali.id_utente INNER JOIN ruolo ON utente.id_ruolo = ruolo.id WHERE utente.id = $id_utente";
        $risultato = $conn->query($query);
        if ($risultato->num_rows > 0) {
            var_dump($risultato);
            while ($ut = $risultato->fetch_assoc()) {
                var_dump($ut);
                $_SESSION["ID_UTENTE"] = $id_utente;
                $_SESSION["NOME_COGNOME"] = $ut["nome"] . ' ' . $ut["cognome"];
                $_SESSION["RUOLO"] = $ut["ruolo"];
            }
        }
    } else {
        // echo "password errata";
        // exit();
        return false; //la password è errata
    }


    $conn->close();
    // exit();
    return true;
}



function getCategorie()
{
    global $conn;
    $categorie = new CategoriaCollection();
    $query = "SELECT * FROM categoria";
    $risultato = $conn->query($query);
    if ($risultato->num_rows > 0) {
        while ($cat = $risultato->fetch_assoc()) {
            $categorie->aggiungiCategoria(new Categoria($cat["id"], $cat["categoria"]));
        }
    }
    return $categorie;
}
function getProdotti()
{
    global $conn;
    $prodotti = new ProdottoCollection();
    $query = "SELECT * FROM prodotti";
    $risultato = $conn->query($query);
    if ($risultato->num_rows > 0) {
        while ($prod = $risultato->fetch_assoc()) {
            $prodotti->aggiungiProdotto(new Prodotti($prod["id"], $prod["nome"], $prod["descrizione"], $prod["prezzo"], $prod["id_categoria"], $prod["id_prodotto"]));
        }
    }
    return $prodotti;
}
function getImmagini_prodotti()
{
    global $conn;
    $immagini_prodotto = new Immagine_ProdottoCollection();
    $query = "SELECT * FROM immagini_prodotti";
    $risultato = $conn->query($query);
    if ($risultato->num_rows > 0) {
        while ($imm = $risultato->fetch_assoc()) {
            $immagini_prodotto->aggiungiImmagine(new Immagine_Prodotto($imm["id"], $imm["path_immagine"], $imm["id_prodotti"]));
        }
    }
    return $immagini_prodotto;
}
function getImmagini_categorie()
{
    global $conn;
    $immagini_categoria = new Immagine_CategoriaCollection();
    $query = "SELECT * FROM immagini_categorie";
    $risultato = $conn->query($query);
    if ($risultato->num_rows > 0) {
        while ($imm = $risultato->fetch_assoc()) {
            $immagini_categoria->aggiungiImmagine(new Immagine_Categoria($imm["id"], $imm["path_immagine"], $imm["id_categoria"]));
        }
    }
    return $immagini_categoria;
}
function getStatus_ordini()
{
    global $conn;
    $status = new StatusOrdineCollection();
    $query = "SELECT * FROM status_ordine";
    $risultato = $conn->query($query);
    if ($risultato->num_rows > 0) {
        while ($stat = $risultato->fetch_assoc()) {
            $status->aggiungiStatusOrdine(new StatusOrdine($stat["id"], $stat["status_ordine"]));
        }
    }
    return $status;
}
function getOrdini($id_utente)
{
    global $conn;
    $ordini = new OrdineCollection();
    $query = "SELECT * FROM ordine";
    if ($id_utente != null) {
        $query = "SELECT * FROM ordine WHERE id_utente = $id_utente";
    }
    $risultato = $conn->query($query);
    if ($risultato->num_rows > 0) {
        while ($ord = $risultato->fetch_assoc()) {
            $ordini->aggiungiOrdine(new Ordine($ord["id"], $ord["id_utente"], $ord["id_status"], $ord["costo_consegna"], $ord["data_ordine"], $ord["id_indirizzo"]));
        }
    }
    return $ordini;
}
function getDettagliOrdine($id_ordine)
{
    global $conn;
    $dettaglioOrdini = new DettaglioOrdineCollection();
    $query = "SELECT * FROM dettaglio_ordine INNER JOIN ordine ON dettaglio_ordine.id_ordine = ordine.id";
    if ($id_ordine != null) {
        $query = "SELECT * FROM dettaglio_ordine INNER JOIN ordine ON dettaglio_ordine.id_ordine = ordine.id WHERE id_ordine = $id_ordine";
    }
    $risultato = $conn->query($query);
    if ($risultato->num_rows > 0) {
        while ($dett = $risultato->fetch_assoc()) {
            $dettaglioOrdini->aggiungiDettaglioOrdineProdotto(new DettaglioOrdine($dett["id"], $dett["id_prodotto"], $dett["quantita_prodotto"], $dett["id_ordine"]));
        }
    }
    return $dettaglioOrdini;
}
function getCarrello($id_utente)
{
    global $conn;
    $query = "SELECT * FROM carrello WHERE id_utente = $id_utente";
    $risultato = $conn->query($query);
    if ($risultato->num_rows > 0) {
        while ($car = $risultato->fetch_assoc()) {
            $carrello = new Carrello($car["id"], $car["id_utente"]);
            return $carrello;
        }
    }
}
function getDettaglioCarrello($id_utente)
{
    global $conn;
    $dettaglioCarrello = new DettaglioCarrelloCollection();
    $query = "SELECT * FROM dettaglio_carrello INNER JOIN carrello ON dettaglio_carrello.id_carrello = carrello.id WHERE carrello.id_utente = $id_utente";
    $risultato = $conn->query($query);
    if ($risultato->num_rows > 0) {
        while ($car = $risultato->fetch_assoc()) {
            $dettaglioCarrello->aggiungiDettaglioCarrello(new DettaglioCarrello($car["id"], $car["id_carrello"], $car["id_prodotto"], $car["quantita_prodotto"]));
        }
    }
    return $dettaglioCarrello;
}
function getIndirizzi($id_utente){
    global $conn;
    $indirizzi = new IndirizzoCollection();
    $query = "SELECT * FROM indirizzi WHERE id_utente = $id_utente";
    $risultato = $conn->query($query);
    if ($risultato->num_rows > 0) {
        while ($indirizzo = $risultato->fetch_assoc()) {
            $indirizzi->aggiungiIndirizzi(new Indirizzo($indirizzo["id"], $indirizzo["via"], $indirizzo["citta"], $indirizzo["stato"], $id_utente));
        }
    }
    return $indirizzi;
}
function getTotaleOrdine($id_ordine){
    global $conn;
    $query = "SELECT 
                SUM(prodotti.prezzo) AS tot
                FROM prodotti
                INNER JOIN dettaglio_ordine ON prodotti.id = dettaglio_ordine.id_prodotto
                INNER JOIN ordine ON dettaglio_ordine.id_ordine = ordine.id
                WHERE ordine.id = $id_ordine;";

    $risultato = $conn->query($query);
    if ($risultato->num_rows > 0) {
        $totale = $risultato->fetch_assoc()["tot"];
    }
    return $totale;
}
function getIndirizzoOrdine($id_ordine){
    global $conn;
    $query = "SELECT * FROM indirizzi INNER JOIN ordine ON indirizzi.id =  ordine.id_indirizzo WHERE ordine.id = $id_ordine;";

    $risultato = $conn->query($query);
    if ($risultato->num_rows > 0) {
        while ($i = $risultato->fetch_assoc()) {
            $indirizzo = new Indirizzo($i["id"], $i["via"], $i["citta"], $i["stato"], $i["id_utente"]);
        }
    }
    return $indirizzo;
}
function getStatusOrdine($id_ordine){
    global $conn;
    $query = "SELECT status_ordine.status_ordine AS stato
                FROM status_ordine
                INNER JOIN ordine ON status_ordine.id = ordine.id_status WHERE ordine.id = $id_ordine;";

    $risultato = $conn->query($query);
    if ($risultato->num_rows > 0) {
        return $risultato->fetch_assoc()["stato"];
    }
}
function getProdottiOrdine($id_ordine){
    global $conn;
    $prodotti = new ProdottoCollection();
    $query = "SELECT prodotti.id, nome, descrizione, prezzo, id_categoria, prodotti.id_prodotto FROM prodotti
                INNER JOIN dettaglio_ordine ON prodotti.id = dettaglio_ordine.id_prodotto
                INNER JOIN ordine ON dettaglio_ordine.id_ordine = ordine.id
                WHERE ordine.id = $id_ordine";

    $risultato = $conn->query($query);
    if ($risultato->num_rows > 0) {
        while ($prod = $risultato->fetch_assoc()) {
            //echo $prod["id"];
            $prodotti->aggiungiProdotto(new Prodotti($prod["id"], $prod["nome"], $prod["descrizione"], $prod["prezzo"], $prod["id_categoria"], $prod["id_prodotto"]));
        }
    }
    //exit();
    return $prodotti->getProdotti();
}
function getUtenti(){
    global $conn;
    $utenti = new UtenteCollection();
    $query = "SELECT * FROM utente";

    $risultato = $conn->query($query);
    if ($risultato->num_rows > 0) {
        while ($ut = $risultato->fetch_assoc()) {
            //echo $ut["id"];
            $utenti->aggiungiUtente(new Utente($ut["id"], $ut["nome"], $ut["cognome"], $ut["id_ruolo"]));
        }
    }
    //exit();
    return $utenti;
}
function getRuoli(){
    global $conn;
    $ruoli = new RuoloCollection();
    $query = "SELECT * FROM ruolo";

    $risultato = $conn->query($query);
    if ($risultato->num_rows > 0) {
        while ($r = $risultato->fetch_assoc()) {
            //echo $r["id"];
            $ruoli->aggiungiRuolo(new Ruolo($r["id"], $r["ruolo"]));
        }
    }
    //exit();
    return $ruoli;
}
function getRuoloUtente($id){
    global $conn;
    $query = "SELECT * FROM ruolo WHERE id = $id";
    $risultato = $conn->query($query);
    if ($risultato->num_rows > 0) {
        return $risultato->fetch_assoc()["ruolo"];
    }
}
// $conn->close();
?>