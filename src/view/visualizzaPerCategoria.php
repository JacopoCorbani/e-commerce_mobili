<?php
    error_reporting(E_ALL & ~E_NOTICE);
    session_start();
    include '../controller/letturaDati.php';
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
        <title>Visualizza mobili per categoria </title>
        <style>
            .card {
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        .card img {
            flex-shrink: 0;
            max-height: 100%;
            object-fit: cover;
        }
        .card-body {
            margin-top: auto;
        }
        </style>
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

        <main>

            <div class="album py-5 bg-body-tertiary">
                <form action="dettaglioMobile.php" method="POST">
                    <div class="container">
        
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                            <?php 
                                $tuttiMobili = false;
                                $id_cat = "";
                                if(isset($_POST["categoria"]) && $_POST["categoria"] !== "null"){
                                    $id_cat = $_POST["categoria"];
                                }else{
                                    $tuttiMobili = true;
                                }
                                $listaProdotti = selezionaProdotti();
                                $listaImmagini = selezionaImmaginiProdotti();
                                //da modificare
                                for ($i=0; $i < count($listaProdotti); $i++) {
                                    $id = $listaProdotti[$i]->getId();
                                    $nome = $listaProdotti[$i]->getNome();
                                    $descrizione = $listaProdotti[$i]->getDescrizione();
                                    $prezzo = $listaProdotti[$i]->getPrezzo();
                                    if(($listaProdotti[$i]->getIdCategoria() == $id_cat || $tuttiMobili)  && $listaProdotti[$i]->getIdProdotto() == ""){
                                        $path = "";
                                        for ($j=0; $j < count($listaImmagini); $j++) { 
                                            if($listaImmagini[$j]->getId_prodotti() == $id){
                                                $path = $listaImmagini[$j]->getpath_immagine();
                                            }
                                        }

                                        echo    "<div class='col'>
                                                    <div class='card shadow-sm' style='position: relative;'>
                                                        <img src='../immagini/prodotti/$path' alt='immagine prodotto'>
                                                        <div class='card-body mt-auto' style='position: absolute; bottom: 0; width: 100%;'>
                                                            <p class='card-text'>
                                                                <span  class= 'bg-dark' style='padding: 5px; border-radius: 5px;'>
                                                                    $nome
                                                                </span>
                                                            </p>
                                                            <div class='d-flex justify-content-between align-items-center mt-auto'>
                                                                <button type='submit' class='btn btn-sm btn-outline-secondary btn-dark' name='mobile' value='$id'>Visualizza</button>
                                                                <small class='text-body-secondary'>
                                                                    <span  class= 'bg-dark' style='padding: 5px; border-radius: 5px;'>
                                                                        $prezzo €
                                                                    </span>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>";
                                    }
                                }
                            ?>
                        </div>
                    </div>
                </form>
            </div>

        </main>

        <footer class="text-body-secondary py-5">
            <div class="container">
                <p class="float-end mb-1">
                    <a href="#">
                        <button type='button' class='btn btn-sm btn-outline-primary'>Torna in alto</button>
                    </a>
                </p>
                <p class="mb-1">ecommerce CasaArredo &copy;</p>
            </div>
        </footer>
        <script>
            function aggiungiAlCarrello(id_mobile){
                //funzione ajax che aggiunge un mobile al carrello
            }
        </script>
    </body>
</html>