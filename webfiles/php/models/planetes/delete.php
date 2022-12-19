<?php 

    $id = $_GET['id'];

    require_once('../dbConnect.php');

    if($connexion){
        $req = "DELETE FROM planetes WHERE id=$id";        
        var_dump($req);
        $exec = $connexion->query($req);
        var_dump($exec);

        header("location: ../views/displayAll.php");
    }
?>