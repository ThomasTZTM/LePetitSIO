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
// Connexion à la base de données
    require_once '../base.php';
// Connexion à la base de données
    require_once BASE_PROJET .
        '/src/database/utilisateur-db.php';

    $films = pdologin();

    $erreurs = [];
    $email = "";
    $mdp = "";
    $mdp2 = "";
    $pseudo = "";
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        //formulaire a été soumis
        //Traiter les données du formulaire
        //Récupérer les valeur saisis par l'utilisateur
        //superglobal $post qui va etre un tablo assoc
        $email = $_POST["email"];
        $mdp = $_POST["mdp"];
        $mdp2 = $_POST["mdp2"];
        $pseudo = $_POST["pseudo"];

//---------------------------------------------------------------------------------
//---------------------------------------------------------------------------------
//---------------------------------------------------------------------------------
        if (empty($mdp)) {
            $erreurs['mdp'] = "Le mot de passe est obligatoire";
        }
        if (empty($mdp)) {
            $erreurs['mdp'] = "Le mot de passe est obligatoire";
        }
        if (empty($mdp2)) {
            $erreurs['mdp2'] = "Le mot de passe doit etre re-saisie";
        }elseif ($mdp!=$mdp2){
            $erreurs['mdp2'] = "Le mot de passe n'est pas similaire";
        }


        $taille_mdp = strlen($mdp);

        $condition1 = 0; // Fausse
        $condition2 = 0; // Fausse
        $condition3 = 0; // Fausse
        $condition4 = 0; // Fausse

        $cpt = 0;
        while($cpt<$taille_mdp){
            $lettre_mdp = substr($mdp, $cpt, 1);
            //Test pour afficher les lettres qui passent dans les IF
            //Condition de la taille
            if ($taille_mdp>7 and $taille_mdp<15) {
                $condition1++;
            }
            //Condition des majuscules
            if (ctype_upper($lettre_mdp)){
                $condition2 ++;
            }
            //Condition des minuscules
            if (ctype_lower($lettre_mdp)){
                $condition3 ++;
            }
            //Condtition des chiffres
            if (is_numeric($lettre_mdp)){
                $condition4 ++;
            }
            // Passe à la prochaine lettre
            $cpt ++;
        }

        if (($condition1>0) and ($condition2>0) and ($condition3>0) and ($condition4>0)){
            echo "oui";
        }else{
            $erreurs['mdp'] = "Le mot de passe n'est pas assez sécuriser";
        }

        //---------------------------------------------------------------------------------
        //---------------------------------------------------------------------------------
        //---------------------------------------------------------------------------------

        if (empty($pseudo)) {
            $erreurs['pseudo'] = "Le pseudo est obligatoire";
        }
        if (empty($email)) {
            $erreurs['email'] = "L'email est obligatoire";
        } elseif (!filter_var($email, filter: FILTER_VALIDATE_EMAIL)) {
            $erreurs['email'] = "L'email n'est pas une email";
        }

        $test = 0;
        foreach ($films as $film) {
            if ($email == $film["email_utilisateur"]) {
                $test++;
            }
        }

        if ($test!=0){
            $erreurs['email'] = "L'email est déjà utilisé";
        }

        // Traiter les donnés
        if (empty($erreurs)) {
            // Traitement des données (insertion dans une base de données)
            // Rediriger l'utilisateur vers une autre page du site, page d'acceuil
            $password = $mdp;
            $passwordHash = password_hash($password, algo: PASSWORD_ARGON2I);
            $requete_inscription = $pdo->prepare("INSERT INTO `utilisateur` (`id_utilisateur`, `pseudo_utilisateur`, `email_utilisateur`, `mdp_utilisateur`) VALUES (NULL, '$pseudo', '$email', '$passwordHash');");
            $requete_inscription->execute();
            header(header: "Location: ../connexion.php");
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
        <title>LPS - Créer un compte</title>
    </head>

    <body class="">

    <?php
    require_once BASE_PROJET .
        '/src/_partials/header.php'
    ?>



    <div class="jumbotron text-center bg-purple my-4 mt-5 mb-5">

        <hr class="my-4 opacity-75 container ">

        <h1 class="display-4">Créer un compte </h1>
        <div>





            <div class="container">
                <div class="w-50 mx-auto shadow p-4 my-5">
                    <form action="" method="post" novalidate>

                        <div class="mb-3">
                            <label for="pseudo" class="form-label">Pseudo</label>
                            <input
                                    type="text"
                                    class="form-control <?= (isset($erreurs['pseudo'])) ? "border border-2 border-danger" : "" ?>"
                                    id="pseudo"
                                    name="pseudo"
                                    value="<?= $pseudo ?>"
                                    placeholder="Saisir votre pseudo"
                                    aria-describedby="mdpHelp">
                            <?php if (isset($erreurs['pseudo'])) : ?>
                                <p class="form-text text-danger"><?= $erreurs['pseudo'] ?></p>
                            <?php endif; ?>
                        </div>

                        <hr class="my-4 opacity-25 container ">

                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse Email</label>
                            <input type="email"
                                   class="form-control <?= (isset($erreurs['email'])) ? "border border-2 border-danger" : "" ?>"
                                   id="email"
                                   name="email"
                                   value="<?= $email ?>"
                                   placeholder="Saisir votre Email"
                                   aria-describedby="emailHelp">
                            <?php if (isset($erreurs['email'])) : ?>
                                <p class="form-text text-danger"><?= $erreurs['email'] ?></p>
                            <?php endif; ?>
                        </div>

                        <hr class="my-4 opacity-25 container ">

                        <div class="mb">
                            <label for="mdp" class="form-label">Mot de passe</label>
                            <p class="fs-6 opacity-50">Le mot de passe doit contenir au moin : 1 minuscule, 1 majuscule, 1 chiffre et dois faire entre 7 et 15 caractères</p>
                            <input
                                    type="password"
                                    class="form-control <?= (isset($erreurs['mdp'])) ? "border border-2 border-danger" : "" ?>"
                                    id="mdp"
                                    name="mdp"
                                    value="<?= $mdp ?>"
                                    placeholder="Saisir votre mot de passe"
                                    aria-describedby="mdpHelp">
                            <?php if (isset($erreurs['mdp'])) : ?>
                                <p class="form-text text-danger"><?= $erreurs['mdp'] ?></p>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="mdp2" class="form-label"></label>
                            <input
                                    type="password"
                                    class="form-control <?= (isset($erreurs['mdp2'])) ? "border border-2 border-danger" : "" ?>"
                                    id="mdp2"
                                    name="mdp2"
                                    value="<?= $mdp2 ?>"
                                    placeholder="Re-Saisir votre mot de passe"
                                    aria-describedby="mdpHelp">
                            <?php if (isset($erreurs['mdp2'])) : ?>
                                <p class="form-text text-danger"><?= $erreurs['mdp2'] ?></p>
                            <?php endif; ?>
                        </div>


                        <button type="submit" class="btn btn-primary mb-5">Valider</button>
                        <a class="nav-link text-primary" href="/creer_compte.php">Connexion à votre compte</a>
                    </form>
                </div>
            </div>





        </div>

        <h1>
            <?php
            ?>
        </h1>
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
