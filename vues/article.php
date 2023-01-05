<main>
    <section class="article">
        
        <?php 
            while($rangee = mysqli_fetch_assoc($lireArticle))
            {
                echo "<p class=\"date\">" . htmlspecialchars($rangee["date"]) . " - ". htmlspecialchars(ucfirst($rangee["rubrique"])) . "</p>";
                echo "<h1>" . htmlspecialchars($rangee["titre"]) . "</h1>";
                echo "<img src=\"assets/img/articles/". htmlspecialchars($rangee["visuel"])."\" alt=\"". htmlspecialchars($rangee["titre"]) ."\">";
                echo "<p>" . $rangee["texte"] . "</p>";
                echo "<p class=\"auteur\">Journaliste : " . htmlspecialchars($rangee["journaliste"]) . "</p>";
                echo "<div class=\"iconeEdition\">
                <span class=\"material-symbols-outlined\"><a href=\"index.php?commande=supArticle&idArticle=".$rangee["articleId"]."\">delete</a></span>
                <span class=\"material-symbols-outlined\"><a href=\"index.php?commande=formModifArticle&idArticle=".$rangee["articleId"]."\">edit_note</a></span>
                </div>";
            }
        ?>
    </section>
    
</main>