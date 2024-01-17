<?php
session_start();
include "../../config/Config.php";
if (!isset($_SESSION["id_users"])) {
  header("Location: ../connexion/connexion.php");
  exit();
}

if(isset($_POST['send'])){
    $livre =  $_POST["id_livre"];
    $user = $_SESSION["id_users"];
    $date = date("Y-m-d");
    $comment = $_POST["commentaire"];

    $req = $con -> prepare("INSERT INTO commentaire(id_livre,id_user,date_Commentaire,commentaire)
    VALUES(?,?,?,?)");
    $res = $req -> execute([$livre,$user,$date,$comment]);
    header("Location:detailLiv.php?id=".$livre);
}
?>