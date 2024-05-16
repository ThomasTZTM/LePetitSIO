<?php
// supprimer_film.php


session_start();

if (isset($_SESSION["utilisateur"])) {
    $ps1 = $_SESSION["utilisateur"]["id"];
} else {
    $ps1 = Null;
    header('Location: index.php');
}


// Connexion à la base de données
require_once '../base.php';
require_once BASE_PROJET .
    '/src/config/db-config.php';

require_once BASE_PROJET .
    '/src/fonction/fonction.php';



$idFilm = isset($_GET['id_film']) ? $_GET['id_film'] : null;

//echo " ID FILM - $idFilm - ID USER - $ps1 //";

if (!$idFilm) {
    // Gestion d'une absence d'ID (redirection côté client)
    echo "<script>alert('ID du de la boisson non trouver.');</script>";
    echo "<script>window.location.replace('ajout_film.php');</script>";
    exit; // Assurez-vous de terminer le script après la redirection
}

$pdo = getConnexion();

$stmt = $pdo->prepare("DELETE FROM panier WHERE id_film = :id_film AND id_utilisateur = :id_utilisateur");
$stmt->bindParam(':id_film', $idFilm, PDO::PARAM_INT);
$stmt->bindParam(':id_utilisateur', $ps1, PDO::PARAM_INT);

if ($stmt->execute()) {
    // Redirection vers la page précédente ou une page spécifique
    echo "POSITION 2";
    header('Location: ajout_film.php');
    exit;
}


?>

