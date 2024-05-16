<?php
session_start();
// Connexion à la base de données
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
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <title>LPS - Catalogue</title>
</head>

<body class="">

<?php
require_once BASE_PROJET .
    '/src/_partials/header.php'
?>

<hr class="my-4 opacity-75 container ">


<div class="jumbotron text-center bg-purple my-4 mt-5 mb-5">
    <h1 class="display-4">Catalogue de <span class="text-primary">boissons</span>  </h1>
</div>

<div class="container my-4">
    <div class="row">
        <?php foreach ($films as $film) : ?>
            <div class="col-md-4 mb-4">
                <div class="card h-100 border border-2 border-primary">
                    <img src="<?= $film["image_film"] ?>" class="card-img-top" alt="Image du film">
                    <div class="card-body">
                        <h5 class="card-title"><?= $film["titre_film"] ?></h5>
                        <h5 class="card-title text-danger"><?= $film["duree_film"] ?>€</h5>
                        <a href="detail-film.php?id_film=<?= $film['id_film'] ?>" class="btn btn-primary stretched-link">Voir le produit</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<?php
require_once BASE_PROJET .
    '/src/_partials/footer.php'
?>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
