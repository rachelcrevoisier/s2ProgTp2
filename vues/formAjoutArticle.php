<main>
    <section>
        <h1>Ajouter un article</h1>
        <form method="POST" action="index.php">
        Date : <input type="date" name="date" value="<?= $date ?>"/><br>
        Titre : <input type="text" name="titre" value="<?= $titre ?>"  size="70"><br><br>
        Texte : <textarea name="texte" cols="90" rows="50"><?=$texte?></textarea><br><br>
        Visuel : <input type="text" name="visuel" value="<?= $visuel ?>" size="70"><br>
        idJournalite : <input type="number" name="idJournaliste" value="<?= $idJournaliste ?>"/><br>
        Rubrique : 
    <select name="rubrique">
    <?php
    $rubriques = obtenirRubriques();
        while($rangeeRubrique = mysqli_fetch_assoc($rubriques))
        {
            if($rubrique == $rangeeRubrique["rubrique"])
                echo "<option selected value='" . $rangeeRubrique["rubrique"] . "'>" . htmlspecialchars($rangeeRubrique["rubrique"]). "</option>"; 
            else 
                echo "<option value='" . $rangeeRubrique["rubrique"] . "'>" . htmlspecialchars($rangeeRubrique["rubrique"]). "</option>"; 
        }
    ?>
    </select>
        <input type="submit" value="Publier"/>
        <input type="hidden" name="commande" value="ajoutArticle"/>
        </form>
<span><?php if(isset($_REQUEST["message"])) echo $_REQUEST["message"]; ?></span>
    </section>
</main>