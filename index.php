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
        case "recherche": 
            $titre = "Rechercher";
            require_once("vues/header.php");
            require("vues/recherche.php");
            require_once("vues/footer.php");
            break; 
        case "seConnecter": 
            $titre = "Se connecter";
            require_once("vues/header.php");
            require("vues/connexion.php");
            require_once("vues/footer.php");
            break; 
        case "article":
            if(!isset($_GET["idArticle"]) || !is_numeric($_GET["idArticle"]))
            {
                header("Location: index.php");
                die();
            }
            $lireArticle = articleId($_GET["idArticle"]);
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
            if(!isset($_GET["idArticle"]) || !is_numeric($_GET["idArticle"]))
            {
                header("Location: index.php");
                die();
            }
            $lireArticle = articleId($_GET["idArticle"]);
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
        case "modifieArticle":
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
            break;
        }
        case "formAjoutArticle":
            $date = "";
            $titre = "";
            $texte = "";
            $visuel = "";
            $idJournaliste = "";
            $rubrique = "";
            //au cas ou le formulaire a déjà été rempli (il était invalide)
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
            //procéder à l'insertion et la validation
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
                    //insertion
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
            if(!isset($_GET["idArticle"]) || !is_numeric($_GET["idArticle"]))
            {
                header("Location: index.php");
                die();
            }
            $resultat = supArticle($_GET["idArticle"]);
            if($resultat)
            afficheArticleAccueil("Suppression réussie.");
                    else 
                    afficheArticleAccueil("Aucune suppression effectuée.");
            break;  
        case "rechercheArticle":
            if(!isset($_GET["recherche"]) || $_GET["recherche"] == "")
            {
                header("Location: index.php?commande=Accueil&message=Vous n'avez rien inscrit dans le champ de recherche.");
                die();
            }
            $recherche = $_GET["recherche"];
            $rechercheArticle = rechercheArticle($_GET["recherche"]);
            if(mysqli_num_rows($rechercheArticle) > 0)
            {
                
                $titre = "Rechercher un article"; 
                require_once("vues/header.php");
                require("vues/rechercheArticle.php");
                require_once("vues/footer.php");
            }
            else 
            {
                header("Location: index.php?commande=Accueil&message=Recherche Non fructueuse.");
                die();
            } 
            break; 
        
        default:
            header("Location: index.php");
            die();
    } 
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