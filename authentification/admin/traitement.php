<?php
            include ("../../config/Config.php");

            $err_message = "";

            if( isset($_POST["register_btn"]) &&
                isset($_FILES["upload_file"])
            ){
                $date = date('Y-m-d');
                $titre = $_POST["titre"];
                $auteur = $_POST["auteur"];
                $categorie = $_POST["categorie"];
                $description = $_POST["description"];
                $pdfFile = $_FILES['pdf']['tmp_name']; // Récupération du fichier PDF depuis un formulaire
                $pdfData = file_get_contents($pdfFile); // Lecture du contenu du fichier PDF

                $target_dir = "../../image/";
                $filename = basename($_FILES["upload_file"]["name"]);
                $target_file = $target_dir . $filename;
                $imageFileType = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
                $allowed_extention = array("jpg", "png", "jfif", "gif");
                //$request = "INSERT INTO realisations(title, price, image_url, id_artist, registed_date) VALUES(?, ?, ?, 1, CURRENT_DATE)";
                if(!in_array($imageFileType, $allowed_extention)) {
                    $_POST["err_message"] = "Seuls les fichiers JPG, JFIF, PNG et GIF sont acceptés";
                } else {
                    $statement =  $con -> prepare("INSERT INTO livre(titre_livre,auteur_livre,categorie_livre,description_livre,Date_publication,fichier,url_image) 
                    VALUES(?, ?, ?, ?, ?, ?, ?)");

                    $res = $statement -> execute([$titre,$auteur,$categorie,$description,$date,$pdfData,$filename]);

                    if($res && !file_exists($target_file)){
                        move_uploaded_file(
                            $_FILES["upload_file"]["tmp_name"], 
                            $target_file
                        );
                    } 
                }
                /*$statement =  $con -> prepare("INSERT INTO documents(titre,fichier,date_creation) 
                VALUES(?, ?, ?)");

                $res = $statement -> execute([$titre,$pdfData,$date]);*/

            }
    header("location:add_livre.php?res=success");
?>