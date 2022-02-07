<!DOCTYPE hmtl>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Le Jeu du Memory</title>
    <link href="style.css" rel="stylesheet">
</head>

<body>
  <div id="principal">
    <p><img src="pictures/picz.png" class="picture"></p>
    <div class="block1">
      <header>
        <p class="h1"><th>Le Jeu du Memory</th></p>
      </header>
      <aside>
        <div class="titre-left-2">
          <p class="h1"><strong>Menu Jeux</strong></p>
        </div> 
        <div class="boutons">
          <form method="post" action="projet.php">
              <input type="hidden" name="choice" value="<?= $_POST['choice']?>">
              <input type="hidden" name="prenom" value="<?= $_POST['prenom']?>">
              <input type="hidden" name="pseudo" value="<?= $_POST['pseudo']?>">
              <input type="hidden" name="mdp" value="<?= $_POST['mdp']?>">
              <input type="submit" name="cnx" value="Nouvelle partie">
           </form>
           <p><a href="meilleur_score.php"><input type="submit" value="Meilleur score"></a></p>
          <form method="post" action="connexion_ok.php">
              <input type="hidden" name="prenom" value="<?= $_POST['prenom']?>">
              <input type="hidden" name="pseudo" value="<?= $_POST['pseudo']?>">
              <input type="hidden" name="mdp" value="<?= $_POST['mdp']?>">
              <input type="submit" name="cnx" value="Changer de Niveau">
           </form>
            <form method="post" action="projet.php">
              <input type="hidden" name="prenom" value="<?= $_POST['prenom']?>">
              <input type="hidden" name="pseudo" value="<?= $_POST['pseudo']?>">
              <input type="hidden" name="mdp" value="<?= $_POST['mdp']?>">
              <input type="hidden" name="choice" value="<?= $_POST['choice']?>">
              <input type="hidden" name="objet" id="objet" value="">
              <input type="submit" name="save" value="sauvgarder"/>
            </form> 
          <p><a href="connexion.php"><input type="submit" value="Déconnexion"/></a></p>
        </div>
        <div class="titre-left-2">
          <p class="h1"><strong>AIDE</strong></p>
        </div>
        <a href="mailto:djellalyouvaa@gmail.com"><input type="submit" value="@Contact"></a>
      </aside>

      <section>
        <p class="titre2"><strong>Memory : Retrouver les paires d'images identiques</strong></p>
        <div class="text">
          <p><strong>Bonjour, <?= $_POST['prenom']?>.</strong></p>
          <p>Cliquez sur les cases pour trouver les paires de cartes portant des illustrations identiques.</p>
        </div>
        <div id="grille">
          <?php
           $choice = $_POST['choice'];
           $i = 0;
           while($i < $choice){
          ?>
          <div class="case" id="<?= "case$i"?>"></div>
          <?php
            $i += 1;
            }
          ?>
        </div>
        <div class="text">
          <div id="status"> </div>
          <p id="temps">Vous avez trois minutes, soit 180 secondes</p>
          <div id="score" value=""></div>
          <div id="difficulty" value="<?= $choice?>"></div>
<?php 
if(isset($_POST['save']) && !empty($_POST['objet']) || isset($_POST['reprendre']) ){
     $DB_DSN = 'mysql:host=localhost;dbname=inscription';
     $DB_USER = '';
     $DB_PASS = '';
      
    try{
      $options = 
      [
          PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_EMULATE_PREPARES => false
      ]; 

      $PDO = new PDO($DB_DSN, $DB_USER, $DB_PASS, $options);
      $pseudo = htmlspecialchars($_POST['pseudo']);
      $sql = $PDO->prepare("SELECT * FROM inscription WHERE pseudo LIKE '".$pseudo."'");
      $sql->execute();
      $nbutilisateur = $sql->rowCount();
      if($nbutilisateur != 1){
        exit(1);
      }
      else{
        if(isset($_POST['save'])){
          $objet = $_POST['objet'];
          $sql = $PDO->prepare("UPDATE inscription SET derniere_partie = '$objet' WHERE pseudo = '$pseudo'");  
          $sql1 = $PDO->prepare("UPDATE inscription SET difficulty = '$choice' WHERE pseudo = '$pseudo'");  
          $sql->execute();
          $sql1->execute();
          $inscrit_ok = $sql->execute();
          if(!$inscrit_ok){
           exit(1);
          }
        }else{
          $utilisateur = $sql->fetch(PDO::FETCH_ASSOC);
          $objet = $utilisateur["derniere_partie"];
          if($objet == '/'){
            echo "<section>";
            echo 'pas de partie en cours'; 
            echo "</section>";
            exit;
          }
        }
       }
     }
      catch(PDOException $pe){
        echo "fin";
          echo "<section>";
          echo 'ERREUR : '.$pe->getMessage();
          echo "</section>";
      }
  
      echo "<input type='hidden'  id='objetjs' value='$objet'>"
?>
 <script src="derniere_partie.js"></script>
<?php
}else{
?>
 <script src="projet.js"></script>
<?php  
}
?>
        </div>
       </section>
            <footer>
        <p>Copyright &copy;Youva Djellal 2019-2020- All Rights Reserved</p>
            </footer>
        </div>
    </div>
</body>
</html>

