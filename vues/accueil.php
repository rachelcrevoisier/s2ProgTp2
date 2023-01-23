<main>
<span><?php if(isset($message)) echo $message; ?></span>
<span><?php if(isset($_REQUEST["message"])) echo $_REQUEST["message"]; ?></span>
    <section class="articlesUnes">
    
        <div class="article1">
            <?php 
                while($rangee = mysqli_fetch_assoc($listeDernierArticle))
                {
                    echo "<a href=\"index.php?commande=article&idArticle=".$rangee["id"]."\"> <img src=\"assets/img/articles/". htmlspecialchars($rangee["visuel"])."\" alt=\"". htmlspecialchars($rangee["titre"]) ."\">";
                    echo "<h3>" . htmlspecialchars($rangee["titre"]) . "<br><span class=\"date\">" . htmlspecialchars($rangee["date"]) . "</span></a>";
                    if(isset($_SESSION["username"]) && $rangee["idJournaliste"]==$_SESSION["username"])
                    {
                        echo "
                        <span class=\"material-symbols-outlined\"><a href=\"index.php?commande=supArticle&idArticle=".$rangee["id"]."&idJournaliste=".$rangee["idJournaliste"]."\">delete</a></span>
                        <span class=\"material-symbols-outlined\"><a href=\"index.php?commande=formModifArticle&idArticle=".$rangee["id"]."&idJournaliste=".$rangee["idJournaliste"]."\">edit_note</a></span></h3>
                        ";
                    }
                }
            ?>
        </div>
        <div class="articles2et3">
            <?php 
                while($rangee = mysqli_fetch_assoc($liste2ArticlesUne))
                {
                    echo "<h3><a href=\"index.php?commande=article&idArticle=".$rangee["id"]."\"> <img src=\"assets/img/articles/". htmlspecialchars($rangee["visuel"])."\" alt=\"". htmlspecialchars($rangee["titre"]) ."\"><br>";
                    echo htmlspecialchars($rangee["titre"]) . "<br><span class=\"date\">" . htmlspecialchars($rangee["date"]) . "</span></a>";
                    if(isset($_SESSION["username"]) && $rangee["idJournaliste"]==$_SESSION["username"])
                    {
                        echo "
                        <span class=\"material-symbols-outlined\"><a href=\"index.php?commande=supArticle&idArticle=".$rangee["id"]."&idJournaliste=".$rangee["idJournaliste"]."\">delete</a></span>
                        <span class=\"material-symbols-outlined\"><a href=\"index.php?commande=formModifArticle&idArticle=".$rangee["id"]."&idJournaliste=".$rangee["idJournaliste"]."\">edit_note</a></span></h3>
                        ";
                    }
                }
            ?>
        </div>
    </section>

    <section class="autresArticles">
        
        <?php 
                while($rangee = mysqli_fetch_assoc($listeArticles))
                {
                    echo "<div class=\"articlesAccueil\">";
                    echo "<a href=\"index.php?commande=article&idArticle=".$rangee["id"]."\"> <img src=\"assets/img/articles/". htmlspecialchars($rangee["visuel"])."\" alt=\"". htmlspecialchars($rangee["titre"]) ."\">";
                    echo "<h3>" . htmlspecialchars($rangee["titre"]) . "<br><span class=\"date\">" . htmlspecialchars($rangee["date"]) . "</span></a>";
                    if(isset($_SESSION["username"]) && $rangee["idJournaliste"]==$_SESSION["username"])
                    {
                        echo "
                        <br><span class=\"material-symbols-outlined\"><a href=\"index.php?commande=supArticle&idArticle=".$rangee["id"]."&idJournaliste=".$rangee["idJournaliste"]."\">delete</a><a href=\"index.php?commande=formModifArticle&idArticle=".$rangee["id"]."&idJournaliste=".$rangee["idJournaliste"]."\">edit_note</a></span>
                        ";
                    }
                    echo "</h3></div>";
                }
            ?>
        
        
      
    </section>
           
</main>