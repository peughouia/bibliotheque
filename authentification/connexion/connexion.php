<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CONNECTION</title>
    <link rel="stylesheet" href="../../styles/styleCon.css">
</head>
<body>
    <div class="lop">
    <div>
        <h1>Connectez-vous</h1>
        <?php
        if(isset($_GET['login_err']))
        {
            $err = htmlspecialchars($_GET['login_err']);

            switch($err)
            {
                case 'password':
                    ?>
                    <strong>ERREUR</strong> mot de passe incorrect
                    <?php
                    break;

                    case 'email':
                        ?>
                        <strong>ERREUR</strong> email incorrect
                        <?php
                        break;

                        case 'already':
                            ?>
                            <strong>ERREUR</strong> compte non existant
                            <?php
                            break;
                    
                            case 'success':
                                ?>
                                <strong>Success</strong> compte creer avec success
                                <?php
                                break;


            }
        }
        ?>
    </div>
    <form action="con_traitement.php" method="post">
        <div class="textr">
            <input type="email" name="email"  required="email" placeholder="E-mail">
                 <span></span>
         </div>
        <div class="textr">
            <input type="password" name="password" required="required">
                <span></span>
         <label>Password</label>
        </div>
        <div class="pass">mot de passe oublié?</div>
          <input type="submit" value="Login">
        <div class="creer">   not member? 
        <a href="../inscription/inscription.php">Créer un compte</a><br>
        <a href="../../index.php">GO at home</a></div>
    </form>
</div>
</body>
</html>