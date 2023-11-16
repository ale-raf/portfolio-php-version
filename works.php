<?php
require_once "config.php";

$sql = "SELECT * FROM `works`";
$req = $db->query($sql);
$worksList = $req->fetchAll();
?>

<section id="works">
    <h1>Projets</h1>
    <div class="works_container">
        <?php 
            foreach($worksList as $work): 
            $technologies = explode(",", $work["technologies"]) 
        ?>
            <article class="work_card">
                <a href="projet.php?id=<?= $work["id"] ?>">
                    <h2><?= $work["title"] ?></h2>
                    <p><?= $work["subtitle"] ?></p>
                    <?php foreach($technologies as $tech): ?>
                        <span><?= $tech ?></span>
                    <?php endforeach; ?>
                </a>
            </article>
        <?php endforeach; ?>
    </div>
</section>