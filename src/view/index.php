<?php
    error_reporting(E_ALL & ~E_NOTICE);
    session_start();
    include '../model/letturaDB/letturaDB.php';
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
        #item-1{
            background-image: url('../immagini/carosel/immaginehome.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }
        #item-2{
            background-image: url('../immagini/carosel/staging-casa-arredata-milano-disimpegno.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center center;
        }
        #item-3{
            background-image: url('../immagini/carosel/ALVIERO_slider.jpeg');
        }
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
                                        <li><a class='dropdown-item' href='#'>Carrello</a></li>
                                        <li><a class='dropdown-item' href='#'>Ordini</a></li>
                                        <li><a class='dropdown-item' href='#'>Profilo</a></li>";
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

        <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" id="item-1">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="none" />
                    </svg>
                    <div class="container">
                        <div class="carousel-caption text-start">
                            <h1 class="testo_carousel">Ecommerce Mobili</h1>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" id="item-2">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="none" />
                    </svg>
                    <div class="container">
                        <div class="carousel-caption">
                            <h1 class="testo_carousel" >Più compri meno spendi</h1>
                        </div>
                    </div>
                </div>
                <div class="carousel-item" id="item-3">
                    <svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false">
                        <rect width="100%" height="100%" fill="none" />
                    </svg>
                    <div class="container">
                        <div class="carousel-caption text-end">
                            <h1 class="testo_carousel">I saldi terminano Domenica</h1>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div style="text-align: center;">
            <h1>Seleziona la categoria</h1>
            
        </div>
        <div class="album py-5 bg-body-tertiary">
            <form action="visualizzaPerCategoria.php" method="POST">
                <div class="container">
    
                    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-3">
                        <?php 
                            
                            $listaCategorie = getCategorie()->getCategorie();
                            $immaginiCategorie = getImmagini_categorie()->getImmagini();
                            for ($i=0; $i < count($listaCategorie); $i++) {
                                $id = $listaCategorie[$i]->getId();
                                $cat = $listaCategorie[$i]->getCategoria();
                                for ($j=0; $j < count($immaginiCategorie); $j++) { 
                                    if($immaginiCategorie[$j]->getId_categoria() == $listaCategorie[$i]->getId()){
                                        $path = $immaginiCategorie[$j]->getpath_immagine();
                                        echo    "<div class='col'>
                                                    <div class='card shadow-sm' style='position: relative;'>
                                                        <img src='../immagini/categorie/$path' alt='immagine categoria'>
                                                        <div class='card-body mt-auto' style='position: absolute; bottom: 0; width: 100%;'>
                                                            <p class='card-text'>
                                                                <span class= 'bg-dark' style='padding: 5px; border-radius: 5px;'>
                                                                    $cat
                                                                </span>
                                                            </p>
                                                            <div class='d-flex justify-content-between align-items-center'>
                                                                <button type='submit' class='btn btn-sm btn-outline-secondary btn-dark' name='categoria' value='$id'>Seleziona</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>";
                                    }
                                }
                            }
                        ?>
                    </div>
                    <div style="text-align: center">
                        <button type='submit' class='btn btn-sm btn-outline-primary' name='categoria' value='null'>Visualizza tutti i mobili</button>
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

</body>

</html>