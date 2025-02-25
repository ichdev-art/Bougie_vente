<?php

$string = file_get_contents('assets/json/details.json');
$details = json_decode($string, true);

$string_avis = file_get_contents('assets/json/avis.json');
$avis = json_decode($string_avis, true);
$fmt = new NumberFormatter('fr_FR', NumberFormatter::CURRENCY);

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
        $note = '';
        for ($i = 0; $i < $value["avi_note"]; $i++) {
            $note .= '⭐';
        }
        echo '<p class="fw-bold">' . $value["use_nom"] . '   : ' . $value["avi_date"] . '</p>
        <hr>
        <p>' . $value["avi_texte"] . '</p>
        <p>' . $note . '</p>
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
    <title>Vente de bougie</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-secondary-subtle ">
        <div class="container-fluid d-flex">
            <a class="navbar-brand" href="index.php">Bougie d'arabe</a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <div class="d-flex ">
                    <a href="user.php"><button class="btn btn-outline-success">Utilisateur</button></a>
                </div>
            </div>
        </div>
    </nav>
    <div class="row justify-content-center m-0" id="content">
        <img class="col-sm-3 mb-5" <?= 'src="' . $details[0]["prod_image"] . '"alt="' . $details[0]["prod_nom"] . 'image"' ?>>
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

            <p class="fw-bold"><?= $avis[0]["use_nom"] . ' : ' . $avis[0]["avi_date"] ?> </p>
            <p> <?= $avis[0]["avi_texte"]; ?> </p>
            <p> <?php for ($i = 0; $i < $avis[0]["avi_note"]; $i++) {
                    echo '⭐'; } ?> </p>
            <p class="d-flex justify-content-end" ><a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="text-decoration-none ">Voir tout</a></p>
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