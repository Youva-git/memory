<!DOCTYPE hmtl>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Acces Admin</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div id="principal">
        <p><img src="pictures/picz.png" class="picture"></p>
        <div class="block1">

            <header>
            </header>

            <aside class="item">
                <div class="titre-left-1">
                    <p class="h1"><strong>MENU PRINCIPAL</strong></p>
                </div>
                <a href="page_principal.php"><input type="submit" value="Accueil"></a>
                <a href="connexion.php"><input type="submit" value="Connexion"></a>
                <a href="meilleur_score.php"><input type="submit" value="Meilleur score"></a>
                <a href="formulaire_d_inscription.php"><input type="submit" value="Inscription"></a>
                <a href="accesadmin.php"><input type="submit" value="Acces Admin"></a>
                <div class="titre-left-2">
                    <p class="h1"><strong>AIDE</strong></p>
                </div>
                <a href="mailto:djellalyouvaa@gmail.com"><input type="submit" value="@Contact"></a>
            </aside>

            <section>
                <p class="titre2"><strong>Service d'authentification</strong></p>
                <fieldset id="auth">
                    <p>
                        <form method="post" action="formulaire_de_recherche.php">
                    </p>
                    <div class="form">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" class="Login" name="id" autocomplete="off" placeholder="Nom d'utilisateur" required>
                    </div>
                    <div class="form">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input type="password" class="Password" name="mdp" autocomplete="off" placeholder="Mot de passe" required>
                    </div>
                    <div class="cen">
                        <input type="submit" name="cnx" value="connexion" class="connexion">
                    </div>
                    </form>
                </fieldset>
            </section>
            <footer>
        <p>Copyright &copy;Youva Djellal 2019-2020- All Rights Reserved</p>
            </footer>
        </div>
    </div>
</body>

</html>
