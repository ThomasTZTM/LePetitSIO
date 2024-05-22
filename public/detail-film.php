<?php
session_start();

if (isset($_SESSION["utilisateur"])) {
    $ps1 = $_SESSION["utilisateur"]["id"];
}else{
    $ps1=Null;
}

$lescommentaires = [];

// Connexion à la base de données
require_once '../base.php';
require_once BASE_PROJET .
    '/src/config/db-config.php';

require_once BASE_PROJET .
    '/src/fonction/fonction.php';

// Récupération des détails du film à partir de l'ID
$id_film = isset($_GET['id_film']) ? $_GET['id_film'] : null;

if (!$id_film) {
    // Gestion d'une absence d'ID (redirection côté client)
    echo "<script>alert('ID du film non défini.');</script>";
    echo "<script>window.location.replace('index.php');</script>";
    exit; // Assurez-vous de terminer le script après la redirection
}

// Récupération des détails du film avec l'ID spécifié
try {
    $requete_detail_film = $pdo->prepare("SELECT * FROM film WHERE id_film = :id_film");
    $requete_detail_film->bindParam(':id_film', $id_film);
    $requete_detail_film->execute();
    $detail_film = $requete_detail_film->fetch(PDO::FETCH_ASSOC);


    if (!$detail_film) {
        //echo "<script>alert('Aucun détail trouvé pour l\'ID du film : $id_film.');</script>";
        echo "<script>window.location.replace('erreur.php');</script>";
        exit;
    }else{
        $requete_detail_film_idpseudo = $pdo->prepare("SELECT pseudo_utilisateur FROM utilisateur WHERE id_utilisateur = $detail_film[id_utilisateur]");
        $requete_detail_film_idpseudo ->execute();
        $detail_film_idpseudo = $requete_detail_film_idpseudo->fetch(PDO::FETCH_ASSOC);

        $requete_commentaire = $pdo->prepare("SELECT * FROM commentaire WHERE id_film = $id_film");
        $requete_commentaire ->execute();
        $les_commentaires = $requete_commentaire->fetchAll(PDO::FETCH_ASSOC);

    }



} catch (PDOException $e) {
    die("Erreur PDO : " . $e->getMessage());
}



$qqt = 1;



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <title>LPS - <?=$detail_film["titre_film"]?></title>
</head>

<body class="">

<?php
require_once BASE_PROJET .
    '/src/_partials/header.php'
?>

<div class="container my-4 mt-5">
    <div class="row mt-5">
        <div class="col-md-4">
            <img src="<?= $detail_film["image_film"] ?>" class="img-fluid rounded" alt="Image du film">
        </div>
        <div class="col-md-8">
            <div class="mt-4">
                <h3><?= $detail_film["titre_film"] ?></h3>
                <p class="lead"><?= $detail_film["resume_film"] ?></p>
                <p>
                    <span class="badge text-bg-success">
                    PRIX : </span> <?= $detail_film["duree_film"] ?>€
                </p>



                <p><span class="badge text-bg-danger">

                        PRODUIT UTILISER :</span> Fruit pressé origine FRANCE
                </p>



                <?php if ($ps1) : ?>
                    <div class="mt-5 w-100">
                        <a href="ajout_panier.php?id_film=<?= $detail_film['id_film'] ?>" class="btn btn-primary mt-5"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-basket-fill" viewBox="0 0 16 16">
                                <path d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0z"/>
                            </svg> Ajouter au panier
                        </a>

                    </div>
                <?php endif; ?>


            </div>
        </div>
    </div>
</div>


<?php
require_once BASE_PROJET .
    '/src/_partials/footer.php'
?>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>

