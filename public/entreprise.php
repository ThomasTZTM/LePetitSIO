<?php
global $pdo;
session_start();
require_once '../base.php';


?>

<?php if (2==1) : ?>
    <?php
    header(header: "Location: ../index.php");
    exit();
    ?>
<?php endif; ?>




<?php if (1==1) :

$films = 2;?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/test.css" rel="stylesheet">

    <title>LPS - Equipe</title>
</head>

<body class="cursor">

<?php
require_once BASE_PROJET .
    '/src/_partials/header.php';
?>


<section class="container mt-5">
    <div>
        <h1> Notre équipe </h1>

        <div class="container ">
            <div class="row">

                <div class="col col-12 col-lg-4 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="/assets/images/perso/pdg.jpg" class="card-img-top mb-3">
                            <h5 class="card-title fs-1 text-center"><strong></strong>Thomas Michelin</h5>
                            <p class="card-title fs-4 text-center">CEO</p>
                            <p class="card-text">En tant que PDG de l'entreprise, Thomas Michelin sera responsable de la direction stratégique, de la gestion
                                opérationnelle et de la prise de décision globale pour assurer le succès et la croissance continue de l'entreprise.</p>

                        </div>
                    </div>
                </div>

                <div class="col col-12 col-lg-4 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="/assets/images/perso/IMG_1851.jpg" class="card-img-top mb-3">
                            <h5 class="card-title fs-1 text-center"><strong></strong>Arthuro Coller</h5>
                            <p class="card-title fs-4 text-center">Directeur Commercial</p>
                            <p class="card-text">En tant que Directeur Commercial, Arthuro Coller sera chargé de superviser et de diriger les activités
                                commerciales de l'entreprise, contribuant ainsi à atteindre les objectifs de vente et de croissance.</p>

                        </div>
                    </div>
                </div>

                <div class="col col-12 col-lg-4 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="/assets/images/perso/IMG_1849.jpg" class="card-img-top mb-3">
                            <h5 class="card-title fs-1 text-center"><strong></strong>Thomas Ricola</h5>
                            <p class="card-title fs-4 text-center">Scientifique / Chercheur</p>
                            <p class="card-text">Thomas Ricola assumera le rôle de Scientifique et Chercheur au sein de l'entreprise, contribuant à la recherche, au
                                développement et à l'innovation dans son domaine d'expertise.</p>

                        </div>
                    </div>
                </div>

                <div class="col col-12 col-lg-4 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="/assets/images/perso/IMG_1850.jpg" class="card-img-top mb-3">
                            <h5 class="card-title fs-1 text-center"><strong></strong>Milka Bognoul</h5>
                            <p class="card-title fs-4 text-center">Responsable Publicité</p>
                            <p class="card-text">Milka Bognoul occupera le rôle polyvalent de Responsable Publicité et Mannequin, assumant à la fois la
                                responsabilité de la promotion publicitaire de l'entreprise et jouant un rôle actif en tant que mannequin pour
                                représenter les produits.</p>
                        </div>
                    </div>
                </div>

                <div class="col col-12 col-lg-4 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="/assets/images/perso/IMG1.jpg" class="card-img-top mb-3">
                            <h5 class="card-title fs-1 text-center"><strong></strong>Hugue Ad Laurent</h5>
                            <p class="card-title fs-4 text-center">Responsable Production</p>
                            <p class="card-text">Hugue Ad Laurent occupera le poste clé de Responsable de Production des boissons, supervisant les pupuces et
                                coordonnant l'ensemble des opérations de fabrication des cannettes au sein de l'entreprise.</p>
                        </div>
                    </div>
                </div>

                <div class="col col-12 col-lg-4 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="/assets/images/perso/IMG_1848.jpg" class="card-img-top mb-3">
                            <h5 class="card-title fs-1 text-center"><strong></strong>Daniel Ilo-AI</h5>
                            <p class="card-title fs-4 text-center">Testeur</p>
                            <p class="card-text">Daniel Ilo-AI occupera le poste clé de testeur des nouveaux goûts ! Il est munni d'un des meilleurs palet de la classe ce qui permet à LPS de commercialiser les meilleurs goûts !</p>
                        </div>
                    </div>
                </div>

                <div class="col col-12 col-lg-4 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="/assets/images/perso/IMG2.jpg" class="card-img-top mb-3">
                            <h5 class="card-title fs-1 text-center"><strong></strong>Michelle ChienLeSki</h5>
                            <p class="card-title fs-4 text-center">BodyGuard</p>
                            <p class="card-text">Michelle est le meilleur agent de sécurité de la marque ! Il s'occupe de la sécurité du batiment de production.</p>
                        </div>
                    </div>
                </div>

                <div class="col col-12 col-lg-4 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="/assets/images/perso/titouan.jpg" class="card-img-top mb-3">
                            <h5 class="card-title fs-1 text-center"><strong></strong>Titouane EmLeQuick</h5>
                            <p class="card-title fs-4 text-center">Infermier</p>
                            <p class="card-text">Titouane est l'infermier de l'entreprise. Il s'occupe des visites médicales, et des problèmes du personnel. Il peut intervenir en tant que thérapeute grâce à des médicaments surement douteux.</p>
                        </div>
                    </div>
                </div>

                <div class="col col-12 col-lg-4 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="/assets/images/perso/mrdossier.jpg" class="card-img-top mb-3">
                            <h5 class="card-title fs-1 text-center"><strong></strong>Monsieur Dossier</h5>
                            <p class="card-title fs-4 text-center">Intervenant écologique</p>
                            <p class="card-text">Intervenant de chez <span class="text-success">EcoInnovate Solutions</span>, Monsieur Dossier apporte son expertise et sa conscience écologique afin de permettre à l'entreprise et ses collaborateurs d'adopter une production écologique et sociétal.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>







<?php
require_once BASE_PROJET .
    '/src/_partials/footer.php'
?>
<script src="../assets/js/bootstrap.bundle.min.js"></script>


<?php endif; ?>





