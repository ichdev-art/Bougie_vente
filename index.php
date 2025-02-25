<?php

$string = file_get_contents('assets/json/produits.json');
$produits = json_decode($string, true);

function afficher_produit(array $produits, $fmt)
{
    foreach ($produits as $value) {
        echo '<div class="card row m-0 align-items-center shadow-lg p-3 mb-5 rounded zoom" style="width: 21rem;">
           <a href="produit.php"> <div class="align-content-center" style="width: 16rem;height: 16rem;"><img src=" ' . $value["prod_image"] . ' " class="card-img-top" alt=" ' . $value["prod_nom"] . ' "></div>
            <div class="card-body">
                <h4 class="card-title"> ' . $value["prod_nom"] . ' .</h4>
                <h5 class="card-title">catégorie : ' . $value["prod_cat"] . ' .</h5>
                <p class="card-text">' . $value["prod_description"] . '.</p>
                <p class="card-text">' . $fmt->formatCurrency($value["prod_prix"], "EUR") . '</p>
            </div></a>
        </div>';
    }
}
$fmt = new NumberFormatter('fr_FR', NumberFormatter::CURRENCY);


$all_catego = [];

foreach ($produits as $value) {
    array_push($all_catego, $value['prod_cat']);
};
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/style.css">
    <title>Vente de bougie</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-secondary-subtle">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Bougie d'arabe</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Catégories
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Tout</a></li>
                            <?php foreach (array_unique($all_catego) as $value) { ?>
                                <li><a class="dropdown-item" href="#"><?= $value ?></a></li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
                <div class="d-flex">
                    <a href="user.php"><button class="btn btn-outline-success">Utilisateur</button></a>
                </div>
            </div>
        </div>
    </nav>




    <div class="row m-0 mt-4 justify-content-center gap-4">
        <?php afficher_produit($produits, $fmt); ?>

    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>