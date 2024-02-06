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
        <main>
            <form action="../controller/gestioneProfilo.php" method="post">
                <div class="container marketing">
                    <div style="text-align: center"><h1>Profilo</h1></div>
                    <hr class='featurette-divider'>
                    <div class="container">
                        <div class="row g-2 m-2">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="nome" name="nome">
                                    <label for="floatingInputGrid">Nome</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="cognome" name="cognome">
                                    <label for="floatingInputGrid">Cognome</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 m-2">
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Nome Utente" name="nome_utente">
                                    <label for="floatingInputGrid">Nome Utente</label>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="floatingInputGrid" placeholder="Password" name="password">
                                    <label for="floatingInputGrid">Password</label>
                                </div>
                            </div>
                        </div>
                        <div class="row g-2 m-2">
                            <button class="btn btn-primary">Modifica</button>
                        </div>
                    </div>
                    <hr class='featurette-divider'>
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                        <div class="card m-2">
                            <div class="card-body">
                                <a data-bs-toggle='modal' data-bs-target='#exampleModal'>
                                    <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 7.8v8.4M7.8 12h8.4m4.8 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                        <?php 
                            $id_utente = $_SESSION["ID_UTENTE"];
                            $indirizzi = selezionaIndirizzi($id_utente);
                            for ($i=0; $i < count($indirizzi); $i++) {
                                $id_indirizzo =  $indirizzi[$i]->getId();
                                $via = $indirizzi[$i]->getVia();
                                $citta = $indirizzi[$i]->getCitta();
                                $stato = $indirizzi[$i]->getStato();
                                echo    "<div class='card m-2 p-0'>
                                            <div class='card-header'>
                                                <span>Indirizzo #$id_indirizzo</span>
                                            </div>
                                            <div class='card-body'>
                                                <p>$via</p>
                                                <p>$citta</p>
                                                <p>$stato</p>
                                            </div>
                                            <div class='card-footer'>
                                                <a href=''>Modifica Indirizzo</a>
                                            </div>
                                        </div>";
                            }
                        ?>
                    </div>
                </div>
            </form>
        </main>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <button type="submit" class="btn btn-primary">Aggiungi</button>
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