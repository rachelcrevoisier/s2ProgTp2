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
        //se connecter à la base de données
        $c = mysqli_connect(SERVER, USERNAME, PASSWORD, DBNAME);

        if(!$c)
            die("Erreur de connexion. MySQLi : " . mysqli_connect_error());
        //s'assurer que la connexion traite le UTF8
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
        INNER JOIN s2tp2_journalistes ON s2tp2_journalistes.id = s2tp2_articles.idJournaliste
        ORDER BY s2tp2_articles.date DESC limit 3,30";
        //exécuter avec mysqli_query
        $resultats = mysqli_query($connexion, $requete);
        return $resultats;
    }
    function obtenirDernierArticle()
    {
        // Info pour se connecter
        global $connexion;
        $requete = "SELECT s2tp2_articles.id, titre, texte, visuel, date, idJournaliste, rubrique FROM s2tp2_articles
        INNER JOIN s2tp2_journalistes ON s2tp2_journalistes.id = s2tp2_articles.idJournaliste
        ORDER BY s2tp2_articles.date DESC limit 1";
        //exécuter avec mysqli_query
        $resultats = mysqli_query($connexion, $requete);
        return $resultats;
    }
    function obtenir2ArticlesUne()
    {
        // Info pour se connecter
        global $connexion;
        $requete = "SELECT s2tp2_articles.id, titre, texte, visuel, date, idJournaliste, rubrique FROM s2tp2_articles
        INNER JOIN s2tp2_journalistes ON s2tp2_journalistes.id = s2tp2_articles.idJournaliste
        ORDER BY s2tp2_articles.date DESC limit 1,2";
        //exécuter avec mysqli_query
        $resultats = mysqli_query($connexion, $requete);
        return $resultats;
    }
    function articleId($id)
    {
        // Info pour se connecter
        global $connexion;
        $requete = "SELECT s2tp2_articles.id AS articleId, titre, texte, visuel, rubrique, date, idJournaliste, CONCAT(prenom,' ', nom) AS journaliste, identifiant FROM s2tp2_articles
        INNER JOIN s2tp2_journalistes ON s2tp2_journalistes.id = s2tp2_articles.idJournaliste
        WHERE s2tp2_articles.id=$id";
        //exécuter avec mysqli_query
        $resultats = mysqli_query($connexion, $requete);
        return $resultats;
    }
    function modifieArticle($date, $titre, $texte, $visuel, $articleId)
    {
        global $connexion;
        //on prépare la requête en mettant des ? à la place des paramètres qui viennent de l'usager
        $requete = "UPDATE s2tp2_articles SET date = ?, titre = ?,  texte = ?, visuel = ? WHERE id = ?";

        //on prépare la requête
        $reqPrep = mysqli_prepare($connexion, $requete);
        //si la requête préparée fonctionne 
        if($reqPrep)
        { 
            //faire le lien
            mysqli_stmt_bind_param($reqPrep, "ssssi", $date, $titre,  $texte, $visuel, $articleId);
            //exécute la requête
            mysqli_stmt_execute($reqPrep);
        
            if(mysqli_stmt_affected_rows($reqPrep) >= 1)
                return true;
            else 
                return false;
         } 
    }
    function ajoutArticle($date, $titre, $texte, $visuel, $idJournaliste)
    {
        //obtenir la connexion définie plus haut (à l'extérieur de la fonction)
        global $connexion;

        //on prépare la requête en mettant des ? à la place des paramètres qui viennent de l'usager
        $requete = "INSERT INTO s2tp2_articles(date, titre, texte, visuel, idJournaliste) VALUES (?, ?, ?, ?, ?)";

        //on prépare la requête
        $reqPrep = mysqli_prepare($connexion, $requete);
        //si la requête préparée fonctionne 
        if($reqPrep)
        {
            //faire le lien
            mysqli_stmt_bind_param($reqPrep, "ssssi", $date, $titre, $texte, $visuel, $idJournaliste);
            //exécute la requête
            mysqli_stmt_execute($reqPrep);
        
            if(mysqli_stmt_affected_rows($reqPrep) >= 1)
                return true;
            else 
                return false;
        }
    }
    function supArticle($id)
    {
        //obtenir la connexion définie plus haut (à l'extérieur de la fonction)
        global $connexion;

        //déclarer la requête SQL à exécuter (TESTER DANS PHPMYADMIN AVANT)
        $requete = "DELETE FROM s2tp2_articles WHERE id = $id";
        //exécuter avec mysqli_query
        $resultats = mysqli_query($connexion, $requete);
        
        if(mysqli_affected_rows($connexion) > 0)
            return true;
        else 
            return false;
    }
    function rechercheArticle($rechercheFaite)
    {
        //obtenir la connexion définie plus haut (à l'extérieur de la fonction)
        global $connexion;

        $recherche = "%" . $rechercheFaite . "%";

        //on prépare la requête en mettant des ? à la place des paramètres qui viennent de l'usager
        $requete = "SELECT s2tp2_articles.id, titre, texte, visuel, date, idJournaliste FROM s2tp2_articles
        INNER JOIN s2tp2_journalistes ON s2tp2_journalistes.id = s2tp2_articles.idJournaliste
        
        WHERE titre like ? OR texte like ?
        ORDER BY s2tp2_articles.date DESC";

        //on prépare la requête
        $reqPrep = mysqli_prepare($connexion, $requete);
        //si la requête préparée fonctionne 
        if($reqPrep)
        {
            //faire le lien
            mysqli_stmt_bind_param($reqPrep, "ss",  $recherche, $recherche);
            //exécute la requête
            mysqli_stmt_execute($reqPrep);
        
            //obtenir le résultat
            $resultats = mysqli_stmt_get_result($reqPrep);
        }
        return $resultats;
    }
?>