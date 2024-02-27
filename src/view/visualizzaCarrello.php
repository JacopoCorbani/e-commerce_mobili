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
                                    echo "<li><a class='dropdown-item' href='./admin.php'>Sezione amministratore</a></li>";
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
                    <div style="text-align: center"><h1>Carrello</h1></div>
                    <hr class='featurette-divider'>
                    
                    <?php 
                        $id_utente = $_SESSION["ID_UTENTE"];
                        $listaProdotti = selezionaProdotti();
                        $listaImmagini = selezionaImmaginiProdotti();
                        $dettagliCarrello = selezionaDettagliCarrello($id_utente);
                        $totale = 0;
                        // var_dump($dettagliCarrello);
                        // var_dump($listaProdotti);
                        for ($i=0; $i < count($dettagliCarrello); $i++) { 
                            for ($j=0; $j < count($listaProdotti); $j++) { 
                                //echo $dettagliCarrello[$i]->getIdProdotto();
                                $id_rimuovere = array();
                                if(($dettagliCarrello[$i]->getIdProdotto() == $listaProdotti[$j]->getId()) && $listaProdotti[$j]->getIdProdotto() == NULL){
                                    $id = $listaProdotti[$j]->getId();
                                    $id_rimuovere[] = $id;
                                    $nome = $listaProdotti[$j]->getNome();
                                    $descrizione = $listaProdotti[$j]->getDescrizione();
                                    $prezzo = $listaProdotti[$j]->getPrezzo(); 
                                    $totale += $prezzo;
                                    $path = "";
                                    echo   "<div class='row featurette'>
                                            <div class='col-md-7 order-md-2'>
                                                <h2 class='featurette-heading fw-normal lh-1'>
                                                    $nome
                                                </h2>
                                                <p class='lead'>
                                                    $prezzo €
                                                </p>
                                                <p class='lead'>
                                                    <div class='d-flex flex-column flex-md-row gap-4 py-md-5 '>
                                                        <div class='list-group'>";
                                                        
                                                        
                                                for ($z=0; $z < count($dettagliCarrello); $z++) { 
                                                    for ($k=0; $k < count($listaProdotti); $k++) {
                                                        if(($listaProdotti[$k]->getIdProdotto() == $id) && ($dettagliCarrello[$z]->getIdProdotto() == $listaProdotti[$k]->getId())){
                                                            $id_accessorio = $listaProdotti[$k]->getId();
                                                            $id_rimuovere[] = $id_accessorio;
                                                            $nome = $listaProdotti[$k]->getNome();
                                                            $prezzo = $listaProdotti[$k]->getPrezzo(); 
                                                            echo "  <label class='list-group-item d-flex gap-2'>
                                                                        <span>
                                                                            $nome
                                                                            <small class='d-block text-body-secondary'>$prezzo €</small>
                                                                        </span>
                                                                    </label>";
                                                            $totale += $prezzo;
                                                        }
                                                    }
                                                }
                                                $str = "";
                                                foreach ($id_rimuovere as $ID) {
                                                    $str .= $ID.';';
                                                }
                                        echo   "        </div>
                                                    </div>
                                                </p>
                                                <p class='lead'>
                                                    <button type='submit' class='btn btn-sm btn-outline-secondary' name='rimuovere_mobile[]' value='$str'>Togli dal carrello</button>
                                                </p>
                                            </div>
                                            <div class='col-md-5 order-md-1'>";
                                for ($y=0; $y < count($listaImmagini); $y++) { 
                                    if($listaImmagini[$y]->getId_prodotti() == $id){
                                        $path = $listaImmagini[$y]->getpath_immagine();
                                        echo    "<img src='../immagini/prodotti/$path' width='300px' alt=''>";
                                    }
                                }
                                echo    "</div>
                                    </div>";
                                    echo "<hr class='featurette-divider'>";
                                }
                            }
                        }
                        echo "  <div style='text-align: center'>";
                                if($totale != 0){
                                    echo "<h1>Totale: $totale €</h1><button type='button' class='btn btn-lg btn-outline-primary' data-bs-toggle='modal' data-bs-target='#exampleModal'>Ordina</button>";
                                }else{
                                    echo "<h1>Il carrello è vuoto</h1><a href='./visualizzaPerCategoria.php'><button type='button' class='btn btn-lg btn-outline-primary'>Continua ad acquistare</button></a>";
                                }
                        echo "  </div>";
                    ?>

                </div>
            </form>
        </main>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Riepilogo Ordine</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="../controller/gestioneCarrello.php" method="post">
                        <div class="modal-body">
                            <label class='col-form-label'>Prodotti:</label>
                            <?php 
                                $str = "";
                                $id_utente = $_SESSION["ID_UTENTE"];
                                $listaProdotti = selezionaProdotti();
                                $dettagliCarrello = selezionaDettagliCarrello($id_utente);
                                $parziale = 0;
                                for ($i=0; $i < count($dettagliCarrello); $i++) { 
                                    for ($j=0; $j < count($listaProdotti); $j++) { 
                                        if(($dettagliCarrello[$i]->getIdProdotto() == $listaProdotti[$j]->getId())){
                                            if($listaProdotti[$j]->getIdProdotto() != NULL){
                                                $str = ">";
                                            }else{
                                                $str = "";
                                            }
                                            $id = $listaProdotti[$j]->getId();
                                            $nome = $listaProdotti[$j]->getNome();
                                            $prezzo = $listaProdotti[$j]->getPrezzo(); 
                                            $parziale += $prezzo;
                                            echo   "<div class='mb-3'>
                                                        <div style='display: flex; justify-content: space-between'>
                                                            <div>$str$nome</div>
                                                            <div>$prezzo €</div>
                                                        </div>
                                                    </div>";
                                        }
                                    }
                                }
                                $consegna = rand(0, 20);
                                $totale = $consegna + $parziale;
                                echo   "<div class='mb-3'>
                                            <div style='display: flex; justify-content: space-between'>
                                                <div>PARZIALE: </div>
                                                <div>$parziale €</div>
                                            </div>
                                            <div style='display: flex; justify-content: space-between'>
                                                <div>CONSEGNA: </div>
                                                <div>$consegna €</div>
                                                <input type='hidden' name='costo_consenga' value='$consegna'>
                                            </div>
                                            <div style='display: flex; justify-content: space-between'>
                                                <div>TOTALE: </div>
                                                <div>$totale €</div>
                                            </div>
                                        </div>";
                            ?>
                            <div class="input-group">
                                <select class="form-select form-select-sm" name="indirizzo">
                                    <option selected value="">Seleziona l'indirizzo</option>
                                    <?php 
                                        $indirizzi = selezionaIndirizzi($id_utente);
                                        foreach ($indirizzi as $indirizzo) {
                                            $id_indirizzo = $indirizzo->getId();
                                            $via = $indirizzo->getVia();
                                            $citta = $indirizzo->getCitta();
                                            $stato = $indirizzo->getStato();
                                            echo "<option value='$id_indirizzo'>$via, $citta, $stato</option>";
                                        }
                                    ?>
                                </select>
                                <button class="btn btn-outline-secondary" type="button" data-bs-target="#modelAgiungiOrdine" data-bs-toggle="modal">Aggiungi Indirizzo</button>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Ordina</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modelAgiungiOrdine" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Aggiungi Indirizzo</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="../controller/gestioneUtente.php" method="post">
                        
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Via" name="via">
                                <label for="floatingInput">Via</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Citta" name="citta">
                                <label for="floatingInput">citta</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="floatingInput" placeholder="Stato" name="stato">
                                <label for="floatingInput">Stato</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary" name="carrello" value="true">Aggiungi</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <footer class="text-body-secondary py-5">
            <div class="container">
                <p class="mb-1">e-commerce CasaArredo &copy;</p>
            </div>
        </footer>
    </body>
</html>