<!DOCTYPE hmtl>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="style.css"> 
  <title>Inscreption</title> 
</head>
<body>
    <div id="principal">
      <p><img src="pictures/picz.png" class="picture"></p>
      <div class="block1">
        <aside>
          <div class="titre-left-1">
            <p class="h1"><strong>MENU PRINCIPAL</strong></p>	 
          </div> 
          <a href="page_principal.php"><input type="submit" value="Accueil"></a>
          <div class="titre-left-2">
            <p class="h1"><strong>AIDE</strong></p>
          </div> 	
          <a href="mailto:djellalyouvaa@gmail.com"><input type="submit" value="@Contact"></a>
       </aside>
       <section>
        <p class="titre2"><strong>Inscription</strong></p>
        <p>Merci de remplir le formulaire ci-dessous pour vous inscrire...</p>
        <fieldset>   
          <p>(* : Champs obligatoires)</p>             
          <p><form method="post" action="connexion_ok.php"></p>
            <p class="p-formulaire">
              <label for="name">Nom *</label><p class="p-formulaire">Entrez votre nom de famille</p>
              <input id="name" class="input-formulaire" type="texte"  name="nom" autocomplete="off" required>
            </p>
            <p class="p-formulaire">
              <label for="username">Prenom *</label><p class="p-formulaire">Entrez votre prenom</p>
              <input id="username" class="input-formulaire" type="texte"  name="prenom" autocomplete="off" required>
            </p>
            <p class="p-formulaire">
              <label for="date_input">Date de naissance *</label><p class="p-formulaire">Entrez votre date de naissance</p>
              <input id="date_input" class="input-formulaire" type="date" name="date">          
            </p>
            <p class="p-formulaire">
              <label for="or">Pseudo *</label><p class="p-formulaire">Pseudo</p>
              <input id="or" class="input-formulaire" type="texte"  name="pseudo" autocomplete="off" required>
            </p>
            <p class="p-formulaire">
              <label for="mdp">Mot de passe *</label><p class="p-formulaire"></p>
              <input id="password" class="input-formulaire" type="password"  name="mdp" required>
            </p>
            <div class="cen">
            <input class="bouton" type="submit" name="inscrire" value="S'INSCRIRE">
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
