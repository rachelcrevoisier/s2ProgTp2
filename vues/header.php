<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <title><?= $titre ?></title>
</head>
<body>
    <header>
        <div class="iconesConnexion">
            <span class="material-symbols-outlined"><a href="index.php?commande=seConnecter">account_circle</a></span>
        </div>
        <nav>
            <a href="index.php?commande=accueil">Accueil</a>
            <a href="index.php?commande=quiSommesNous">Qui sommes-nous</a>
            <a href="index.php?commande=contact">Nous contacter</a>
        </nav>
        <div class="iconeRecherche">
            <span class="material-symbols-outlined"><a href="index.php?commande=recherche">search</a></span>
        </div>
    </header>