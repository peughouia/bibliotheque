<?php
  //connexion a la base de données
  include ("../../config/Config.php");
  //récupération de l'id dans le lien
  $id_users = $_GET['id'];
  //requête de suppression
  $statement = $con -> prepare("DELETE FROM users WHERE id_users = $id_users");
  $resultat = $statement -> execute();
  header('location:List_User.php');  
         
?>