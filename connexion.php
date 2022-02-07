<!DOCTYPE hmtl>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
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
                <p><a href="page_principal.php"><input type="submit" value="Acceuil"/></a></p>
                <div class="titre-left-2">
                    <p class="h1"><strong>AIDE</strong></p>
                </div>
                <a href="mailto:djellalyouvaa@gmail.com"><input type="submit" value="@Contact"></a>
            </aside>
            <section>
                <p class="titre2"><strong>Service d'authentification</strong></p>
                <fieldset id="auth">
                    <p>
                        <form method="post" action="connexion_ok.php">
                    </p>
                    <div class="form">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <input type="text" id="Login" class="Login" name="pseudo" autocomplete="off" placeholder="pseudo" required>
                    </div>
                    <div class="form">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input type="password" id="Password" class="Password" name="mdp" autocomplete="off" placeholder="Mot de passe" required>
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
