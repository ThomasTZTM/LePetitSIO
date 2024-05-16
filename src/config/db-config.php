<?php

// Définir les informations de connexion

const DB_HOST = "localhost:3306";
const DB_NAME = "db_kla";
const DB_USER = "root";
const DB_PASSWORD = "";


function getConnexion():PDO
{
    $pdo = new PDO(
        'mysql:host='.DB_HOST.';dbname='.DB_NAME.';charset=utf8',
        DB_USER,DB_PASSWORD
    );
    // Activer les erreurs PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return $pdo;
}


try {
    // Utiliser PDO pour créer une connexion à la db
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASSWORD);

    // Activer les erreurs PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch (PDOException $e) {
    // En cas d'erreur, afficher un message
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}