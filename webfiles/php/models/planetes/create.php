<?php 
    require_once('../dbConnect.php');

    $nomPlanete = htmlentities($_GET["nomPlanete"]);
    $typePlanete = htmlentities($_GET["planetType"]);
    $imagePlanete = $_GET["imagePlanete"];
    $diametrePlanete = $_GET["planetDiametre"];
    $aspectPlanete = htmlentities($_GET["planetAspect"], ENT_QUOTES);
    $descPlanete = htmlentities($_GET["planetDesc"], ENT_QUOTES);

    // http://planetes-exam.test/planetes-exam/webfiles/php/models/planetes/create.php?nomPlanete=Mercure&imagePlanete=https://test.fr&planetDesc=Bonjour%20les%20zamis

    $errorsArray;
    $i = 0;

    foreach($_GET as $key => $value){

        $value = trim($value);

        $regExp = "/^[a-zA-Zàâçéèêëîïôûùüÿñæœ .-]*$/i";
        $regExp2 = "/^[Km0-9 .]*$/i";
        $regExp3 = "/^[a-zA-Z0-9 .-\/:]*$/i";
        $regExp4 = "/^[a-zA-Zàâçéèêëîïôûùüÿñæœ ,.-]*$/i";

        if($key === "nomPlanete" || $key === "planetType" || $key === "planetAspect"){
            $value != "" && strlen($value)>1 && strlen($value)<50 && preg_match($regExp, $value); 
            "Le test s'est bien passé pour le champ $key moins de 50 lettres";
        }
        else if($key === "planetDiametre"){
            $value != "" && strlen($value)>1 && strlen($value)<25 && preg_match($regExp2, $value); 
            "Le test s'est bien passé pour le champ $key nombre";
        }
        else if($key === "imagePlanete"){
            $value != "" && strlen($value)>1 && strlen($value)<250 && preg_match($regExp3, $value); 
            "Le test s'est bien passé pour le champ $key image";
        }
        else if($key === "planetDesc"){
            $value != "" && strlen($value)>1 && preg_match($regExp4, $value); 
            "Le test s'est bien passé pour le champ $key description";
        }

        else{
            $errorsArray[$i] = "Le champ $key contient une ou plusieurs incohérences.";
            $i++;
        }
    }

    if(!isset($errorsArray)){
        $nomPlanete = htmlentities($_GET["nomPlanete"]);
        $typePlanete = htmlentities($_GET["planetType"]);
        $imagePlanete = $_GET["imagePlanete"];
        $diametrePlanete = $_GET["planetDiametre"];
        $aspectPlanete = htmlentities($_GET["planetAspect"], ENT_QUOTES);
        $descPlanete = htmlentities($_GET["planetDesc"], ENT_QUOTES);
        
        if($connexion){
            
            try{
                $req = "INSERT INTO planetes (planetName, planetType, planetImg, planetDiametre, planetAspect, planetDesc) VALUES (:planetName, :planetType, :planetImg, :planetDiametre, :planetAspect,  :planetDesc)";
                $prepare = $connexion->prepare($req);
                $prepare->bindParam('planetName', $nomPlanete);
                $prepare->bindParam('planetType', $typePlanete);
                $prepare->bindParam('planetImg', $imagePlanete);
                $prepare->bindParam('planetDiametre', $diametrePlanete);
                $prepare->bindParam('planetAspect', $aspectPlanete);
                $prepare->bindParam('planetDesc', $descPlanete);
                $prepare->execute();

                echo "inserted";

            }
            catch(Exception $e){
                echo $e->getMessage();
            }
    
        }
        else echo "Problème de connexion à la base de donnée.";
    }
    else{
        foreach($errorsArray as $singleError){
            echo $singleError;
        }
    }

?>