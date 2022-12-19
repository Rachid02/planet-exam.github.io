<?php 
session_start();

require("../dbConnect.php");

if($connexion){
    if(isset($_SESSION["loggedin"]) && $_SESSION['loggedin'] === true ){

   /*  $pattern = "/^[a-zA-Z0-9àáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð_'-]+$/";
   a mettre dans l'ajout */
        $pattern = '/^[A-Za-z1-9\s&]+$/';

          foreach($_POST as $field => $value){
            var_dump($field);

            if($field === "password"){
                var_dump($value);
                $password = trim($value);
                if(strlen($password) <= 8){
                   echo $error = "Le mot de passe ne contient doit au moins faire 8 caractere";
                }
                if(strlen($password) > 25){
                   echo $error = "Le mot de passe est beaucoup trop long";
                }
                if (!preg_match('/[A-Z]/', $password)  || !preg_match('/\d/', $password) || !preg_match("/[$&+,:;=?@#|'<>.-^*()%!]/", $password) ) {
                   echo $error = "Votre mot de passe doit contenir au moins une majuscule, un chiffre et un charactère special.";
                }

                if(empty($error)){
                    $hashedPass = hash ('sha512', htmlspecialchars($password));
                    var_dump($hashedPass);
                }
            }
            if($field === "pseudo"){
                /* Verification du pseudo */
                if(preg_match("$pattern", $value)){
                    $pseudo = $value;
                } else {
                    var_dump('nooooon');
                }
            }   
        }
        $comptUser = $connexion->query("SELECT COUNT(id) FROM users");
        $assocUser = $comptUser->fetchAll(PDO::FETCH_ASSOC);
        var_dump($assocUser);
        var_dump(intval($assocUser[0]['COUNT(id)']));
        if(intval($assocUser[0]['COUNT(id)']) > 1){
            var_dump('non');
        } 
        elseif (intval($assocUser[0]['COUNT(id)']) < 1){
            var_dump('ok');
            $addUser = $connexion->query("INSERT INTO user (pseudo, passwords) VALUES ('$pseudo', '$hashedPass')");
            var_dump($addUser);
        }
    }
}
?>
