<?php

session_start();

if (isset($_SESSION["utilisateur"])) {
    $ps1 = $_SESSION["utilisateur"]["id"];
}else{
    $ps1=Null;
}

// Connexion à la base de données
require_once '../base.php';
require_once BASE_PROJET .
    '/src/config/db-config.php';

require_once BASE_PROJET .
    '/src/fonction/fonction.php';

$id_film = isset($_GET['id_film']) ? $_GET['id_film'] : null;
if (!$id_film) {
    // Gestion d'une absence d'ID (redirection côté client)
    echo "<script>alert('ID du film non défini.');</script>";
    echo "<script>window.location.replace('index.php');</script>";
    exit; // Assurez-vous de terminer le script après la redirection
}

$id_user=$ps1;


if (2 == 2) {
    $idf1 = $ps1;
    $idf3 = "En cours de traitement";

    $pdo = getConnexion();

    $query = "INSERT INTO commande (id_user, statut_cmd) VALUES (?, ?)";
    $stmt = $pdo->prepare($query);

    // Liez les paramètres à la requête
    $stmt->bindParam(1, $ps1);
    $stmt->bindParam(2, $idf3);

    // Exécutez la requête
    try {
        $stmt->execute();
        echo "<script>alert('La boisson est dans le panier !');</script>";
        header("Location: ../detail-film.php?id_film=$iddfilm"); // Redirection
        exit();
    } catch (PDOException $e) {
        die("Erreur lors de l'insertion dans la base de données : " . $e->getMessage());
    }
}
