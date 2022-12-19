<?php 
require_once("../dbConnect.php");

if($connexion){
    $pseudo = $_POST['pseudo'];
    $mdp = $_POST['password'];

    $connect = $connexion->query("SELECT * FROM users");
    $assocConnect = $connect->fetchAll(PDO::FETCH_ASSOC);

    foreach($_POST as $field => $value){
        if($field === 'password'){
            $password = $value;
            if(empty($error)){
                $hashedPass = hash ('sha512', htmlspecialchars($password));
                /* var_dump($hashedPass); */
            }
            if($hashedPass !== $assocConnect[0]['passwords']){
                echo "mot de passe incorrect ";   
            }
        }
    }

    if(isset($_SESSION['loggedin']) && $_SESSION["loggedin"] === true){
    echo "La connexion est etablie !";
    /* header("location: ../modeles/pageblog.php"); */
    } else {
        echo "connexion échouée";
    }
}

?>
