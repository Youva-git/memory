<!DOCTYPE hmtl>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link href="style.css" rel="stylesheet">
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
<?php
 $DB_DSN = 'mysql:host=localhost;dbname=inscription';
 $DB_USER = 'root';
 $DB_PASS = 'passe';

try
{
  $options = 
  [
     PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
     PDO::ATTR_EMULATE_PREPARES => false
  ]; 

  $PDO = new PDO($DB_DSN, $DB_USER, $DB_PASS, $options);
  if(isset ($_POST['cnx'])){
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $mdp = htmlspecialchars($_POST['mdp']);
  $sql = $PDO->prepare("SELECT * FROM inscription WHERE pseudo LIKE '".$pseudo."'");
  $sql->execute();
  $nbutilisateur = $sql->rowCount();
  if($nbutilisateur == 1){ 
  $utilisateur = $sql->fetch(PDO::FETCH_ASSOC);
  $hashpass = $utilisateur["mot_de_passe"];
  $difficulty = $utilisateur["difficulty"];
  if(password_verify($mdp, $hashpass)){
      $prenom = $utilisateur["prenom"];
?>
      <a href="connexion.php"><input type="submit" value="Déconnexion"></a>
        <form method="post" action="projet.php">
              <input type="hidden" name="prenom" value="<?= $prenom?>">
              <input type="hidden" name="pseudo" value="<?= $pseudo?>">
              <input type="hidden" name="mdp" value="<?= $mdp?>">
              <input type="hidden" id="difficulty" name="choice" value="<?= $difficulty?>">
              <input type="submit" name="reprendre" value="Reprendre !"></p>
        </form> 
      </aside>
      <section>
        <p class="titre2"><strong>BIENVENUE <?= $prenom?></strong></p>
          <form method="post" action="projet.php">
              <p>Coisissez le niveaux de difficulté</p>
              <p>Facile    <input class="choice" type="radio" name="choice" value="8" required></p>
              <p>Moyen     <input class="choice" type="radio" name="choice" value="16"></p> 
              <p>Difficile <input class="choice" type="radio" name="choice" value="32"></p>
              <input type="submit" class="bouton" name="Nouvelle" value="Nouvelle partie !"></p>
              <input type="hidden" name="prenom" value="<?= $prenom?>">
              <input type="hidden" name="pseudo" value="<?= $pseudo?>">
              <input type="hidden" name="mdp" value="<?= $mdp?>">
        </form> 
     </section>

<?php
}else{ 

?>

          <p><a href="page_principal.php"><input type="submit" value="Acceuil"/></a></p>
          <div class="titre-left-2">
          <p class="h1"><strong>AIDE</strong></p>
            </div>
          <a href="mailto:djellalyouvaa@gmail.com"><input type="submit" value="@Contact"></a>
      </aside>
   <section>
     
         <p class="titre2"><strong>Erreur D'authentification</strong></p>
          <fieldset id="auth">
          <p><form method="post" action="connexion_ok.php"></p>
           <div class="form">
          <i class="fa fa-user" aria-hidden="true"></i>
          <input type="text" id="Login" class="Login"  name="pseudo" value="<?=$pseudo?>" autocomplete="off" placeholder="pseudo" required>
                    </div>
          <div class="form">
          <i class="fa fa-lock" aria-hidden="true"></i>
            <input type="password" id="Password" class="Password" name="mdp" autocomplete="off" placeholder="Mot de passe incorrect !." required>
                    </div>
          <div class="cen">
          <input type="submit" name="cnx" value="connexion" class="connexion">
          </div>
            </form>  
      </fieldset>
      </section>
<?php
 }
}else{
?>

                <p><a href="page_principal.php"><input type="submit" value="Acceuil"></a></p>
          <div class="titre-left-2">
          <p class="h1"><strong>AIDE</strong></p>
            </div>
          <a href="mailto:djellalyouvaa@gmail.com"><input type="submit" value="@Contact"></a>
      </aside>
      </aside>
        </aside>
        <section>
        <p class="titre2"><strong>Erreur D'authentification</strong></p>
          <fieldset id="auth">
          <p><form method="post" action="connexion_ok.php"></p>
           <div class="form">
          <i class="fa fa-user" aria-hidden="true"></i>
          <input type="text" id="Login" class="Login"  name="pseudo" autocomplete="off" placeholder="Pseudo incorrect !." required>
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
        <p>Copyright &copy;Redouane Asma &copy;Youva Djellal -2019-2020- All Rights Reserved</p>
      </footer>
    </div>
  </div>
</body>
</html>
  <?php
  exit();
 }
}
  if (isset($_POST['inscrire'])){
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $date_de_naissance = htmlspecialchars($_POST['date']);
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mot_de_passe = htmlspecialchars($_POST['mdp']);
    $vide = "/";

    $sql1 = $PDO->prepare("SELECT * FROM inscription WHERE nom LIKE '".$nom."' AND prenom LIKE '".$prenom."' AND date_de_naissance LIKE '".$date_de_naissance."'");
    $sql2 = $PDO->prepare("SELECT * FROM inscription WHERE pseudo LIKE '".$pseudo."'");
    $sql1->execute();
    $sql2->execute();
    $nbutilisateur = $sql1->rowCount();
    $p_seudo = $sql2->rowCount();
    if($nbutilisateur == 1){
      
?>    
        <a href="page_principal.php"><input type="submit" value="Accueil"></a>
        <a href="connexion.php"><input type="submit" value="Connexion"></a>
        </aside>
        <section>
          <p class="titre2"><strong>inscreption</strong></p>
          <div class="green">
            <p class="cen">vous etes déja inscrit !</p>
          </div>
          </section>
      <footer>
        <p>Copyright &copy;Youva Djellal 2019-2020- All Rights Reserved</p>
      </footer>
    </div>
  </div>
</body>
</html>
<?php
  exit();
  } 
  if($p_seudo != 0){
?>
        <a href="page_principal.php"><input type="submit" value="Accueil"></a>
        </aside>
      </aside>
      <section>
        <p class="titre2"><strong>Erreur d'inscription</strong></p>
        <fieldset>   
          <p>(* : Champs obligatoires)</p>             
          <p><form method="post" action="connexion_ok.php"></p>
            <p class="p-formulaire">
              <label for="name">Nom *</label><p class="p-formulaire">Entrez votre nom de famille</p>
              <input id="name" class="input-formulaire" type="texte" value="<?= $nom?>" name="nom" autocomplete="off" required>
            </p>
            <p class="p-formulaire">
              <label for="username">Prenom *</label><p class="p-formulaire">Entrez votre prenom</p>
              <input id="username" class="input-formulaire" type="texte" value="<?= $prenom?>" name="prenom" autocomplete="off" required>
            </p>
            <p class="p-formulaire">
              <label for="date_input">Date de naissance *</label><p class="p-formulaire">Entrez votre date de naissance</p>
              <input id="date_input" class="input-formulaire" value="<?= $date_de_naissance?>" type="date" name="date">          
            </p>
            <p class="p-formulaire">
              <label for="or">Pseudo *</label><p class="p-formulaire">Pseudo</p>
              <input id="or" class="input-formulaire" type="texte"  name="pseudo" autocomplete="off" placeholder="Pseudo déjà pris !." required>
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
<?php
  }else{

  $option =['cost'=>12,];
  $hashpass = password_hash($mot_de_passe,PASSWORD_BCRYPT,$option);
  $sql = $PDO->prepare('INSERT INTO inscription VALUES (:nom, :prenom, :date_de_naissance, :pseudo, :mot_de_passe, :score, :derniere_partie, :difficulty)');  
  $sql->bindValue(':nom', $nom);
  $sql->bindValue(':prenom', $prenom);
  $sql->bindValue(':date_de_naissance', $date_de_naissance);
  $sql->bindValue(':pseudo', $pseudo);
  $sql->bindValue(':mot_de_passe', $hashpass);
  $sql->bindValue(':derniere_partie', $vide);
  $sql->bindValue(':score', $vide);
  $sql->bindValue(':difficulty', $vide);
  $inscrit_ok = $sql->execute();

  
  if($inscrit_ok)
  {
   ?>
    <a href="connexion.php"><input type="submit" value="Déconnexion"></a>
    </aside>
   <section>
   <p class="titre2"><strong>BIENVENUE <?= $prenom?>, votre inscription a bien été enregistrée</strong></p>
          <form method="post" action="projet.php">
              <p>Coisissez le niveaux de difficulté</p>
              <p>Facile    <input class="choice" type="radio" name="choice" value="8" required></p>
              <p>Moyen     <input class="choice" type="radio" name="choice" value="16"></p> 
              <p>Difficile <input class="choice" type="radio" name="choice" value="32"></p>
              <input type="hidden" name="prenom" value="<?= $_POST['prenom']?>">
              <input type="hidden" name="pseudo" value="<?= $_POST['pseudo']?>">
              <input type="hidden" name="mdp" value="<?= $_POST['mdp']?>">
              <input type="submit" class="bouton" name="Nouvelle" value="Nouvelle partie!"></p>
        </form>
        </section> 
   <?php
    }
   }
  }
 }
 catch(PDOException $pe)
  {
     echo "<section>";
     echo '<p class="titre2"><strong>inscreption</strong></p>';
     echo 'ERREUR : '.$pe->getMessage();
     echo "</section>";
  }

?>
      <footer>
        <p>Copyright &copy;Youva Djellal 2019-2020- All Rights Reserved</p>
      </footer>
    </div>
  </div>
</body>
</html>
