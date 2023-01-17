<main>
    <section>
        <h1>Se connecter</h1>
        <p>Pour vous connecter, veuillez compléter le formulaire ci-dessous</p>
        <form method="POST" action="index.php">
            Votre identifiant : <input type="text" name="identifiant" value=""/><br>
            Votre mot de passe : <input type="password" name="motDePasse" value=""/><br>
            <input class="bouton" type="submit" name="btnSubmit" value="login"/>
            <input type="hidden" name="commande" value="connexion"/>
        </form>
        <span><?php if(isset($_REQUEST["message"])) echo $_REQUEST["message"]; ?></span>
    </section>
    <span><?php if(isset($message)) echo $message; ?></span><br><br><br><br><br><br><br>
</main>