<?php
 include "../../config/Config.php";
$id = $_GET['id'];
$requete = "SELECT * FROM livre WHERE id_livre =$id";
$res=$con->query($requete);
while($row=$res->fetch()){
    $name = $row['titre_livre'];
    header("Content-type: application/pdf");
    header("Content-Disposition: inline; filename=$name.pdf");

    echo $row['fichier'];
}
?>