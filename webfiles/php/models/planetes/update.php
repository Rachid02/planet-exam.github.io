<?php 
    require_once('../dbConnect.php');
    
    $planetID = $_GET['planetID'];
    $newPlanetName = htmlentities($_GET['planetName']);
    $newPlanetImg = $_GET['planetImg'];
    $newPlanetDesc = htmlentities($_GET['planetDesc'], ENT_QUOTES);

    

    if($connexion){
        $req = "UPDATE planetes SET planetName = '$newPlanetName', planetImg = '$newPlanetImg', planetDesc = '$newPlanetDesc' WHERE id = $planetID";
        $exec = $connect->query($req);

        header('location: ../views/displayAll.php');
    }
?>