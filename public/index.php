<?php
session_start();

if (isset($_SESSION["utilisateur"])) {
    $ps1 = $_SESSION["utilisateur"]["pseudo"];
}else{
    $ps1=Null;
}

require_once '../base.php';

require_once BASE_PROJET .
    '/src/database/pdo-function.php';

$films = pdoindex();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/test.css" rel="stylesheet">

    <title>LPS - Accueil</title>
</head>

<body class="cursor">

<?php
require_once BASE_PROJET .
    '/src/_partials/header.php';
?>



<div class="jumbotron text-center bg-purple my-4 mt-5 mb-5">
    <h1 class="display-4">Hey <span class="text-primary">
            <?php
            if ($ps1){
                echo $ps1;
            }else{
                echo "jeune assoifé";
            }

            ?>
        </span> bienvenue dans la cave du <span class="text-primary">PETIT SIO</span></h1>
    <img src="./assets/images/LPSGIF3.gif" alt="Logo MyDriveMovie" width="500" height="500"
         class="d-inline-block align-top mt-5">
    <p class="lead mb-5">La fraîcheur confectionné par les meilleurs !</p>
    <a class="btn btn-primary btn-lg" href="/liste-film.php" role="button">Parcourir la liste des boissons</a>
</div>


<hr class="my-4 opacity-75 container">

<div class="container">
    <h1 class="mb-5 mx-auto text-center display-5">Nos nouvelles <span class="text-primary">boissons fraîches !</span></h1>
    <div id="carouselFilms" class="carousel container w-75" data-bs-ride="carousel">
        <div class="carousel-inner container">
            <?php foreach ($films as $index => $film) : ?>
                <div class="carousel-item <?= ($index === 0) ? 'active' : '' ?>">
                    <img src="./assets/images/LPSGIF2.gif" class="d-block w-50 container shadow" alt="Image du film">
                </div>
            <?php endforeach; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselFilms" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselFilms" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

</div>

<?php
require_once BASE_PROJET .
    '/src/_partials/footer.php'
?>

<div>
    <h1 class="opacity-0">0</h1>
</div>


<script src="../assets/js/bootstrap.bundle.min.js"></script>



</body>
</html>
