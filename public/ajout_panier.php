<?php

session_start();

if (isset($_SESSION["utilisateur"])) {
    $ps1 = $_SESSION["utilisateur"]["id"];
    echo "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA";
}else{
    $ps1=Null;
    echo "BBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBBB";
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

$iddfilm = $detail_film["id_film"];

if (2 == 2) {
    $idf1 = $detail_film["id_film"];
    $idf2 = $detail_film["titre_film"];
    $idf3 = $detail_film["duree_film"];
    $idf4 = $ps1;

    $pdo = getConnexion();

    $query = "INSERT INTO panier (id_film, titre_film, duree_film, id_utilisateur) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);

    // Liez les paramètres à la requête
    $stmt->bindParam(1, $idf1);
    $stmt->bindParam(2, $idf2);
    $stmt->bindParam(3, $idf3);
    $stmt->bindParam(4, $idf4);

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
?>

?>

?>



