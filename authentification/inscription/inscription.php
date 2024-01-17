<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../styles/form.css">
    <title>Inscription to MyBiblio</title>
</head>
<body>
    <div class="container">
<?php
    if(isset($_GET['reg_err']))
    {
        $err = htmlspecialchars($_GET['reg_err']);

        switch($err)
        {
            case 'success':
            ?>
                <strong>SUCCESS</strong> inscription reussie!
            <?php
            break;

            case 'password':
            ?>
                <strong>ERREUR</strong> Mot de passe different!
            <?php
            break;

            case 'email':
            ?>
                <strong>ERREUR</strong> email non valide!
            <?php
            break;

            case 'ville':
                ?>
                    <strong>ERREUR</strong> ville trop long!
                <?php
                break;

            case 'email_length':
            ?>
                <strong>ERREUR</strong> email trop long!
            <?php
            break;

            case 'nom_length':
            ?>
                <strong>ERREUR</strong> Nom trop long!
            <?php
            break;

            case 'already':
            ?>
                <strong>ERREUR</strong> Compte deja existant!
            <?php
            break;
        }
    }
?>

        <section>
            <div class="sec-container">
                 <div class="form-wrapper">
                    <div class="card">
                       <div class="card-header">
                           <div id="forregister" class="form-header active">INSCRIPTION</div>
                       </div> 
                       <div class="card-body" id="formcontainer">
                       <form action="inscription_traitement.php" id="formregister" class="toggleform" method="post">
                                <input type="text"  name="nom" class="form-control" required="required" placeholder="Nom"> 
                                <input type="text" name ="ville" class="form-control"  required="required" placeholder="Ville">
                                <input type="text" name ="email" class="form-control"  required="required" placeholder="Email">
                                <input type="text" name="telephone" class="form-control" required="required" placeholder="Telephone">
                                <input type="password" name="password" class="form-control" required="required" placeholder="Mot de passe">
                                <input type="password" name="password_retype" class="form-control" required="required" placeholder="Confirmez Mot de passe">
                                <input type="submit" class="formbutton" value="S'inscrire" name="inscrire"><br>
                                <a href="../../index.php">GO at home</a>
                            </form>
                       </div>
                    </div>
                 </div>
            </div>
        </section>   
    </div>