<?php 
    require_once('../models/dbConnect.php');

    if($connexion){
        $req = "SELECT * FROM planetes";

        try{
            $exec = $connexion->query($req);
            $result = $exec->fetchAll(PDO::FETCH_ASSOC);
            // var_dump($result);
        }
        catch(Exception $e){
            echo $e;
        }

    }
    else echo "Problème de connexion à la base de donnée.";
?>