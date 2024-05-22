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
    $requete_films = $pdo->prepare("SELECT * FROM commande WHERE id_user = :id_utilisateur");
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
    <title>LPS - Historique des commandes</title>
</head>

<?php
require_once BASE_PROJET .
    '/src/_partials/header.php';
?>

<body class="">
<section class="container mt-5">

    <div class="container mt-5">
        <h1 class="mb-4">Historique des commandes</h1>
        <?php if (count($films) > 0) { ?>
            <table class="table">
                <thead>
                <tr class="text-danger">
                    <th>ID de la commande</th>
                    <th>Montant total</th>
                    <th>Date de passage de la commande</th>
                    <th>Statut de la commande</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($films as $commande) { ?>
                    <tr>
                        <td><?php
                            echo $commande["id_cmd"]; ?></td>
                        <td><?php echo $commande['montant']; ?> €</td>
                        <td><?php echo $commande['date']; ?></td>
                        <td><?php echo $commande['statut_cmd']." "; ?><i class="bi bi-hourglass-split"></i></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p>Aucune commande trouvée.</p>
        <?php } ?>
    </div>




</section>

<?php
require_once BASE_PROJET .
    '/src/_partials/footer.php'
?>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<?php endif; ?>

