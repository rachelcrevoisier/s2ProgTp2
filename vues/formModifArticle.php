<main>
    <section>
        <?php 
            $rangeeArticle = mysqli_fetch_assoc($lireArticle);
            $date = htmlspecialchars($rangeeArticle["date"]);
            $titre = htmlspecialchars($rangeeArticle["titre"]);
            $texte = htmlspecialchars($rangeeArticle["texte"]);
            $visuel = htmlspecialchars($rangeeArticle["visuel"]);
            $idArticle = htmlspecialchars($rangeeArticle["articleId"]);
            $rubrique = htmlspecialchars($rangeeArticle["rubrique"]);
            
        ?>
    <h1>Formulaire de modification d'un article</h1>
    <form method="POST" action="index.php">
        Date : <input type="date" name="date" value="<?= $date ?>"/><br>
        Titre : <input type="text" name="titre" value="<?= $titre ?>"  size="70"><br><br>
        Texte : <textarea name="texte" cols="90" rows="50"><?=$texte?></textarea><br><br>
        Visuel : <input type="text" name="visuel" value="<?= $visuel ?>" size="70"><br>
        Rubrique : <select name="rubrique">
    <?php
    
        while($rangeeRubrique = mysqli_fetch_assoc($rubriques))
        {
            if($rubrique == $rangeeRubrique["rubrique"])
                echo "<option selected value='" . $rangeeRubrique["rubrique"] . "'>" . htmlspecialchars($rangeeRubrique["rubrique"]). "</option>"; 
            else 
                echo "<option value='" . $rangeeRubrique["rubrique"] . "'>" . htmlspecialchars($rangeeRubrique["rubrique"]). "</option>"; 
        }
    ?>
    </select>
        <input type="hidden" name="id" value="<?= $idArticle ?>"/>
        <input type="submit" value="Modifier"/>
        <input type="hidden" name="commande" value="modifieArticle"/>
    </form>
    <span><?php if(isset($_REQUEST["message"])) echo $_REQUEST["message"]; ?></span>
    </section>
</main>