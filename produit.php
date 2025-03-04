<?php

$string = file_get_contents('assets/json/details.json');
$details = json_decode($string, true);

$string_avis = file_get_contents('assets/json/avis.json');
$avis = json_decode($string_avis, true);
$fmt = new NumberFormatter('fr_FR', NumberFormatter::CURRENCY);

$dateF = new DateTimeImmutable($avis[0]["avi_date"]);

function calculer_note($avis)
{
    $sum = 0;
    foreach ($avis as $value) {
        $sum = $sum + $value["avi_note"];
    }
    return $sum / count($avis);
}

function afficher_avis($note)
{

    foreach ($note as $value) {
        $dateF = new DateTimeImmutable($value["avi_date"]);
        $note = '';
        for ($i = 0; $i < $value["avi_note"]; $i++) {
            $note .= '★';
        }
        if ($value["avi_note"]<5) {
            $rest=5-$value["avi_note"];
            for ($i=0; $i <$rest ; $i++) { 
                $note.='☆';
            }
        }
        echo '<p class="fw-bold">' . $value["use_nom"] . '   : ' . $dateF->format("d/m/Y") . '</p>
        <hr>
        <p>' . $value["avi_texte"] . '</p>
        <p class="text-warning fs-3">' . $note . '</p>
        <br>
        ';
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="assets\json\produit.css">
    <title>Vente de bougie</title>
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

        .modal {
            background: #F8F5F2;
        }

        .card {
            border: 1px solid #A89C94
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
    <div class="row justify-content-center m-0" id="content">
        <img class="col-sm-3 mb-5" <?= 'src="' . $details[0]["prod_img-fond"] . '"alt="' . $details[0]["prod_nom"] . 'image"' ?>>
        <div class="col-sm-6 pt-5">
            <div>
                <h1><b><?= $details[0]["prod_nom"] ?></b></h1>
                <p><b>Catégorie : </b> <?= $details[0]["prod_cat"] ?></p>
                <p><b>Description : </b> <?= $details[0]["prod_description"] ?></p>
                <p><b>Prix : </b> <?= $fmt->formatCurrency($details[0]["prod_prix"], "EUR") ?></p>
                <p><b>Référence produit : </b> <?= $details[0]["prod_ref"] ?></p>
                <p><b>Quantité produit : </b> <?= $details[0]["prod_qté"] ?></p>
                <b>Note : <?= calculer_note($avis) ?>/5</b>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-8 d-flex flex-column rounded rounded-3 p-5 bg-secondary-subtle ">

            <p class="fw-bold"><?= $avis[0]["use_nom"] . ' : ' . $dateF->format("d/m/Y") ?> </p>
            <p> <?= $avis[0]["avi_texte"]; ?> </p>
            <p class="text-warning fs-3"> <?php for ($i = 0; $i < $avis[0]["avi_note"]; $i++) {
                    echo '★';}
                if ($avis[0]["avi_note"]<5) {
                        $rest=5-$avis[0]["avi_note"];
                        for ($i=0; $i <$rest ; $i++) { 
                            echo'☆';
                        }
                    } ?> </p>

            <div><a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="text-decoration-none float-end">Voir tout</a></div>
        </div>
    </div>




    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-2" id="staticBackdropLabel">Avis sur <?= $details[0]["prod_nom"] ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php
                    afficher_avis($avis);
                    ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>