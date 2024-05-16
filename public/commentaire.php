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
}

?>

<?php
$id_film = isset($_GET['id_film']) ? $_GET['id_film'] : null;

$erreurs = [];
$titre = "";
$note = "";
$resume = "";

$date=date('c');
$id_user=$ps1;
$id_films=$id_film;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    //formulaire a été soumis
    //Traiter les données du formulaire
    //Récupérer les valeur saisis par l'utilisateur
    //superglobal $post qui va etre un tablo assoc
    $titre = $_POST["titre"];
    $note = $_POST["note"];
    $resume = $_POST["resume"];

    //---------------------------------------------------------------------------------
    //---------------------------------------------------------------------------------
    //---------------------------------------------------------------------------------

    if (empty($titre)) {
        $erreurs['titre'] = "Le tire du commentaire est obligatoire";
    }if (empty($resume)) {
        $erreurs['resume'] = "Il est obligatoire de rédiger le commentaire";
    }

    //---------------------------------------------------------------------------------
    //---------------------------------------------------------------------------------
    //---------------------------------------------------------------------------------

    // Traiter les donnés
    if (empty($erreurs)) {
        $pdo = getConnexion();
        $query = "INSERT INTO commentaire (titre_com, avis_com, note_com, date_com, id_utilisateur, id_film) 
                  VALUES (:titre, :resume, :note, :date, :id_user, :id_film);";
        $stmt = $pdo->prepare($query);

        $stmt->bindParam(':titre', $titre);
        $stmt->bindParam(':note', $note);
        $stmt->bindParam(':resume', $resume);

        $stmt->bindParam(':date', $date);
        $stmt->bindParam(':id_user', $id_user);
        $stmt->bindParam(':id_film', $id_films);

        $stmt->execute();
        header(header: "Location: ../detail-film.php?id_film=$id_film");
        exit();
    }
}


if (!$id_film) {
    // Gestion d'une absence d'ID (redirection côté client)
    echo "<script>alert('ID du film non défini.');</script>";
    echo "<script>window.location.replace('index.php');</script>";
    exit; // Assurez-vous de terminer le script après la redirection
}

// Récupération des détails du film avec l'ID spécifié
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
    }

} catch (PDOException $e) {
    die("Erreur PDO : " . $e->getMessage());
}

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
    <title>MyDriveMovie.com - Formulaire de commentaire</title>
</head>
<?php
require_once BASE_PROJET .
    '/src/_partials/header.php';
?>
<body class="">
<section class="container">
    <h1 class="mb-5 text-center"><span> Ajouter un commentaire au film <span class="text-primary"> <?=$detail_film["titre_film"]?> </span> !</h1>

    <div class="mt-5 mb-5">
        <hr class="my-4 opacity-75 container ">
        <div>
            <div class="container">
                <div class="w-50 mx-auto shadow p-4 my-5">


                    <form action="" method="POST" novalidate>
                        <p class="text-center opacity-50"> * Champs obligatoires</p>

                        <div class="mb-3">
                            <label for="titre" class="form-label text-white">Titre du commentaire *</label>
                            <input
                                type="text"
                                class="form-control <?= isset($erreurs['titre']) ? "border border-2 border-danger" : "" ?>"
                                id="titre"
                                name="titre"
                                value="<?= $titre ?>"
                                placeholder="Saisir le titre du commentaire"
                            >
                            <?php if (isset($erreurs['titre'])) : ?>
                                <p class="form-text text-danger"><?= $erreurs['titre'] ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="resume" class="form-label text-white">Votre Avis *</label>
                            <input
                                type="text"
                                class="form-control <?= isset($erreurs['resume']) ? "border border-2 border-danger" : "" ?>"
                                id="resume"
                                name="resume"
                                value="<?= $resume ?>"
                                placeholder="Rédiger votre avis"
                            >
                            <?php if (isset($erreurs['resume'])) : ?>
                                <p class="form-text text-danger"><?= $erreurs['resume'] ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="form-group mb-3">
                            <label for="note">Notation</label>
                            <select name="note" class="form-control" id="note">

                                <option value="5">
                                    ⭐​⭐​⭐​⭐​⭐​ (Cliquer pour changer la note)
                                </option>

                                <option value="4">
                                    ⭐​⭐​⭐​⭐​
                                </option>

                                <option value="3">
                                    ⭐​⭐​⭐​
                                </option>

                                <option value="2">
                                    ⭐​⭐​
                                </option>

                                <option value="1">
                                    ⭐​
                                </option>

                            </select>
                            <?php if (isset($erreurs['note'])) : ?>
                                <p class="form-text text-danger"><?= $erreurs['note'] ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="text-center mt-5"><button type="submit" class="btn btn-primary">Envoyer l'avis</button></div>
                </div>
                    </form>


                </div>
            </div>
        </div>
    </div>

    <section class="container">
        <div class="container">
            <a class="nav-link text-primary mt-5 mb-5 text-center" href="/mes_films.php">Voir mes films ajoutés</a>
        </div>
    </section>




</section>

<?php
require_once BASE_PROJET .
    '/src/_partials/footer.php'
?>

<?php endif; ?>

