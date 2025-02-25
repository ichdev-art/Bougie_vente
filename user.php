<?php

$string = file_get_contents('assets/json/details_users_command.json');
$commandes = json_decode($string, true);

$fmt = new NumberFormatter('fr_FR', NumberFormatter::CURRENCY);





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
    <div class="row m-0  justify-content-center">
        <div class="col-8">
            <p>Nom : <?= $commandes[0]["use_nom"] ?></p>
            <p>Addresse : <?= $commandes[0]["use_adresse"] ?></p>
            <p>Mail : <?= $commandes[0]["use_mail"] ?></p>
            <p>N°tél : <?= $commandes[0]["use_tel"] ?></p>
        </div>
    </div>
    <div>
        <h1 class="mx-5">Commande n°<?= $commandes[0]["com_id"] ?></h1>
        <?php foreach ($commandes as $value) {
            
         ?>
        <div class="row m-0 justify-content-center">
            <img class="col-2" src="<?= $value["prod_image"] ?>" alt="<?= $value["prod_nom"] ?>">
            <div class="col-8 align-content-center">
                <p>Nom du produit : <?= $value["prod_nom"] ?></p>
                <p>Date de commande : <?= $value["com_date"] ?></p>
            </div>
        </div>
        <?php } ?>
        </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>