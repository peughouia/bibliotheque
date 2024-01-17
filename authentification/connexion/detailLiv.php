<?php
session_start();
$name = $_SESSION['username'];
include "../../config/Config.php";
if (!isset($_SESSION["id_users"])) {
  header("Location: ../connexion/connexion.php");
  exit();
}
$livre =  $_GET['id'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/head.css">
    <title>Detail livres</title>
</head>
<body>
<?php 
    include "../../menu/hearderUser.php"
    ?>
        <div class="container">
        <form method="POST" action="commentaire.php">
        <div class="gcard">
            <?php
            include "../../config/Config.php";
            $idlivre =  $_GET['id'];
            $requete = "SELECT * from livre WHERE id_livre =  $idlivre";
            $res = $con -> query($requete);
            $target_dir = "../../image/";
            while($row = $res -> fetch()){
        
        $target_file = $target_dir . $row["url_image"];   
        echo"<table>
        <tr>
        <td>
        <div class=\"card\">
        <img src=$target_file alt='Livre image'>
        </div>
        </td>
        <td>
        <div class=\"card-content\">
          <h2>Titre: ". $row["titre_livre"] . "</h2>
          <span> Auteur: </span><label>" . $row["auteur_livre"] . "</label><br><br>
          <span> Date de Publication: </span><label>" . $row["Date_publication"] . "</label><br><br>
          <span> Categorie du Livre: </span><label>" . $row["categorie_livre"] . "</label><br><br>
          <span>Description: </span><label>" . $row["description_livre"] . "<label> <br><br>
          <button class=\"btnconsulter\"><a href='afficher_document.php?id=" . $row['id_livre'] . "'>Télécharger " . $row['titre_livre'] . "</a></button>
      </div>
      </td>
      </tr>
      </table>
      ";   
    }
    ?>
    <div class="commentaire">
        <br><br>
        <h2>Commentaire</h2>
        <br><br>
        <div class="contain">
        <textarea type="text" class="comment" name="commentaire" placeholder="Ajoutez votre commentaire"></textarea>
        <input type="hidden" name="id_livre" value="<?php echo "$livre" ?>">
        <input type="submit" class="send" name="send" value="Send">
        </div>
        <br>
        <?php 
        include "../../config/Config.php";
        $idlivre =  $_GET['id'];
        $requete = "SELECT users.*,commentaire.*,livre.*
        FROM commentaire
        JOIN users ON  commentaire.id_user = users.id_users
        JOIN livre ON commentaire.id_livre = livre.id_livre
        WHERE commentaire.id_livre =  $idlivre";
        $res=$con->query($requete);
        while($row=$res->fetch()){
            if($name == $row["nom"]){
                $row["nom"]="me";
            }
        echo "
        <table>
        <tr>
        <td>
        <p>date: ".$row["date_Commentaire"]."</p>
        <span>".$row["nom"].": </span><label>".$row["commentaire"]."</label><br><br>
        </td>
        </tr></table>";
        }
        ?>
    </div>
          </div> 
        </form>
    </div>
</body>
</html>