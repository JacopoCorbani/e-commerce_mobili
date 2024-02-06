<?php
    error_reporting(E_ALL & ~E_NOTICE);
    session_start();
    include '../controller/letturaDati.php';
    if(!isset($_SESSION["ID_UTENTE"])){
        header("Location: ./index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
        <title>Dettaglio Mobile</title>
    </head>

    <body>
        
        <header class="p-3 mb-3 border-bottom">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                        <li><a href="./index.php" class="nav-link px-2 link-body-emphasis">CasaArredo</a></li>
                        <li><a href="./visualizzaPerCategoria.php" class="nav-link px-2 link-body-emphasis">Tutti i mobili</a></li>
                    </ul>
                    <!-- da integrare nel condice per farlo funzionare -->
                    <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                        <input type="search" class="form-control" placeholder="Cerca mobile" aria-label="Search">
                    </form>
                    <div class="dropdown text-end">
                        <?php 
                            if(isset($_SESSION["RUOLO"])){
                                $nome = $_SESSION["NOME_COGNOME"];
                                echo    "<a href='#' class='d-block link-body-emphasis text-decoration-none dropdown-toggle' data-bs-toggle='dropdown' aria-expanded='false'>
                                            <img src='../immagini/user_image/user.jpg' alt='mdo' width='32' height='32' class='rounded-circle'>
                                            $nome
                                        </a>";
                                echo    "<ul class='dropdown-menu text-small'>
                                            <li><a class='dropdown-item' href='./visualizzaCarrello.php'>Carrello</a></li>
                                            <li><a class='dropdown-item' href='./visualizzaOrdini.php'>Ordini</a></li>
                                            <li><a class='dropdown-item' href='./profilo.php'>Profilo</a></li>";
                                if($_SESSION["RUOLO"] === "ADMIN"){
                                    echo "<li><hr class='dropdown-divider'></li>";
                                    echo "<li><a class='dropdown-item' href='#'>Sezione amministratore</a></li>";
                                }
                                echo        "<li><hr class='dropdown-divider'></li>
                                            <li><a class='dropdown-item' href='../controller/logout.php'>Esci</a></li>
                                        </ul>";
                            }else{
                                echo "<a href='./login.html'><button type='button' class='btn btn-sm btn-outline-primary'>Accedi</button></a>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </header>
        <!-- <img src="../immagini/user_image/user.jpg" alt=""> -->
        <main>
            
            <form action="../controller/gestioneCarrello.php" method="post">
                <div class="container marketing">
                    <div style="text-align: center"><h1>Ordini</h1></div>
                    <hr class='featurette-divider'>
                    <?php 
                        $id_utente = $_SESSION["ID_UTENTE"];
                        $ordini = selezionaOrdini($id_utente);
                        for ($i=0; $i < count($ordini); $i++) { 
                            $id_ordine = $ordini[$i]->getId();
                            $dettaglio = selezionaDettagliOrdini($id_ordine);
                            $totale = selezionaTotaleOrdine($id_ordine);
                            $data = $ordini[$i]->getDataOrdine();
                            //echo "data-> ".$data;
                            $indizzo = selezionaIndirizzoOrdine($id_ordine);
                            $via = $indizzo->getVia();
                            $citta = $indizzo->getCitta();
                            $stato = $indizzo->getStato();

                            echo "<div class='card mt-5'>
                                    <div class='card-header' style='display: flex; justify-content:space-between;'>
                                        <span>Ordine effettuato il: $data</span>
                                        <span>Totale $totale €</span>
                                        <span>Indirizzo: $via, $citta, $stato</span>
                                        <span>Ordine numero #$id_ordine</span>
                                    </div>";
                            
                            $listaProdotti = selezionaProdottiOrdine($id_ordine);
                            $listaImmagini = selezionaImmaginiProdotti();
                            for ($j=0; $j < count($listaProdotti); $j++) { 
                                $id_prodotto = $listaProdotti[$j]->getId();
                                //echo $id_prodotto;
                                $nome = $listaProdotti[$j]->getNome();
                                $prezzo = $listaProdotti[$j]->getPrezzo();
                                echo "<div class='card-body'>
                                        <div class='row featurette'>
                                            <div class='col-md-3'>";
                                            if($listaProdotti[$j]->getIdProdotto() == ""){
                                                for ($k=0; $k < count($listaImmagini); $k++) { 
                                                    if($listaImmagini[$k]->getId_prodotti() == $id_prodotto){
                                                        $path = $listaImmagini[$k]->getpath_immagine();
                                                        echo "<img src='../immagini/prodotti/$path' width='100' class='featurette-image img-fluid mx-auto'>";
                                                    }
                                                }
                                            }else{
                                                echo "<span>Accessorio</span>";
                                            }
                                echo       "</div>
                                            <div class='col-md-9'>
                                                <h4 class='featurette-heading fw-normal lh-1'>
                                                    $nome
                                                    <small class='d-block text-body-secondary'>$prezzo €</small>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>";
                            }
                            
                            $status = selezionaStatusOrdine($id_ordine);
                            echo "<div class='card-footer' style='display: flex; justify-content:space-between;'>
                                    <span>Stato ordine: $status</span>
                                    <form action='../controller/gestioneOrdine.php' method='post'>
                                        <button type='submit' class='btn btn-primary' name='annulla' value='$id_ordine'>Annulla ordine</button>
                                    </form>
                                  </div>
                              </div>";
                        }
                    ?>
                </div>
            </form>
        </main>
        <footer class="text-body-secondary py-5">
            <div class="container">
                <p class="mb-1">e-commerce CasaArredo &copy;</p>
            </div>
        </footer>
    </body>
</html>