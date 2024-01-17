<?php
session_start();
if (!isset($_SESSION["id_users"]) || $_SESSION["type_users"] !== "admin") {
    header("Location: connexion.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/admin.css">
    <title>MyBiblio</title>
</head>
<body>
    <?php
        include "../../menu/hearderAdmin.php";
    ?>
        <div  id="accueil"></div>
        <section class="container-home">
            <div class="text-content">
                <div class="text-item">
                    <p><span class="title">
                         <span class="title-home">
                            Gerer Vos Livres 
                         </span><br> 
                         la lecture sur <br> 
                        <span class="mot">My </span> <span class="pass">Biblio</span> 
                      </span>
                    </p>
                </div>                                  
            </div>           
    </section>
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
          <p>bien noté sur la richesse de nos</p>
          <h3>livres basee sur 200 avis</h3>
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
