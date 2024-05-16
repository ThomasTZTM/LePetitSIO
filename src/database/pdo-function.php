<?php
require_once '../base.php';
require_once BASE_PROJET .
    '/src/config/db-config.php';

function pdoindex(){
    $pdo = getConnexion();
    $requete_films = $pdo->prepare("SELECT * FROM film");
    $requete_films->execute();
    $films = $requete_films->fetchAll(PDO::FETCH_ASSOC);
    return $films;
}


?>


