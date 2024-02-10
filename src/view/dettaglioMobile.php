<?php
    error_reporting(E_ALL & ~E_NOTICE);
    session_start();
    include '../controller/letturaDati.php';
    if(!isset($_POST["mobile"])){
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
                    <?php 
                        $id = $_POST["mobile"];
                        $listaProdotti = selezionaProdotti();
                        $listaImmagini = selezionaImmaginiProdotti();
                        for ($i=0; $i < count($listaProdotti); $i++) { 
                            if($listaProdotti[$i]->getId() == $id){
                                $nome = $listaProdotti[$i]->getNome();
                                $descrizione = $listaProdotti[$i]->getDescrizione();
                                $prezzo = $listaProdotti[$i]->getPrezzo(); 
                                $path = "";
                                echo   "<div class='row featurette'>
                                            <div class='col-md-7 order-md-2'>
                                                <h2 class='featurette-heading fw-normal lh-1'>
                                                    $nome
                                                </h2>
                                                <p class='lead'>
                                                    $descrizione
                                                </p>
                                                <p class='lead'>
                                                    $prezzo €
                                                </p>
                                                <p class='lead'>
                                                    <div class='d-flex flex-column flex-md-row gap-4 py-md-5 '>
                                                        <div class='list-group'>";
                                                        
                                                        
                                                    
                                                for ($i=0; $i < count($listaProdotti); $i++) {
                                                    if($listaProdotti[$i]->getIdProdotto() == $id){
                                                        $id_accessorio = $listaProdotti[$i]->getId();
                                                        $nome = $listaProdotti[$i]->getNome();
                                                        $prezzo = $listaProdotti[$i]->getPrezzo(); 
                                                        echo "  <label class='list-group-item d-flex gap-2'>
                                                                    <input class='form-check-input flex-shrink-0' type='checkbox' name='accessori[]' value='$id_accessorio'>
                                                                    <span>
                                                                        $nome
                                                                        <small class='d-block text-body-secondary'>$prezzo €</small>
                                                                    </span>
                                                                </label>";
                                                    }
                                                }
                                        echo   "        </div>
                                                    </div>
                                                </p>
                                                <p class='lead'>
                                                    <button type='submit' class='btn btn-sm btn-outline-secondary' name='id_mobile' value='$id'>Aggiungi al carrello</button>
                                                </p>
                                            </div>
                                            <div class='col-md-5 order-md-1'>";
                                for ($j=0; $j < count($listaImmagini); $j++) { 
                                    if($listaImmagini[$j]->getId_prodotti() == $id){
                                        $path = $listaImmagini[$j]->getpath_immagine();
                                        echo    "<img src='../immagini/prodotti/$path' width='500px' alt=''>";
                                    }
                                }
                                echo    "</div>
                                    </div>";
                                
                            }
                        }
                    ?>
                </div>
            </form>
        </main>

        <footer class="text-body-secondary py-5">
            <div class="container">
                <p class="mb-1">ecommerce CasaArredo &copy;</p>
            </div>
        </footer>
    </body>
</html>