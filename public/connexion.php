<?php
session_start();

if (isset($_SESSION["utilisateur"])) {
    $ps1 = $_SESSION["utilisateur"]["pseudo"];
}else{
    $ps1=Null;
}

?>


<?php if (!$ps1) : ?>
    <?php
    $_SESSION=[];
    require_once '../base.php';
// Connexion à la base de données
    require_once BASE_PROJET .
        '/src/database/utilisateur-db.php';
    require_once BASE_PROJET .
        '/src/fonction/fonction.php';

    $logins = pdologin();


    $erreurs = [];
    $email = "";
    $mdp = "";
//                             Vérifie la valeur + type
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        //superglobal $post qui va etre un tablo assoc
        $email = $_POST["email"];
        $mdp = $_POST["mdp"];
        // Validation des données;
        $erreurs = ValDeMdp($erreurs,$mdp,$email);
        $erreurlog = ValDeMdp2($erreurs,$mdp,$email);
        $pseudo = ValDeMdp3($erreurs,$mdp,$email);
        $id = ValDeMdp4($erreurs,$mdp,$email);
        //REDIRECTION
        if (empty($erreurs)) {
            $_SESSION["utilisateur"] = [
                'pseudo' => $pseudo,
                'email' => $email,
                'id' => $id
            ];
            $ps1 = $_SESSION["utilisateur"]["pseudo"];
            $em1 = $_SESSION["utilisateur"]["email"];
            echo "SESSION : $ps1 --//-- $em1";
            header(header: "Location: ../index.php");
            exit();
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <title>LPS - Connexion</title>
    </head>
    <body class="">
    <?php
    require_once BASE_PROJET .
        '/src/_partials/header.php'
    ?>
    <hr class="my-4 opacity-75 container ">
    <div class="jumbotron text-center bg-purple my-4 mt-5 mb-5">
        <h1 class="display-4"> Connexion </h1>
        <div>
            <div class="container">
                <div class="w-50 mx-auto shadow p-4 my-5">
                    <form action="" method="post" novalidate>
                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse Email</label>
                            <input type="email"
                                   class="form-control <?= (isset($erreurs['email']) or isset($erreurs['login'])) ? "border border-2 border-danger" : "" ?>"
                                   id="email"
                                   name="email"
                                   value="<?= $email ?>"
                                   placeholder="Saisir votre Email"
                                   aria-describedby="emailHelp">
                            <?php if (isset($erreurs['email'])) : ?>
                                <p class="form-text text-danger"><?= $erreurs['email'] ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="mb-3">
                            <label for="mdp" class="form-label">Mot de passe</label>
                            <input
                                    type="password"
                                    class="form-control <?= (isset($erreurs['mdp']) or isset($erreurs['login'])) ? "border border-2 border-danger" : "" ?>"
                                    id="mdp"
                                    name="mdp"
                                    value="<?= $mdp ?>"
                                    placeholder="Saisir votre mot de passe"
                                    aria-describedby="mdpHelp">
                            <?php if (isset($erreurs['mdp'])) : ?>
                                <p class="form-text text-danger"><?= $erreurs['mdp'] ?></p>
                            <?php endif; ?>
                        </div>
                        <p class="<?= (isset($erreurs['login'])) ? "text-danger" : "" ?>"><?= (isset($erreurs['login'])) ? $erreurlog : '' ?></p>
                        <button type="submit" class="btn btn-primary mb-5">Valider</button>
                        <a class="nav-link text-primary" href="/creer_compte.php">Créer votre compte</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
    require_once BASE_PROJET .
        '/src/_partials/footer.php'
    ?>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
<?php endif; ?>


<?php if ($ps1) : ?>
    <?php
    header(header: "Location: ../erreur403.php");
    exit();
    ?>
<?php endif; ?>


