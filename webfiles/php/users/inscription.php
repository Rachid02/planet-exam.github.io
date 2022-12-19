<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/webfiles/css/style.css">
    <title>Inscription</title>
</head>
<body>
    <?php session_start();
     if(isset($_SESSION["loggedin"]) && $_SESSION['loggedin'] === true ): ?>
    <form method="POST" action="../models/auth/inscription.php">
    <label for="pseudo">Pseudonyme&nbsp;: </label>
        <input type="text" name="pseudo" id="pseudo">
        <label for="motDePasse">Mot de passe :</label>
        <input type="password" id="motDePasse" name="password">
        <input type="submit" value="connexion">
        <input type="submit">
    </form>
    <?php endif; ?>
</body>
</html>
