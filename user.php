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
        @import url('https://fonts.googleapis.com/css2?family=Lobster&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=PT+Sans+Narrow:wght@400;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

        .title {
            font-family: "Lobster",sans-serif;
        }

        body {
            background: #f8f5f2
        }

        .detail {
            background: #e6d5c4
        }
        nav{
            background: #F8F5F2;
            color: #3D3D3D
        }

        .btn {
            background: #e6d5c4
        }
        .btn:hover {
            background: #C2A57B;
            color: black;
        }
        .user {
            background: #E6D5C4
        }

        .hr {
            margin: 1rem auto;
        }
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

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex justify-content-center">
            <a class="title navbar-brand fs-2" href="index.php">Flamme & Délices</a>
        </div>
    </nav>
    <div class="user row m-0  justify-content-center">
        <div class="col-9 m-2 d-flex flex-column align-items-center">
            <p><b>Nom </b>: <?= $commandes[0]["use_nom"] ?></p>
            <p><b>Addresse </b>: <?= $commandes[0]["use_adresse"] ?></p>
            <p><b>Mail </b>: <?= $commandes[0]["use_mail"] ?></p>
            <p><b>Numéro de téléphone </b>: <?= $commandes[0]["use_tel"] ?></p>
        </div>
    </div>
    <div>
        <div class="">
            <h1 class="mx-5 mt-2">Commande n°<?= $commandes[0]["com_id"] ?></h1>
        </div>
        <div class=" command row col-12 justify-content-start">
            <?php foreach ($commandes as $value) { ?>
                <div class="row col-8 m-1">
                    <img height="" class="col-2" src="<?= $value["prod_img-fond"] ?>" alt="<?= $value["prod_nom"] ?>">
                    <div class="col-8  align-content-center">
                        <p><b>Nom du produit</b> : <?= $value["prod_nom"] ?></p>
                        <p><b>Date de commande</b> : <?= $dateF->format("d/m/Y") ?></p>
                    </div>
                </div>
                <hr class= "hr">
            <?php } ?>
            <div class="d-flex justify-content-end">
                <a href="./commande.php" class="detail text-decoration-none text-dark  mx-5 fs-4 p-2 rounded">Voir details</a>
            </div>
        </div>

    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>