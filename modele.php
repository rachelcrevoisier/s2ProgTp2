<?php 
/*
    Modele : Fichier avec infos connexion et les fonctions qui font appel à la base uiquement. Les autres fonctions vont dans le controleur (index)
*/
    //Connexion local
    /*
        define("SERVER", "localhost");
        define("USERNAME", "root");
        define("PASSWORD", "");
        define("DBNAME", "Nom de la base"); 
    */
    // connexion webdev
    define("SERVER", "localhost");
    define("USERNAME", "e2194722");
    define("PASSWORD", "o5I1EUZdCsIpbF50OubM");
    define("DBNAME", "e2194722");
    
    function connectDB()
    {
        //On vérifie que la connexion est ok autrement on affiche les erreurs
        $c = mysqli_connect(SERVER, USERNAME, PASSWORD, DBNAME);

        if(!$c)
            die("Erreur de connexion. MySQLi : " . mysqli_connect_error());
        // On met tut en UTF8
        mysqli_query($c, "SET NAMES 'utf8'");
        return $c;
    }
    $connexion = connectDB();
    // On peut commencer nos fonctions - Ne pas oublier global $connexion; dans chaque fonction
    function obtenirArticles()
    {
        // Info pour se connecter
        global $connexion;
        $requete = "SELECT s2tp2_articles.id, titre, texte, visuel, date, idJournaliste, rubrique FROM s2tp2_articles
        INNER JOIN s2tp2_journalistes ON s2tp2_journalistes.identifiant = s2tp2_articles.idJournaliste
        ORDER BY s2tp2_articles.date DESC limit 3,30";
        $resultats = mysqli_query($connexion, $requete);
        return $resultats;
    }
    function obtenirDernierArticle()
    {
        global $connexion;
        $requete = "SELECT s2tp2_articles.id, titre, texte, visuel, date, idJournaliste, rubrique FROM s2tp2_articles
        INNER JOIN s2tp2_journalistes ON s2tp2_journalistes.identifiant = s2tp2_articles.idJournaliste
        ORDER BY s2tp2_articles.date DESC limit 1";
        $resultats = mysqli_query($connexion, $requete);
        return $resultats;
    }
    function obtenir2ArticlesUne()
    {
        global $connexion;
        $requete = "SELECT s2tp2_articles.id, titre, texte, visuel, date, idJournaliste, rubrique FROM s2tp2_articles
        INNER JOIN s2tp2_journalistes ON s2tp2_journalistes.identifiant = s2tp2_articles.idJournaliste
        ORDER BY s2tp2_articles.date DESC limit 1,2";
        $resultats = mysqli_query($connexion, $requete);
        return $resultats;
    }
    function obtenirRubriques()
    {
        global $connexion;
        $requete = "SELECT rubrique FROM s2tp2_rubriques
        ORDER BY rubrique";
        $resultats = mysqli_query($connexion, $requete);
        return $resultats;
    }
    function articleId($id)
    {
        global $connexion;
        $requete = "SELECT s2tp2_articles.id AS articleId, titre, texte, visuel, rubrique, date, idJournaliste, CONCAT(prenom,' ', nom) AS journaliste, identifiant FROM s2tp2_articles
        INNER JOIN s2tp2_journalistes ON s2tp2_journalistes.identifiant = s2tp2_articles.idJournaliste
        WHERE s2tp2_articles.id=$id";
        $resultats = mysqli_query($connexion, $requete);
        return $resultats;
    }
    function modifieArticle($date, $titre, $texte, $visuel, $articleId, $rubrique)
    {
        global $connexion;
        //on prépare la requête en mettant des ? à la place des paramètres qui viennent de l'usager
        $requete = "UPDATE s2tp2_articles SET date = ?, titre = ?,  texte = ?, visuel = ?, rubrique = ? WHERE id = ?";
        $reqPrep = mysqli_prepare($connexion, $requete);
        //si la requête préparée fonctionne 
        if($reqPrep)
        { 
            // Si tout est ok, alors on donne les valeurs à chaque ?. S = texte - i = numerique
            mysqli_stmt_bind_param($reqPrep, "sssssi", $date, $titre,  $texte, $visuel, $rubrique, $articleId);
            //exécute la requête
            mysqli_stmt_execute($reqPrep);
            if(mysqli_stmt_affected_rows($reqPrep) >= 1)
                return true;
            else 
                return false;
        } 
    }
    function ajoutArticle($date, $titre, $texte, $visuel, $idJournaliste, $rubrique)
    {
        global $connexion;
        $requete = "INSERT INTO s2tp2_articles(date, titre, texte, visuel, idJournaliste, rubrique) VALUES (?, ?, ?, ?, ?, ?)";
        $reqPrep = mysqli_prepare($connexion, $requete);
        //si la requête préparée fonctionne 
        if($reqPrep)
        {
            mysqli_stmt_bind_param($reqPrep, "ssssss", $date, $titre, $texte, $visuel, $idJournaliste, $rubrique);
            mysqli_stmt_execute($reqPrep);
            if(mysqli_stmt_affected_rows($reqPrep) >= 1)
                return true;
            else 
                return false;
        }
    }
    function supArticle($id)
    {
        global $connexion;
        $requete = "DELETE FROM s2tp2_articles WHERE id = $id";
        $resultats = mysqli_query($connexion, $requete);
        if(mysqli_affected_rows($connexion) > 0)
            return true;
        else 
            return false;
    }
    function rechercheArticle($rechercheFaite)
    {
        global $connexion;
        $recherche = "%" . $rechercheFaite . "%";
        $requete = "SELECT s2tp2_articles.id, titre, texte, visuel, date, idJournaliste FROM s2tp2_articles
        INNER JOIN s2tp2_journalistes ON s2tp2_journalistes.identifiant = s2tp2_articles.idJournaliste
        WHERE titre like ? OR texte like ? OR rubrique like ?
        ORDER BY s2tp2_articles.date DESC";
        $reqPrep = mysqli_prepare($connexion, $requete);
        if($reqPrep)
        {
            mysqli_stmt_bind_param($reqPrep, "sss",  $recherche, $recherche, $recherche);
            mysqli_stmt_execute($reqPrep);
            $resultats = mysqli_stmt_get_result($reqPrep);
        }
        return $resultats;
    }
?>