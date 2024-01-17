<?php
  //connexion a la base de données
  include ("../../config/Config.php");
  //récupération de l'id dans le lien
  $id_livre = $_GET['id'];
  //requête de suppression
  $statement = $con -> prepare("DELETE FROM livre WHERE id_livre = $id_livre");
  $resultat = $statement -> execute();
  header('location:list_livre.php');  
         
?>