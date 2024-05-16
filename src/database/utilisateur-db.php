<?php
require_once '../base.php';
require_once BASE_PROJET .
    '/src/config/db-config.php';

function pdologin(){
    $pdo = getConnexion();
    $requete_films = $pdo->prepare("SELECT * FROM utilisateur");
    $requete_films->execute();
    $logins = $requete_films->fetchAll(PDO::FETCH_ASSOC);
    return $logins;
}


?>