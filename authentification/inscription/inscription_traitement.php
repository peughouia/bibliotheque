<?php
//fonction pour send le mail
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
    require '../../config/vendor/autoload.php';

function sendmail($email,$nom,$code){

    //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try{
            //Server settings
            $mail->SMTPDebug =0; //SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'tefokou.30@gmail.com';                     //SMTP username
            $mail->Password   = 'rfnmmrruiyqvgpic';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;//PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 587;

            //Recipients
            $mail->setFrom('tefokou.30@gmail.com', 'MyBliblio');
            $mail->addAddress($email, $nom);

            //Content
            $mail->isHTML(true); 

            $mail->Subject = 'Email verification';
            $mail->Body    = 'votre code de verification <b>'.$code.'</b>';

            $mail->send();

        }catch(Exception $e){
            echo "Le code n'a pas été envoyer. probléme de connexion réessayer:" ;//{$mail->ErrorInfo}
        }
}
?>
<?php
        function save($nom,$ville,$email,$telephone,$password,$password_retype){
            require_once '../../config/Config.php';
            $check = $con->prepare("SELECT nom, email,telephone,password FROM users WHERE email = ?");
            $check->execute(array($email));
            $data = $check->fetch();
            $row = $check->rowCount();
                if($row==0)
                    {
                        if(strlen($nom) <= 100)
                        {                           
                             if(strlen($telephone) <= 30)
                             {    
                                if(strlen($email) <= 100)
                                 {
                                    if(strlen($ville) <= 20){
                                     if(filter_var($email, FILTER_VALIDATE_EMAIL))
                                     {
                                         if($password == $password_retype)
                                         {
                                            //$password = hash('sh256', $password);
                                            $insert = $con->prepare("INSERT INTO users(nom,ville, email,telephone,password) VALUES (?, ?, ?, ?,?)");
                                            $insert->execute(array(
                                            $nom,
                                            $ville,
                                            $email, 
                                            $telephone,
                                            $password                              
                                          ));
                                          header('Location: inscription.php?reg_err=success');
                                          header('Location:../connexion/connexion.php?login_err=success');
                                         }else header('Location: inscription.php?reg_err=password');
                                     }else header('Location: inscription.php?reg_err=email');
                                    }else header('Location: inscription.php?reg_err=ville');
                                 }else header('Location: inscription.php?reg_err=email_length');
                             }else header('Location: inscription.php?reg_err=prenom_length');
                        }else header('Location: inscription.php?reg_err=nom_length');
                    }else header('Location: inscription.php?reg_err=already');
                    echo "Enregistrer avec success";
            }   
?>

    <!DOCTYPE html>
    <html>
    <head>
      <link rel="stylesheet" type="text/css" href="../../styles/styleconfirm.css">
    </head>
    <body>
        <?php
         if(isset($_POST['nom']) )
         {
             $nom = $_POST['nom'];
             $email = $_POST['email'];
             $ville = $_POST['ville'];
             $telephone = $_POST['telephone'];
             $password = $_POST['password'];
             $password_retype = $_POST['password_retype'];
             $confirmationCode = rand(100000, 999999);
             sendmail($email,$nom,$confirmationCode);
         }
         if(isset($_POST['btn']) )
         {
             $nom = $_POST['cnom'];
             $email = $_POST['cemail'];
             $ville = $_POST['cville'];
             $telephone = $_POST['ctelephone'];
             $password = $_POST['cpassword'];
             $password_retype = $_POST['cpassretype'];
             $codetype = $_POST["code"];
             $code = $_POST["codeint"];
             if($codetype == $code ){
                save( $nom,$ville,$email,$telephone,$password,$password_retype);
             }else{
                echo "code incorrect";
             }
            
         }
        ?>
        
        


      <div class="card">
        <h2>Confirmation</h2>
        <form method="POST">
            <input type="text" name ="cnom" value="<?php echo"$nom" ?>" readonly>
            <input type="text" name ="cville" value="<?php echo"$ville " ?>" readonly>
            <input type="text" name ="cemail" value="<?php echo"$email" ?>" readonly>
            <input type="text" name ="ctelephone" value="<?php echo"$telephone" ?>" readonly>
            <input type="password" name ="cpassword" value="<?php echo"$password" ?>" readonly>
            <input type="password" name ="cpassretype" value="<?php echo"$password_retype" ?>" readonly>
                <input type="text" name ="code" placeholder="Entrez le code de confirmation" required="required" >
                <button type="submit" name="btn">Envoyer</button>
            <input type="hidden" name ="codeint" value="<?php echo"$confirmationCode" ?>" readonly>

        </form>
      </div>
    </body>
    </html>