<?php
session_start();

if (isset($_SESSION["utilisateur"])) {
    $ps1 = $_SESSION["utilisateur"]["pseudo"];
}else{
    $ps1=Null;
}

require_once '../base.php';

require_once BASE_PROJET .
    '/src/database/pdo-function.php';

$films = pdoindex();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/test.css" rel="stylesheet">

    <title>LPS - Acceuil</title>
</head>

<body class="cursor">

<?php
require_once BASE_PROJET .
    '/src/_partials/header.php';
?>



<div class="jumbotron text-center bg-purple my-4 mt-5 mb-5">
    <h1 class="display-4 mb-5 text-primary" <span class="text-black"> Nos
        </span> partenaires
    </h1>
    <h2>Efe Tacos <span class="text-primary">-</span> Trucks Kebab</h2>
    <img src="assets/images/perso/partenaire.jpg" class="container w-50" alt="">

</div>



<?php
require_once BASE_PROJET .
    '/src/_partials/footer.php'
?>

<div>
    <h1 class="opacity-0">0</h1>
</div>


<script src="../assets/js/bootstrap.bundle.min.js"></script>



</body>
</html>










