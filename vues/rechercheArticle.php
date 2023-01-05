<main>
    <span><?php if(isset($message)) echo $message; ?></span>

    
    <div class="grille-presentation">
   
        <?php 
                while($rangee = mysqli_fetch_assoc($rechercheArticle))
                {
                    echo "<a href=\"index.php?commande=article&idArticle=".$rangee["id"]."\"> <img src=\"assets/img/articles/". htmlspecialchars($rangee["visuel"])."\" alt=\"". htmlspecialchars($rangee["titre"]) ."\">";
                    echo "<h3>" . htmlspecialchars($rangee["titre"]) . "</h3></a>";
                }
            ?>
      
            </div>

</main>