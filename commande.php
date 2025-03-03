<?php

$string = file_get_contents('assets/json/details_users_command.json');
$commandes = json_decode($string, true);

$fmt = new NumberFormatter('fr_FR', NumberFormatter::CURRENCY);

$dateF = new DateTimeImmutable($commandes[0]["com_date"]);

function calculer_total_commande($tab)
{
    $sum = 0;
    foreach ($tab as $value) {
        $sum += $value["prod_prix"];
    }
    return $sum;
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lobster&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Playfair:ital,opsz,wght@0,5..1200,300..900;1,5..1200,300..900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Lobster&family=Lora:ital,wght@0,400..700;1,400..700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Playfair:ital,opsz,wght@0,5..1200,300..900;1,5..1200,300..900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Lobster&family=Open+Sans:ital,wght@0,300..800;1,300..800&family=PT+Sans+Narrow:wght@400;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

        .title {
            font-family: "Lobster",sans-serif;
        }
        body{
            background: #F8F5F2;
        }
        nav{
            background: #F8F5F2;
            color: #3D3D3D
        }
        .btn {
            background: #e6d5c4
        }
        .btn:hover {
            background: #C2A57B
        }

        .containeer {
            background:#E6D5C4;
            color: #3d3d3d
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
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid d-flex justify-content-center">
            <a class="title navbar-brand fs-2" href="index.php">Flamme & Délices</a>
        </div>
    </nav>
    <div class="row m-0 mt-1 mx-3  justify-content-center">
        <div class="rounded rounded-2 d-flex flex-column">
            <p><b>Nom </b>: <?= $commandes[0]["use_nom"] ?></p>
            <p><b>Addresse de livraison </b>: <?= $commandes[0]["use_adresse"] ?></p>
            <p><b>Mail </b>: <?= $commandes[0]["use_mail"] ?></p>
            <p><b>Numéro de téléphone </b>: <?= $commandes[0]["use_tel"] ?></p>
            <p><b>Date de commande</b> : <?= $dateF->format("d/m/Y") ?></p>
        </div>
    </div>
    <div class="containeer d-flex align-items-end justify-content-around pb-3 rounded  mx-3">
        <div class="row m-0">
            <?php foreach ($commandes as $value) { ?>
                <div class="row col-10 mt-3">
                    <img class="col-4" src="<?= $value["prod_img-fond"] ?>" alt="<?= $value["prod_nom"] ?>">
                    <div class="col-8  align-content-center">
                        <p><b>Nom du produit</b> : <?= $value["prod_nom"] ?></p>
                        <p><b>prix du produit</b> : <?= $fmt->formatCurrency($value["prod_prix"], "EUR") ?></p>
                        <p><b>Quantité commandé</b> : x1</p>
                        <p><b>Référence du produit</b> : <?= $value["prod_ref"] ?></p>
                        <p><b>Description du produit</b> : <?= $value["prod_description"] ?></p>
                        <p><b>Quantité en stock du produit</b> : <?= $value["prod_qté"] ?></p>

                        
                    </div>
                </div>
                <hr>
            <?php } ?>
        </div>
        <p class="fs-3 me-5 text-decoration-underline"><b>Total : <?= $fmt->formatCurrency(calculer_total_commande($commandes), "EUR") ?></b> </p>
            </div>
</body>

</html>