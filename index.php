<?php 
    /*  index.php = contrôleur 
        Il s'occupe des redirections et des contrôles
    
    */
    //si le lien index contient ?commande= alors commande = le nom derrière le ?
    //$_REQUEST = par get ou post
    if(isset($_REQUEST["commande"]))
    {
        $commande = $_REQUEST["commande"];
    }
    else 
    {
        //s'il n'y a pas de commande alors on redirige vers la page d'accueil
        $commande = "Accueil";
    }
    //On met la page modèle pour aller chercher les fonctions
    require_once("modele.php");
    //On fait un switch pour chaque nom de la commande et ainsi rediriger vers la bonne vue
    switch($commande)
    {
        case "accueil": 
            $titre = "Accueil";
            require_once("vues/header.php");
            require("vues/accueil.php");
            require_once("vues/footer.php");
            break;
        case "contact": 
            $titre = "contact";
            require_once("vues/header.php");
            require("vues/contact.php");
            require_once("vues/footer.php");
            break; 
        case "quiSommesNous": 
            $titre = "Qui sommes Nous";
            require_once("vues/header.php");
            require("vues/quisommesnous.php");
            require_once("vues/footer.php");
            break;  
        case "recherche": 
            $titre = "Qui sommes Nous";
            require_once("vues/header.php");
            require("vues/recherche.php");
            require_once("vues/footer.php");
            break; 
        case "seConnecter": 
            $titre = "Qui sommes Nous";
            require_once("vues/header.php");
            require("vues/connexion.php");
            require_once("vues/footer.php");
            break; 
    } 

?>