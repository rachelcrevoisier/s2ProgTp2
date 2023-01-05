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
        $commande = "accueil";
    }
    //On met la page modèle pour aller chercher les fonctions
    require_once("modele.php");
    //On fait un switch pour chaque nom de la commande et ainsi rediriger vers la bonne vue
    switch($commande)
    {
        case "accueil": 
            $listeArticles = obtenirArticles();
            $listeDernierArticle = obtenirDernierArticle();
            $liste2ArticlesUne = obtenir2ArticlesUne();
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
        case "seConnecter": 
            $titre = "Se connecter";
            require_once("vues/header.php");
            require("vues/connexion.php");
            require_once("vues/footer.php");
        break; 
        // Lecture d'un article
        case "article":
            // On vérifie s'il y a un get ID et s'il est numérique. S'il y en a pas, on redirige vers index
            if(!isset($_GET["idArticle"]) || !is_numeric($_GET["idArticle"]))
            {
                header("Location: index.php");
                die();
            }
            // On a besoin de la fonction articleID avec l'ID de l'article en paramètre
            $lireArticle = articleId($_GET["idArticle"]);
            // Si on a un résultat, alors on va chercher les pages pour lire un article, autrement, on redirige vers index
            if(mysqli_num_rows($lireArticle) > 0)
            {
                $titre = "Lire article";
                require_once("vues/header.php");
                require("vues/article.php");
                require_once("vues/footer.php");
                break; 
            }
            else 
            { 
                header("Location: index.php");
                die();
            }
        break;
        case "formModifArticle":
            // On vérifie s'il y a un get ID et s'il est numérique. S'il y en a pas, on redirige vers index
            if(!isset($_GET["idArticle"]) || !is_numeric($_GET["idArticle"]))
            {
                header("Location: index.php");
                die();
            }
            // On a besoin de la fonction articleID avec l'ID de l'article en paramètre
            $lireArticle = articleId($_GET["idArticle"]);
            // Si on a un résultat, alors on va chercher les pages pour modifier un article, autrement, on redirige vers index
            if(mysqli_num_rows($lireArticle) > 0)
            {
                $titre = "Modifier article";
                require_once("vues/header.php");
                require("vues/formModifArticle.php");
                require_once("vues/footer.php");
            }
            else 
            { 
                header("Location: index.php");
                die();
            }
        break;
        // On modifie l'article
        case "modifieArticle":
            //Si on a bien tous nos request, on supprime les espaces et ensuite on vérifie s'ils ne sont pas vides, si pas ok, on redirige vers le formulaire avec l'id en parametre
            if(isset($_REQUEST["date"], $_REQUEST["titre"], $_REQUEST["texte"], $_REQUEST["visuel"], $_REQUEST["id"], $_REQUEST["rubrique"]))
            { 
                $date = trim($_REQUEST["date"]);
                $titre = trim($_REQUEST["titre"]);
                $texte = trim($_REQUEST["texte"]);
                $visuel = trim($_REQUEST["visuel"]);
                $idArticle = $_REQUEST["id"];
                $rubrique = $_REQUEST["rubrique"];
                if($date != "" && $titre != "" && $texte != ""&& $rubrique != "" && $visuel != "" && is_numeric($idArticle))
                { 
                    // Si tout est ok, on va chercher notre fonction pour updater les nouvelles informations dans la table
                    $resultat = modifieArticle($date, $titre, $texte, $visuel, $idArticle, $rubrique);
                    $lireArticle = articleId($idArticle);
                    if(mysqli_num_rows($lireArticle) > 0)
                    {
                        $titre = "Lire article";
                        require_once("vues/header.php");
                        require("vues/article.php");
                        require_once("vues/footer.php");
                        break; 
                    }
                }
                else 
                {
                    header("Location: index.php?commande=formModifArticle&idArticle=$idArticle&message=Veuillez remplir correctement les champs.");
                    die();
                } 
            }
        break;
        case "formAjoutArticle":
            // on crée les valeurs vides dont on a besoin pour le formulaire au cas où celui-ci soit invalide. S'il y a des request, la valeur prend celle du request pour retourner dans le formulaire d'ajout
            $date = "";
            $titre = "";
            $texte = "";
            $visuel = "";
            $idJournaliste = "";
            $rubrique = "";
            if(isset($_REQUEST["date"])) 
                $date = $_REQUEST["date"]; 
            if(isset($_REQUEST["titre"])) 
                $titre = $_REQUEST["titre"]; 
            if(isset($_REQUEST["texte"])) 
                $texte = $_REQUEST["texte"];
            if(isset($_REQUEST["visuel"])) 
                $visuel = $_REQUEST["visuel"];
            if(isset($_REQUEST["idJournaliste"])) 
                $idJournaliste = $_REQUEST["idJournaliste"];
            if(isset($_REQUEST["rubrique"])) 
                $rubrique = $_REQUEST["rubrique"];
            $titre = "Ajouter un article";
            require_once("vues/header.php");
            require("vues/formAjoutArticle.php");
            require_once("vues/footer.php");
        break; 
        case "ajoutArticle":
            if(isset($_REQUEST["date"], $_REQUEST["titre"], $_REQUEST["texte"], $_REQUEST["visuel"], $_REQUEST["rubrique"]))
            { 
                $date = trim($_REQUEST["date"]);
                $titre = trim($_REQUEST["titre"]);
                $texte = trim($_REQUEST["texte"]);
                $visuel = trim($_REQUEST["visuel"]);
                $idJournaliste = trim($_REQUEST["idJournaliste"]);
                $rubrique = trim($_REQUEST["rubrique"]);
                if($date != "" && $titre != "" && $texte != "" && $rubrique != "" && $visuel != "" && $idJournaliste != "" && is_numeric($idJournaliste))
                {
                    $resultat = ajoutArticle($date, $titre, $texte, $visuel, $idJournaliste, $rubrique);
                    if($resultat)
                        afficheArticleAccueil("Ajout réussie.");
                    else 
                        afficheArticleAccueil("Aucun ajout effectué.");
               } 
                else 
                {
                    header("Location: index.php?commande=formAjoutArticle&message=Veuillez remplir correctement les champs.&date=$date&titre=$titre&texte=$texte&visuel=$visuel");
                    die();
                } 
            }
        break;
        case "supArticle": 
            // on vérifie si on a bien un request id
            if(!isset($_GET["idArticle"]) || !is_numeric($_GET["idArticle"]))
            {
                header("Location: index.php");
                die();
            }
            // On va chercher notre fonction pour supprimer l'article
            $resultat = supArticle($_GET["idArticle"]);
            if($resultat)
                afficheArticleAccueil("Suppression réussie.");
            else 
                afficheArticleAccueil("Aucune suppression effectuée.");
        break;  
        case "rechercheArticle":
            // Si une personne clique sur recherche sans inscrire de valeur, ou s'il n'y a pas de get recherche, alors on redirige vers la page d'accueil avec un message
            if(!isset($_GET["recherche"]) || $_GET["recherche"] == "")
            {
                header("Location: index.php?commande=accueil&message=Vous n'avez rien inscrit dans le champ de recherche.");
                die();
            }
            // On va chercher notre fonction de recherche avec en parametre la valeur recherchée
            $recherche = $_GET["recherche"];
            $rechercheArticle = rechercheArticle($_GET["recherche"]);
            // Si on a au moins un résultat alors on affiche la recherche, autrement on redirige vers la page d'accueil avec un message informant qu'il n'y a rien dans la base
            if(mysqli_num_rows($rechercheArticle) > 0)
            { 
                $titre = "Rechercher un article"; 
                require_once("vues/header.php");
                require("vues/rechercheArticle.php");
                require_once("vues/footer.php");
            }
            else 
            {
                header("Location: index.php?commande=accueil&message=Recherche Non fructueuse.");
                die();
            } 
        break; 
        // Si pas de commande, alors on redirige vers index
        default:
            header("Location: index.php");
            die();
    } 
    // Création d'une fonction qui affiche les articles dans la page d'accueil car plusieurs fois demandée
    function afficheArticleAccueil($message = "")
    {
        $listeArticles = obtenirArticles();
        $listeDernierArticle = obtenirDernierArticle();
        $liste2ArticlesUne = obtenir2ArticlesUne();
        $titre = "Accueil";
        require_once("vues/header.php");
        require("vues/accueil.php");
        require_once("vues/footer.php");
    } 
?>