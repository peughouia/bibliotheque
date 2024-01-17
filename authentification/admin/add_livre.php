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
    <link rel="stylesheet" href="../../styles/stylelivre.css">
    <title>Ajouter livre</title>
</head>
<body>
   <?Php
   include "../../menu/hearderAdmin.php"
   ?>
    <div class="container">
        <form method="POST" action="traitement.php" enctype="multipart/form-data">
          <?php 
             if(isset($_GET['res']))
             {
                 $err = htmlspecialchars($_GET['res']);
     
                 switch($err)
                 {
                     case 'success':
                         ?>
                         <p><strong>SUCCESS</strong> Livre Enregistrer</p>
                         <?php
                         break;
                  }
              }
          ?><br>
            <h2> Ajoutez un livre </h2>
            <p>Titre :</p> <input type="Text" name="titre">
            <br>
            <p>Auteur :</p> <input type="Text" name="auteur">
            <br>
            <p>Categorie :</p> <input type="Text" name="categorie">
            <br>
            <p>Description :</p> <textarea name="description"></textarea>
            <br>
            <div class="image_area">
              <div class="image_input"><img id="output" alt="realisation image" width="50"/></div>
              <span name="err_message"></span>
              <input type="file" name="upload_file" accept="image/*" class="upload_file_create" onchange="loadFile(event)"/>
            </div>
            <br>
            <label for="pdf">Sélectionner un fichier PDF:</label>
            <input type="file" name="pdf" id="pdf" accept=".pdf" required>
            <br><br>
            <input type="submit" name="register_btn" value="Enregistrer"/>
        </form>
    </div>

    <script>
      var loadFile = function(event) {
        var image = document.getElementById('output');
        image.src = URL.createObjectURL(event.target.files[0]);
      };
    </script>
</body>
</html>