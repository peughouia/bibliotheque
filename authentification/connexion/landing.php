<?php
session_start();
if (!isset($_SESSION["id_users"])) {
  header("Location: connexion.php");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/INDEX.css">
    <title>MyBiblio</title>
</head>
<body>
<?php 
    include "../../menu/hearderUser.php"
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
                </div>                                  
            </div>
            <div class="img-content">
                    <img src="../img/phote1.jpg" alt="">  
           </div>            
    </section>

    <div class="titre"><p>Nos Livres</p></div>
          <div class="gcard">
            <?php
    include "../../config/Config.php";
    $requete = "SELECT * from livre";
    $res = $con -> query($requete);

    $target_dir = "../../image/";

    while($row = $res -> fetch()){

        $target_file = $target_dir . $row["url_image"];   
        echo" <div class=\"card\">
        <button class=\"btnconsulter\"><a href=\"./detailLiv.php?id=" . $row["id_livre"] . ";\">Consulter</a></button>
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
    <section class=" conpte">
       <div class="pop">
        <div class=" font pop1">
            <span>+200 livre</span>
            <p>MyBiblio possede de nombreux livre</p>
        </div>
        <div class=" font pop2">
          <img src="../img/icone1.ico" alt="">
          <img src="../img/icone1.ico" alt="">
          <img src="../img/icone3.ico" alt="">
          <p>bien noté sur la richesse de nos
          livres basée sur 200 avis
          </p>
        </div>
        <div class=" font pop3">
            <span>500 +</span>
            <p>Emprunte sur MyBiblio</p>
        </div>
      </div>
    </section>
    <?php 
    include "../../menu/footer.php"
    ?>

</body></html>
