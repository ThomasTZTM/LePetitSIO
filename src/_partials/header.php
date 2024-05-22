<?php
$ps1 = NULL;

if (isset($_SESSION["utilisateur"])) {
    $ps1 = $_SESSION["utilisateur"]["pseudo"];
}

if (isset($_SESSION["utilisateur"])) {
    $id = $_SESSION["utilisateur"]["id"];
}

if (isset($_SESSION["utilisateur"])) {
    $em1 = $_SESSION["utilisateur"]["email"];
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/index.php">
            <img src="./assets/images/lps.png" alt="Logo MyDriveMovie" width="50" height="50"
                 class="d-inline-block align-top">
            LE PETIT SIO
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/index.php">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/liste-film.php">Catalogue</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/entreprise.php">L'équipe</a>
                </li>

                <?php if (!$ps1) : ?>

                    <li class="nav-item">
                        <a class="nav-link" href="/connexion.php">Connexion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/creer_compte.php">Créer un compte</a>
                    </li>


                <?php endif; ?>

                <?php if ($ps1) : ?>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Action de : <span class="text-light"><?php echo $ps1 ?></span>
                        </a>
                        <ul class="dropdown-menu bg-dark">
                            <li class="nav-item">
                                <a class="nav-link" href="/ajout_film.php">Mon panier</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/historique.php">Historique des commandes</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/deconnexion.php">Déconnexion</a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="/ajout_film.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-basket-fill" viewBox="0 0 16 16">
                                <path d="M5.071 1.243a.5.5 0 0 1 .858.514L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15.5a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5H15v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9H.5a.5.5 0 0 1-.5-.5v-2A.5.5 0 0 1 .5 6h1.717zM3.5 10.5a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0zm2.5 0a.5.5 0 1 0-1 0v3a.5.5 0 0 0 1 0z"/>
                            </svg>
                            Mon panier
                        </a>
                    </li>

                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>