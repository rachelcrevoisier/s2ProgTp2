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
?>