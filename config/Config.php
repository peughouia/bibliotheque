<?php
    try
    {
        $con=new PDO('mysql:host=localhost;dbname=library;charset=utf8','root','');
    }
    catch(Exception $e)
    {
        die('erreur'.$e->getMessage());
    }