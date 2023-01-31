<?php

    try 
    {
        $bdd = new PDO("mysql:host=localhost;dbname=g2r_stock;charset=utf8", "root", "");
    }
    catch(PDOException $e)
    {
        die('Erreur : '.$e->getMessage());
    }

?>