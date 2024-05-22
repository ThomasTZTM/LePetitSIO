<?php
global $pdo;
session_start();
require_once '../base.php';

require_once BASE_PROJET . '/src/config/db-config.php';



if (isset($_SESSION["utilisateur"])) {
    $ps1 = $_SESSION["utilisateur"]["id"];
}else{
    $ps1=Null;
}

require_once BASE_PROJET .
    '/src/database/pdo-function.php';

$id_film = isset($_GET['montant']) ? $_GET['montant'] : null;

if (!$id_film) {
    // Gestion d'une absence d'ID (redirection côté client)
    echo "<script>alert('ID du film non défini.');</script>";
    echo "<script>window.location.replace('index.php');</script>";
    exit; // Assurez-vous de terminer le script après la redirection
}


?>

<?php if (!$ps1) : ?>
    <?php
    header(header: "Location: ../index.php");
    exit();
    ?>
<?php endif; ?>




<?php if ($ps1) :
    require_once BASE_PROJET .
        '/src/database/pdo-function.php';
    require_once BASE_PROJET .
        '/src/database/film-par-utilisateur.php';

    $films = film_utilisateur($ps1);?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <title>LPS - Formulaire de Commande</title>
    </head>

    <body class="">

    <?php
    require_once BASE_PROJET .
        '/src/_partials/header.php'
    ?>


    <div class="jumbotron text-center bg-purple my-4 mt-5 mb-5">
        <h1 class="display-4">Informations de commandes</h1>
    </div>


    <section class="container">
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Code postal :</span>
            <input type="text" class="form-control" placeholder="25000..." aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Ville / Village :</span>
            <input type="text" class="form-control" placeholder="Besançon..." aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Numéro de rue :</span>
            <input type="text" class="form-control" placeholder="Rue de aubry..." aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Nom sur la boite à lettre :</span>
            <input type="text" class="form-control" placeholder="Jean Baptiste Aubry..." aria-label="Username" aria-describedby="basic-addon1">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">Numéro de téléphone :</span>
            <input type="text" class="form-control" placeholder="0789654122..." aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <a class="btn btn-primary" href="validecmd.php?montant=<?= $id_film ?>" role="button">Commander</a>

    </section>



    <section class="container">
        <div class="container">
            <a class="nav-link text-primary mt-5 mb-5 text-center" href="/ajout_film.php">Voir mon panier</a>
        </div>
    </section>


    <?php
    require_once BASE_PROJET .
        '/src/_partials/footer.php'
    ?>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>

<?php
require_once BASE_PROJET .
    '/src/_partials/footer.php'
?>

<?php endif; ?>

