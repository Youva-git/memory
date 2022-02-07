<!DOCTYPE hmtl>
<html lang="fr">
<head>
     <meta charset="UTF-8">
     <title>Formulaire De Recherche</title>  
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

      <?php if(isset($_POST['id']) && isset($_POST['mdp']) &&
        $_POST['id'] == "admin" && $_POST['mdp'] == "1234"){ ?>
        <a href="page_principal.php"><input type="submit" value="Déconnexion"></a>
        <div class="titre-left-2">
          <p class="h1"><strong>AIDE</strong></p>
      </div> 
      <a href="mailto:djellalyouvaa@gmail.com"><input type="submit" value="@Contact"></a>
      </aside>
      <section>
        <p class="titre2"><strong>Rechreche</strong></p>
        <p><form method="post" action="traitement_du_formulaire_de_recherche.php"></p>
          <p class="p-recherche"><strong>Rechercher un utilisateur par </strong></p>
          <p class="p-recherche" ><label for="rech"> Nom : </label><input id="rech" class="input-recherche"  type="search"  name="Nom" ></p>
          <p class="p-recherche" ><label for="rech"> Prenom : </label><input id="rech" class="input-recherche"  type="search"  name="Prenom" ></p>
          <p class="p-recherche" ><label for="rech"> Date de naissance : </label><input id="rech" class="input-recherche"  type="date"  name="date_de_naissance" ></p>
          <div class="cen">
            <input type="submit" class="bouton" name="Rechrche" value="Rechrche">
          </div>
        </form>
      </section>
      <?php }else{?>
                <a href="page_principal.php"><input type="submit" value="Acceuil"></a>
        <div class="titre-left-2">
          <p class="h1"><strong>AIDE</strong></p>
      </div> 
      <a href="mailto:djellalyouvaa@gmail.com"><input type="submit" value="@Contact"></a>
      </aside>
      <section>
        <p class="titre2"><strong>Resultat de la rechrche</strong></p>
        <p><form method="post" action="accesadmin.php"></p>
        <div class="red">
          <p>Mot de passe au Identifiant incorrect !.</p>
          <input type="submit" class="bouton" name="Rechrche" value="RESSAYEE"></p>
        </div>
        </form> 
      </section>
      <?php }?>
      <footer>
        <p>Copyright &copy;Youva Djellal 2019-2020- All Rights Reserved</p>
      </footer>
    </div>
  </div>
</body>
</html>
