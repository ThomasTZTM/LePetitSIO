<?php
require_once '../base.php';
require_once BASE_PROJET .
    '/src/config/db-config.php';

function film_utilisateur($id){
    $pdo = getConnexion();
    $requete_films = $pdo->prepare("SELECT * FROM film WHERE id_utilisateur = $id;");
    $requete_films->execute();
    $films = $requete_films->fetchAll(PDO::FETCH_ASSOC);
    return $films;
}


?>


