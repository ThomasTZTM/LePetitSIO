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
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

        <title>LPS - Paiement</title>
    </head>

    <body class="">

    <?php
    require_once BASE_PROJET .
        '/src/_partials/header.php'
    ?>


    <section class="bg-light" id="presentation">
        <div class="container mt-5">
            <img src="assets/images/regle/paiement.png" alt="">
            <img src="assets/images/regle/paiement2.png" alt="">
        </div>
    </section>


    <?php
    require_once BASE_PROJET .
        '/src/_partials/footer.php'
    ?>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

<?php endif; ?>





