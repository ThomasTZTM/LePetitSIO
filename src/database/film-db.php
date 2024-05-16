<?php
require_once '../base.php';
require_once BASE_PROJET .
    '/src/config/db-config.php';

function pdodetailfilm(){
    $pdo = getConnexion();
    $requete_detail_film = $pdo->prepare("SELECT * FROM film WHERE id_film = :id_film");
    $requete_detail_film->bindParam(':id_film', $id_film);
    $requete_detail_film->execute();
    $detail_film = $requete_detail_film->fetch(PDO::FETCH_ASSOC);
    return $detail_film;
}


?>
