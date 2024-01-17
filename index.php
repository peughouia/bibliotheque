<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/INDEX.css">
    <title>LibraryBiblio</title>
</head>
<body>
<?php 
    include "menu/header.php"
    ?>
    <div  id="accueil"></div>
        <section class="container-home">
            <div class="text-content">
                <div class="text-item">
                    <p><span class="title">
                         <span class="title-home">
                            Télécharger vos livres Ici 
                         </span><br> 
                         la lecture sur <br> 
                        <span class="mot">My </span> <span class="pass">Biblio</span> 
                      </span>
                    </p>
                    <form action="./authentification/connexion/connexion.php">
                    <button class="btn">Commencer</button>
                    </form>
                </div>                                  
            </div>  
           </section>
            <div class="titre"><p>Nos Livres</p></div>
          <div class="gcard">
            <?php
    include "config/Config.php";
    $requete = "SELECT * from livre";
    $res = $con -> query($requete);

    $target_dir = "image/";

    while($row = $res -> fetch()){

        $target_file = $target_dir . $row["url_image"];   
        echo" <div class=\"card\">
        <img src=$target_file alt='Livre image'>
        <div class=\"card-content\">
          <h2>Titre: ". $row["titre_livre"] . "</h2>
          <span> Auteur: " . $row["auteur_livre"] . "</span><br>
          <span> Categorie: " . $row["categorie_livre"] . "</span><br>
          <span> Publier le: " . $row["Date_publication"] . "</span><br>
        </div>
      </div>";   
    }
    ?>
    </div>            
    <section class="conpte">
       <div class="pop">
        <div class=" font pop1">
            <span>+200 livre</span>
            <p>Nous possédons de nombreux livres</p>
        </div>
        <div class=" font pop2">
          <p>notation de nos</p>
          <h3>livres basée sur plus 200 avis</h3>
        </div>
        <div class=" font pop3">
            <span>+500</span>
            <p>Télécharge sur MyBiblio</p>
        </div>
      </div>
    </section>
 
    <?php 
    include "menu/footer.php"
    ?>
</body>
</html>