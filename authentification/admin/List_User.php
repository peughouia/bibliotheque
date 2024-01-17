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
    <link rel="stylesheet" href="../../styles/stylesUser.css">

    <title>membre MyBiblio</title>
</head>
<body>
    <?php
    include "../../menu/hearderAdmin.php"
    ?>
    <form>
    <div class="container">
    <div class="cont">
    <table>
                        <thead>
                           <tr>
                              <th>Nom</th>
                              <th>Email</th>
                              <th>Telephone</th>
                           </tr>
                        </thead>
                        <tbody>
                        <?php
                                  include "../../config/Config.php";
                                  $req_listclient="SELECT * FROM users";
                                  //execution de la requete
                                  $res=$con->query($req_listclient);
                                  while($row=$res->fetch()){
                                    ?>    
                           <tr>
                              <td><?php echo $row["nom"]?></td>
                              <td><?php echo $row["email"]?></td>
                              <td><?php echo $row["telephone"]?></td>
                              <td><button class="btndel">
                              <?php echo "<a href=\"./deleteuser.php?id=" . $row["id_users"] . ";\">Del</a>"?>
                              </button></td>
                           </tr>
                      <?php
                                  }
                      ?>
                           </tbody> 
                      </table>
    </div>
    </div>
    </form>
</body>
</html>