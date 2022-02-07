<?php
$DB_DSN = 'mysql:host=localhost;dbname=liste_inscrit';
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

  $sql = $PDO->prepare("SELECT * FROM liste ");
  $sql->execute();

}
catch(PDOException $pe)
{
   echo 'ERREUR : '.$pe->getMessage();
}
$nbutilisateur = $sql->rowCount();
?>
    <!DOCTYPE hmtl>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Meilleur Score</title>
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

  $sql = $PDO->prepare("SELECT * FROM inscription ORDER BY score");
  $sql->execute();
  //nb de ligne contenu dans res_recherche
  $nbutilisateur = $sql->rowCount();

  if($nbutilisateur > 0)
  { 
?>
                    <section>
                        <table>
                            <p class="titre2"><strong>Meilleur Score</strong></p>
                            <thead>
                                <tr>
                                    <th>Nom</th>
                                    <th>Prenom</th>
                                    <th>Date de naissance</th>
                                    <th>Le score</th>
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
         echo "<td>".$utilisateur["score"]."</td>\n";
         echo "</tr>\n";
      }
      echo "</tbody>";
      echo "</table>";
      echo "</section>";
  }else {
     echo "<section>";
      echo '<p class="titre2"><strong>Resultat de la rechrche</strong></p>';
      echo '<div class="red">';
      echo "<p class='cen'>VIDE !.</p>";
      echo '</div>';
    echo '</section>';
    echo ' <footer>';
    echo '   <p>Copyright &copy;Redouane Asma &copy;Youva Djellal -2019-2020- All Rights Reserved</p>';
    echo '  </footer>';
   echo ' </div>';
 echo ' </div>';

 }

}
catch(PDOException $pe)
{
   echo 'ERREUR : '.$pe->getMessage();
}
?>
    </body>

    </html>
