<?php 
    try 
    {
        //$bdd = new PDO("mysql:host=localhost;dbname=cooking;charset=utf8", "root", "");
        $bdd = new PDO("mysql:host=192.168.65.54;dbname=cooking;charset=utf8", "root", "");
    }
    catch(PDOException $e)
    {
        die('Erreur : '.$e->getMessage());
    }