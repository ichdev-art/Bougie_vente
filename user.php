<?php

$string = file_get_contents('assets/json/details_users_command.json');
$commandes = json_decode($string, true);

$fmt = new NumberFormatter('fr_FR', NumberFormatter::CURRENCY);

$dateF = new DateTimeImmutable($commandes[0]["com_date"]);



?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Vente de bougie</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lobster&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Playfair:ital,opsz,wght@0,5..1200,300..900;1,5..1200,300..900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Lobster&family=Lora:ital,wght@0,400..700;1,400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Playfair:ital,opsz,wght@0,5..1200,300..900;1,5..1200,300..900&display=swap');

        a {
            font-family: "Monserrat", sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: "Montserrat", sans-serif;
        }

        p {
            font-family: "Lora", sans-serif;
        }
    </style>

</head>

<body>

    <nav class="navbar navbar-expand-lg bg-secondary-subtle ">
        <div class="container-fluid d-flex">
            <a class="navbar-brand" href="index.php">Boug🕯️e d'arabe</a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <div class="d-flex ">
                    <a href="user.php"><button class="btn btn-outline-success">Utilisateur</button></a>
                </div>
            </div>
        </div>
    </nav>
    <div class="row m-0  justify-content-center">
        <div class="col-9 m-2 border border-dark rounded rounded-2 d-flex flex-column align-items-center">
            <p><b>Nom </b>: <?= $commandes[0]["use_nom"] ?></p>
            <p><b>Addresse </b>: <?= $commandes[0]["use_adresse"] ?></p>
            <p><b>Mail </b>: <?= $commandes[0]["use_mail"] ?></p>
            <p><b>Numéro de téléphone </b>: <?= $commandes[0]["use_tel"] ?></p>
        </div>
    </div>
    <div>
        <div class="">
            <h1 class="mx-5">Commande n°<?= $commandes[0]["com_id"] ?></h1>
        </div>
        <div class="row col-12 justify-content-center">
            <?php foreach ($commandes as $value) { ?>
                <div class="row col-8 border border-dark rounded rounded-3 bg-secondary-subtle m-1">
                    <img height="" class="col-2" src="<?= $value["prod_image"] ?>" alt="<?= $value["prod_nom"] ?>">
                    <div class="col-8  align-content-center">
                        <p><b>Nom du produit</b> : <?= $value["prod_nom"] ?></p>
                        <p><b>Date de commande</b> : <?= $dateF->format("d/m/Y") ?></p>
                    </div>
                </div>
            <?php } ?>
            <div class="d-flex justify-content-end">
                <a href="./commande.php" class="text-decoration-none text-dark  mx-5 fs-3 border border-2 rounded border-dark p-2 bg-secondary-subtle">Voir details</a>
            </div>
        </div>

    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>