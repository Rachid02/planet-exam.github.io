<?php 

    $hote = "localhost";
    $user = "root";
    $pass = "";
    $dbname = "planete-exam";

    $connexion = new PDO("mysql:host=$hote; dbname=$dbname", $user, $pass);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if($connexion){
        $createUsersTable = $connexion->query("CREATE TABLE IF NOT EXISTS users(
            id BIGINT(25) UNSIGNED NOT NULL AUTO_INCREMENT,
            pseudo VARCHAR(50) DEFAULT '/',
            pass TEXT, 
            PRIMARY KEY(id) 
        )");

        $createPlanetesTable = $connexion->query("CREATE TABLE IF NOT EXISTS planetes(
            id BIGINT(25) UNSIGNED NOT NULL AUTO_INCREMENT,
            planetName VARCHAR(50) DEFAULT '/',
            planetType VARCHAR(50) DEFAULT '/',
            planetImg TEXT,
            planetDiametre VARCHAR(50) DEFAULT '/',
            planetAspect TEXT,
            planetDesc  TEXT,
            PRIMARY KEY(id) 
        )");
    }