<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editer une planète</title>
    <script src="/webfiles/js/script.js" defer></script>
</head>
<body>
    <header>
        <h1>Editer la planète <?= $_GET['name'] ?></h1>
    </header>
    <main>
        <form action="../models/planetes/update.php" method="GET">
            <ul>
                <li>
                    <label for="planetName">Le nouveau nom de la planète&nbsp;:</label>
                    <input type="text" id="planetName" name="planetName">
                </li>
                <li>
                    <label for="planetImg">La nouvelle image de la planète&nbsp;:</label>
                    <input type="text" id="planetImg" name="planetImg">
                </li>
                <li>
                    <label for="planetDesc">La nouvelle description de la planète&nbsp;:</label>
                    <textarea id="planetDesc" name="planetDesc"></textarea>
                </li>
                <input type="hidden" name="planetID" value="<?= $_GET["id"] ?>">
            </ul>
            <input id="submit" type="submit" value="Mettre à jour">
        </form>
    </main>
</body>
</html>