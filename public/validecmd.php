<?php
global $pdo;
session_start();
require_once '../base.php';

require_once BASE_PROJET . '/src/config/db-config.php';

require_once BASE_PROJET .
    '/src/database/pdo-function.php';

if (isset($_SESSION["utilisateur"])) {
    $ps1 = $_SESSION["utilisateur"]["id"];
}else{
    $ps1=Null;
    header(header: "Location: ../index.php");
}


$id_film = isset($_GET['montant']) ? $_GET['montant'] : null;

$requete_supp_panier = $pdo->prepare("DELETE FROM panier WHERE id_utilisateur = $ps1");
$requete_supp_panier ->execute();

$kk = rand(100000, 900000);


if (2 == 2) {
    $idf1 = $ps1;
    $idf3 = "En cours de traitement";
    $idf4 = "0";

    $pdo = getConnexion();

    $query = "INSERT INTO commande (id_user, statut_cmd, montant, date) VALUES (?, ?, ?, NOW())";
    $stmt = $pdo->prepare($query);

    // Liez les paramètres à la requête
    $stmt->bindParam(1, $ps1);
    $stmt->bindParam(2, $idf3);
    $stmt->bindParam(3, $id_film);





    // Exécutez la requête
    try {
        $stmt->execute();
    } catch (PDOException $e) {
        die("Erreur lors de l'insertion dans la base de données : " . $e->getMessage());
    }
}

// Liez les paramètres à la requête
$stmt->bindParam(1, $ps1);
$stmt->bindParam(2, $idf3);
$stmt->bindParam(3, $id_film);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    <title>LPS - Commander</title>
</head>

<body class="">

<?php
require_once BASE_PROJET .
    '/src/_partials/header.php'
?>

<hr class="my-4 opacity-75 container ">


<div class="jumbotron text-center bg-purple my-4 mt-5 mb-5">
    <h1 class="display-4">Commande validé</h1>


    <p class="">Statut de la commande :</p>
    <H3 class="text-danger mb-5">COMMANDE</H3>
    <img src="./assets/images/livraison-cheminement.png" class="d-block w-50 container shadow mt-5" alt="Image du film">
    <p class="mt-5">Temps restant :</p>
    <p class="text-danger mb-5">4 jours</p>

    <hr class="my-4 opacity-75 container ">

    <a href="historique.php" class="btn btn-primary stretched-link">Voir mes commandes passé</a>

</div>




<?php
require_once BASE_PROJET .
    '/src/_partials/footer.php'
?>

<script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>
