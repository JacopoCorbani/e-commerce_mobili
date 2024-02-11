<?php
    error_reporting(E_ALL & ~E_NOTICE);
    session_start();
    include '../controller/letturaDati.php';
    if(!$_SESSION["RUOLO"] === "ADMIN"){
        header('Location: ./visualizzaPerCategoria.php');
        exit();
    }
    //var_dump(getCategorie()->getCategorie());
?>
<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.3/assets/css/docs.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Ecommerce Mobili</title>
    <link href="../css/carousel.css" rel="stylesheet">

    <style>
        body{
            padding: 0;
        }
        .testo_carousel{
            color: white;
        }
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
    </style>
</head>

<body>

    <header class="p-3 mb-3 border-bottom">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="" class="nav-link px-2 link-body-emphasis">CasaArredo</a></li>
                    <li><a href="./visualizzaPerCategoria.php" class="nav-link px-2 link-body-emphasis">Tutti i mobili</a></li>
                </ul>
                <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="form-control" placeholder="Cerca categoria" aria-label="Search">
                </form> -->
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
    <header class="d-flex justify-content-center p-0">
        <ul class="nav nav-pills">
            <li class="nav-item" onclick="cambiaScheda(0)"><a href="#Prodotti" class="nav-link">Prodotti</a></li>
            <li class="nav-item" onclick="cambiaScheda(1)"><a href="#Categorie" class="nav-link">Categorie</a></li>
            <li class="nav-item" onclick="cambiaScheda(2)"><a href="#Utenti" class="nav-link">Utenti</a></li>
        </ul>
    </header>
    <script>
        function cambiaScheda(n){
            const divp = document.getElementById('divProdotti')
            const divc = document.getElementById('divCategorie')
            const divu = document.getElementById('divUtenti')

            switch (n) {
                case 0:
                    divp.style.display = 'block'
                    divc.style.display = 'none'
                    divu.style.display = 'none'
                    break;
                case 1:
                    divp.style.display = 'none'
                    divc.style.display = 'block'
                    divu.style.display = 'none'
                    break;
                case 2:
                    divp.style.display = 'none'
                    divc.style.display = 'none'
                    divu.style.display = 'block'
                    break;
            }
        }
    </script>
    <main class="container marketing">
        <div id="divProdotti">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Prezzo</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">ID Prodotto</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $listaProdotti = selezionaProdotti();
                        $listaCategorie = selezionaCategorie();
                        foreach ($listaProdotti as $prod) {
                            $id = $prod->getId();
                            $nome = $prod->getNome();
                            $descrizione = $prod->getDescrizione() ?? '';
                            $prezzo = $prod->getPrezzo();
                            $id_categoria = $prod->getIdCategoria() ?? '';

                            $categoria = "Accessiorio";
                            foreach ($listaCategorie as $cat) {
                                if($cat->getId() == $id_categoria){
                                    $categoria = $cat->getCategoria();
                                }
                            }
                            $id_prod = $prod->getIdProdotto() ?? '';
                            $dati = array(
                                'id' => $id,
                                'nome' => $nome,
                                'descrizione' => $descrizione,
                                'prezzo' => $prezzo,
                                'id_categoria' => $id_categoria,
                                'id_prod' => $id_prod
                            );
                            $datiJson = json_encode($dati);
                            echo    "<tr>
                                        <th scope='row'>$id</th>
                                        <td>$nome</td>
                                        <td>$prezzo €</td>
                                        <td>$categoria</td>
                                        <td>$id_prod</td>
                                        <td>
                                            <button type='button' class='btn btn-dark' data-bs-toggle='modal' data-bs-target='#modalModifica' onclick='inserisciDatiModifica($datiJson)'>Modifica</button>
                                            <button type='button' class='btn btn-dark' data-bs-toggle='modal' data-bs-target='#modalElimina' onclick='inserisciDatiElimina($id)'>Elimina</button>
                                        </td>
                                    </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div id="divCategorie" style="display: none">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $listaCategorie = selezionaCategorie();
                        foreach ($listaCategorie as $cat) {
                            $id = $cat->getId();
                            $categoria = $cat->getCategoria();

                            $dati = array(
                                'id' => $id,
                                'cat' => $categoria
                            );
                            $datiJson = json_encode($dati);
                            echo    "<tr>
                                        <th scope='row'>$id</th>
                                        <td>$categoria</td>
                                        <td>
                                            <button type='button' class='btn btn-dark' data-bs-toggle='modal' data-bs-target='#modalModificaCat' onclick='inserisciDatiModificaCat($datiJson)'>Modifica</button>
                                            <button type='button' class='btn btn-dark' data-bs-toggle='modal' data-bs-target='#modalEliminaCat' onclick='inserisciDatiEliminaCat($id)'>Elimina</button>
                                        </td>
                                    </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
        </div>
        <div id="divUtenti" style="display: none">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">Cognome</th>
                        <th scope="col">Ruolo</th>
                        <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $listaUtenti = selezionaUtenti();
                        foreach ($listaUtenti as $ut) {
                            $id = $ut->getId();
                            $nome = $ut->getNome();
                            $cognome = $ut->getCognome();
                            $id_ruolo = $ut->getIdRuolo();

                            $dati = array(
                                'id' => $id,
                                'nome' => $nome,
                                'cognome' => $cognome,
                                'id_ruolo' => $id_ruolo
                            );
                            $datiJson = json_encode($dati);
                            $ruolo = selezionaRuoloUtente($id_ruolo);
                            echo    "<tr>
                                        <th scope='row'>$id</th>
                                        <td>$nome</td>
                                        <td>$cognome</td>
                                        <td>$ruolo</td>
                                        <td>
                                            <button type='button' class='btn btn-dark' data-bs-toggle='modal' data-bs-target='#modalModificaUtente' onclick='inserisciDatiModificaUtente($datiJson)'>Modifica</button>
                                        </td>
                                    </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <script>
        function inserisciDatiModificaUtente(utente){
            console.log(utente)
            document.getElementById('inputIdUtente').value = utente.id
            document.getElementById('inputNomeUtente').value = utente.nome
            document.getElementById('inputCognomeUtente').value = utente.cognome
            document.getElementById('selectRuolo').value = utente.id_ruolo
        }
        function inserisciDatiModificaCat(categoria) {
            document.getElementById('inputIdCat').value = categoria.id
            document.getElementById('inputCat').value = categoria.cat
        }
        function inserisciDatiEliminaCat(id){
            console.log(id);
            document.getElementById('inputIdEliminaCat').value = id;
        }

        function inserisciDatiModifica(prodotto){
            console.log(prodotto);
            document.getElementById('inputId').value = prodotto.id;
            document.getElementById('inputNome').value = prodotto.nome;
            document.getElementById('inputDescrizione').value = prodotto.descrizione;
            document.getElementById('inputPrezzo').value = prodotto.prezzo;
            document.getElementById('selectCategoria').value = prodotto.id_categoria;
            document.getElementById('selectProdotto').value = prodotto.id_prod;

        }
        function inserisciDatiElimina(id){
            console.log(id);
            document.getElementById('inputIdElimina').value = id;
        }
    </script>
    <!-- MODAL PER I PRODOTTI -->
    <div class="modal fade" id="modalModifica" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modifica Prodotto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../controller/gestionePaginaAdmin.php" method="post">
                    <input id="inputId" name="id" style="display: none">
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="inputNome" placeholder="nome" name="nome">
                            <label for="inputNome">Nome</label>
                        </div>
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="descrizione" id="inputDescrizione" name="descrizione"></textarea>
                            <label for="inputDescrizione">Descrizione</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="inputPrezzo" placeholder="prezzo" name="prezzo">
                            <label for="inputPrezzo">Prezzo</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select form-select-sm" name="categoria" id="selectCategoria">
                                <option selected value="">Seleziona la categoria</option>
                                <?php 
                                    $listaCategorie = selezionaCategorie();
                                    foreach ($listaCategorie as $cat) {
                                        $id_cat = $cat->getId();
                                        $categoria = $cat->getCategoria();;
                                        echo "<option value='$id_cat'>$categoria</option>";
                                    }
                                ?>
                            </select>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select form-select-sm" name="id_prodotto" id="selectProdotto">
                                <option selected value="">Seleziona il prodotto</option>
                                <?php 
                                    $listaProdotti = selezionaProdotti();
                                    foreach ($listaProdotti as $prod) {
                                        $id_prod = $prod->getId();
                                        $prodotto = $prod->getNome();
                                        if($prod->getIdProdotto() == ""){
                                            echo "<option value='$id_prod'>$prodotto</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Modifica</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <div class="modal fade" id="modalElimina" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Elimina prdotto</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../controller/gestionePaginaAdmin.php" method="post">
                <input id="inputIdElimina" name="idElimina" style="display: none">
                <div class="modal-body">
                    Sei sicuro di voler eliminare il prodotto?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-bs-target="#exampleModal" data-bs-toggle="modal">Elimina</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- MODAL PER LE CATEGORIE -->
    <div class="modal fade" id="modalModificaCat" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modifica Prodotto</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../controller/gestionePaginaAdmin.php" method="post">
                    <input id="inputIdCat" name="inputIdCat" style="display: none">
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="inputCat" placeholder="nome" name="inputCat">
                            <label for="inputNome">Nome</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Modifica</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalEliminaCat" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Elimina categoria</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="../controller/gestionePaginaAdmin.php" method="post">
                <input id="inputIdEliminaCat" name="idEliminaCat" style="display: none">
                <div class="modal-body">
                    Sei sicuro di voler eliminare la categoria?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" data-bs-target="#exampleModal" data-bs-toggle="modal">Elimina</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <!-- MODAL PER UTENTI -->
    <div class="modal fade" id="modalModificaUtente" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modifica Utente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="../controller/gestionePaginaAdmin.php" method="post">
                    <input id="inputIdUtente" name="inputIdUtente" style="display: none">
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="inputNomeUtente" placeholder="nome" name="inputNomeUtente">
                            <label for="inputNomeUtente">Nome</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="inputCognomeUtente" placeholder="cognome" name="inputCognomeUtente">
                            <label for="inputCognomeUtente">Cognome</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select form-select-sm" name="id_ruolo" id="selectRuolo">
                                <option selected value="">Seleziona il ruolo</option>
                                <?php 
                                    $listaRuoli = selezionaRuoli();
                                    foreach ($listaRuoli as $r) {
                                        $id_ruolo = $r->getId();
                                        $ruolo = $r->getRuolo();
                                        echo "<option value='$id_ruolo'>$ruolo</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Modifica</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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

</body>

</html>