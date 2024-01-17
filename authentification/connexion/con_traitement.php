<?php 
    session_start();
    require_once '../../config/Config.php';

    if(isset($_POST['email']) && isset($_POST['password']))
    {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $check = $con->prepare("SELECT * FROM users WHERE email = ?");
        $check->execute(array($email));
        $data = $check->fetch();
        $row = $check->rowCount();

        if($row == 1)
        {
            if(filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                //$password = hash('sha256',$password);
                if($data['password'] === $password)
                {
                        $_SESSION['id_users'] = $data['id_users'];
                        $_SESSION['username'] = $data['nom'];
                        $_SESSION['type_users'] = $data['type_users'];
                        if($data['type_users'] == "admin"){
                            header("Location: admin.php");
                            exit();
                        }else{
                            header('Location:landing.php');
                            exit();
                        } 
                }
                else header('Location:connexion.php?login_err=password');
            }else header('Location:connexion.php?login_err=email');
        }else header('Location:connexion.php?login_err=already');
    }else header('Location:connexion.php');
?>