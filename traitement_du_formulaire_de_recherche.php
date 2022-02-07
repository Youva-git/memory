<!DOCTYPE hmtl>
<html lang="fr">
<head>
     <meta charset="UTF-8">
     <title>Resultat De la Recherche</title> 
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
          <a href="page_principal.php"><input type="submit" value="Déconnexion"></a>
          <form method="post" action="formulaire_de_recherche.php">
            <input type="hidden"  name="id" value="youva">
            <input type="hidden" name="mdp" value="1234">
            <input type="submit" name="Rechrche" value="Nouvelle recherche"></p>
          </form>
          <div class="titre-left-2">
            <p class="h1"><strong>AIDE</strong></p>
          </div> 
          <a href="mailto:djellalyouvaa@gmail.com"><input type="submit" value="@Contact"></a>
       </aside>
<?php
 $nom = htmlspecialchars($_POST['Nom']);
 $prenom = htmlspecialchars($_POST['Prenom']);
 $date_de_naissance = htmlspecialchars($_POST['date_de_naissance']);
 if($nom == "" && $prenom == "" && $date_de_naissance == "")
 {
?>
      <section>
        <p class="titre2"><strong>Resultat de la rechrche</strong></p>
        <p><form method="post" action="formulaire_de_recherche.php"></p>
          <div class="red">
          <p>veuillez remplire au moins un champ !.</p>
            <input type="hidden"  name="id" value="youva">
            <input type="hidden" name="mdp" value="1234">
            <input type="submit" class="bouton" name="Rechrche" value="RESSAYEE"></p>
          </div>  
        </form> 
      </section>
      <footer>
        <p>Copyright &copy;Redouane Asma &copy;Youva Djellal -2019-2020- All Rights Reserved</p>
      </footer>
    </div>
  </div>
</body>
</html>

<?php
  exit(1);
 }
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

  $sql = $PDO->prepare("SELECT * FROM inscription WHERE nom LIKE '%".$nom."%' AND prenom LIKE '%".$prenom."%' AND date_de_naissance LIKE '%".$date_de_naissance."%' ORDER BY nom");
  $sql->execute();
  //nb de ligne contenu dans res_recherche
  $nbutilisateur = $sql->rowCount();

  if($nbutilisateur > 0)
  { 
?>
         <section>
            <table>
               <p class="titre2"><strong>Resultat de la rechrche</strong></p>
               <thead>
                  <tr>
                     <th>Nom</th>
                     <th>Prenom</th>
                     <th>Date de naissance </th>
                     <th>pseudo</th>
                     <th>Mot de passe</th>
                  </tr>
               </thead>
               <tbody>
<?php
      while($utilisateur = $sql->fetch(PDO::FETCH_ASSOC))
      {
         echo "<tr>\n";
         echo "<td>".$utilisateur["nom"]."</td>\n";
         echo "<td>".$utilisateur["prenom"]."</td>\n";
         echo "<td>".$utilisateur["date_de_naissance"]."</td>\n";
         echo "<td>".$utilisateur["pseudo"]."</td>\n";
         echo "<td>".$utilisateur["mot_de_passe"]."</td>\n";
         echo "</tr>\n";
      }
      echo "</tbody>";
      echo "</table>";
  }else {
    echo "<section>";
    echo '<p class="titre2"><strong>Resultat de la rechrche</strong></p>';
    echo '<div class="red">';
    echo "<p class='cen'>il n'y a pas de reponse correspondent a votre recherche.</p>";
    echo '</div>';
   echo "</section>";
 }
}
catch(PDOException $pe)
{
   echo 'ERREUR : '.$pe->getMessage();
}
?>
      <footer>
        <p>Copyright &copy;Youva Djellal 2019-2020- All Rights Reserved</p>
      </footer>
    </div>
  </div>
</body>
</html>

