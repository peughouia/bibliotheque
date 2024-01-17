<?php
session_start();
if (!isset($_SESSION["id_users"])) {
  header("Location: ../connexion/connexion.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/new.css">
    <title>livres MyBiblio</title>
</head>
<body>
<?php
        include "../../menu/hearderAdmin.php";
    ?>
    <div class="container">
      <div class="cont">
    <table>
                        <thead>
                           <tr>
                              <th>Titres</th>
                              <th>Auteurs</th>
                              <th>categories</th>
                              <th>Description</th>
                              <th>Date pub</th>
                              <th>couverture</th>
                              <th>Action</th>
                              <th>Action</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php
                                  include "../../config/Config.php";
                                  $req_listclient="SELECT * FROM `livre`";
                                  //execution de la requete
                                  $res=$con->query($req_listclient);
                                  while($row=$res->fetch()){
                                    ?>    
                           <tr>
                              <td><?php echo $row["titre_livre"]?></td>
                              <td><?php echo $row["auteur_livre"]?></td>
                              <td><?php echo $row["categorie_livre"]?></td>
                              <td><?php echo $row["description_livre"]?></td>
                              <td><?php echo $row["Date_publication"]?></td>  
                              <td><?php echo "<img src=\"../../image/".$row["url_image"]."\" width=\"55\">"?></td>
                              <td><button class="btnModif">Edit</button></td>
                              <td><button class="btndel">
                              <?php echo "<a href=\"./deleteLivre.php?id=" . $row["id_livre"] . ";\">Supp</a>"?>
                              </button></td>
                           </tr>
                      <?php
                                  }
                      ?>
                           </tbody> 
                      </table>
      </div>
    </div>
</body>
</html>