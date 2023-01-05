<main>
    <span><?php if(isset($message)) echo $message; ?></span>
    <section class="articlesUnes">
    
        <div class="article1">
            <?php 
                while($rangee = mysqli_fetch_assoc($listeDernierArticle))
                {
                    echo "<a href=\"index.php?commande=article&idArticle=".$rangee["id"]."\"> <img src=\"assets/img/articles/". htmlspecialchars($rangee["visuel"])."\" alt=\"". htmlspecialchars($rangee["titre"]) ."\">";
                    echo "<h3>" . htmlspecialchars($rangee["titre"]) . "</h3></a>";
                }
            ?>
        </div>
        <div class="articles2et3">
            <?php 
                while($rangee = mysqli_fetch_assoc($liste2ArticlesUne))
                {
                    echo "<a href=\"index.php?commande=article&idArticle=".$rangee["id"]."\"> <img src=\"assets/img/articles/". htmlspecialchars($rangee["visuel"])."\" alt=\"". htmlspecialchars($rangee["titre"]) ."\">";
                    echo "<h3>" . htmlspecialchars($rangee["titre"]) . "</h3></a>";
                }
            ?>
        </div>
    </section>
    
    <div class="grille-presentation">
   
        <?php 
                while($rangee = mysqli_fetch_assoc($listeArticles))
                {
                    echo "<a href=\"index.php?commande=article&idArticle=".$rangee["id"]."\"> <img src=\"assets/img/articles/". htmlspecialchars($rangee["visuel"])."\" alt=\"". htmlspecialchars($rangee["titre"]) ."\">";
                    echo "<h3>" . htmlspecialchars($rangee["titre"]) . "</h3></a>";
                }
            ?>
      
            </div>

</main>