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

        <title>MyDriveMovie.com - Mes Films</title>
    </head>

    <body class="">

    <?php
    require_once BASE_PROJET .
        '/src/_partials/header.php'
    ?>


    <div class="jumbotron text-center bg-purple my-4 mt-5 mb-5">
        <h1 class="display-4">Mes anciennes commandes</h1>
    </div>



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

