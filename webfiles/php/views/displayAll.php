<?php 
    $titreOnglet = "Tableaux des planètes du système solaire";
    
    require_once './template_parts/header.php';
?>

<main>
    <section>
        <h2>Tableau des planètes du système solaire</h2>
    
        <?php 
            require_once ('../models/planetes/getAll.php');
            $i = 0;
        ?>

        <table border=2>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Type</th>
                    <th>Illustration</th>
                    <th>Diamètre</th>
                    <th>Aspect de la surface et Composition</th>
                    <th>Description</th>
                    <th>Editer</th>
                    <th>Suppression</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($result as $singlePlanetData): ?>
                    <tr>
                        <?php foreach($singlePlanetData as $key=>$singleData): ?>
                            <td id="info">
                                <?php if($key === 'id')
                                    {
                                        $i = $i+1;
                                        echo $i; 
                                    }
                                    else if($key === 'planetImg'){?>
                                        <img src="<?= $singleData; ?>" alt="illustration de la planète <?= $singlePlanetData['planetName']; ?>">
                                    <?php }
                                    else echo $singleData;
                                ?>
                            </td>
                        <?php endforeach; ?>
                        <td>
                        <a href="../views/edit.php?name=<?= $singlePlanetData['planetName'] ?>&id=<?= $singlePlanetData['id'] ?>" title="Modifier la planète <?= $singlePlanetData['planetName'] ?>">Editer</a>
                        </td>
                        <td>
                            <a href="../models/delete.php?id=<?= $singlePlanetData['id'] ?>" title="Supprimer la planète <?= $singlePlanetData['planetName'] ?>">Supprimer</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>  
    </section>      
</main>

<?php 
$footer = require_once './template_parts/footer.php'; 
?>