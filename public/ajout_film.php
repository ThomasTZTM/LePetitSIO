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


$valeur=0;

?>

<?php

    function pdoindex($ps2){
        $pdo = getConnexion();
        $requete_films = $pdo->prepare("SELECT * FROM panier WHERE id_utilisateur = :id_utilisateur");
        $requete_films->bindParam(':id_utilisateur', $ps2);
        $requete_films->execute();
        $films = $requete_films->fetchAll(PDO::FETCH_ASSOC);
        return $films;
    }

    $films = pdoindex($ps1);

?>

<?php if (!$ps1) : ?>
    <?php
    header(header: "Location: ../index.php");
    exit();
    ?>
<?php endif; ?>




<?php if ($ps1) : ?>
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <title>LPS - Panier</title>
</head>

<?php
require_once BASE_PROJET .
    '/src/_partials/header.php';
?>

<body class="">
    <section class="container mt-5">
        <h1 class="mb-5 text-center"><span> Mon panier <span class="text-primary"></span></h1>

        <hr class="my-4 opacity-75 container">

        <div class="container my-4">
            <div class="row">
                <?php foreach ($films as $film) : ?>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border border-2 border-primary">
                            <div class="card-body">
                                <h3 class="card-title"><?= $film["titre_film"] ?></h3>
                                <h5 class="text-primary">Prix : <?= $film["duree_film"] ?>€</h5>
                                <?php $valeur = $valeur+$film["duree_film"] ?>

                                <a href="supprimer_panier.php?id_film=<?= $film['id_film'] ?>" class="mt-2 bg-danger btn btn-danger stretched-link">Supprimer le produit du panier</a>

                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>


        <h1 class="mb-3 text-center"><span> Valeur du panier : <span class="text-primary"><?php echo $valeur ?>€</span></h1>
        <div class="text-center">
            <?php if ($valeur!=0) : ?>
                <a href="mes_films.php?montant=<?= $valeur ?>" class="btn btn-success text-center">Commander</a>
            <?php endif;?>
        </div>


        <section class="container">
            <div class="container">
                <a class="nav-link text-primary mt-5 text-center" href="/historique.php">Voir mes anciennes commandes</a>
            </div>
        </section>




    </section>

    <?php
    require_once BASE_PROJET .
        '/src/_partials/footer.php'
    ?>

    <script src="../assets/js/bootstrap.bundle.min.js"></script>

    <?php endif; ?>

