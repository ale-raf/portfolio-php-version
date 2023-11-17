<?php
// vérification de l'id de l'article
if(!isset($_GET["id"]) || empty($_GET["id"])){
    // pas d'id
    header("Location : index.php");
    exit;
}
// récupération de l'id
$id = $_GET["id"];

// connexion à la base de données
require_once "config.php";

$sql = "SELECT * FROM `works` WHERE `id` = :id";
$req = $db->prepare($sql);
$req->bindValue(":id", $id, PDO::PARAM_INT);
$req->execute();
$work = $req->fetch();

if(!$work){
    http_response_code(404);
    echo "Projet inexistant.";
    exit;
}

$title = $work["title"];

$skills = "index.php#skills";

$works = "index.php#works";

$technologies = explode(",", $work["technologies"]); 

$missions = explode(";", $work["demands"]);

$problems = explode(",", $work["difficulties"]);

$solutions = explode(",", $work["solutions"]);

include "header.php";
?>

<article>
    <h1><?= $work["title"] ?></h1>
    <h2><?= $work["subtitle"] ?></h2>
    <div class="technologies">
        <?php foreach($technologies as $tech): ?>
            <span><?= $tech ?></span>
        <?php endforeach; ?>
    </div>
    <ul class="missions">Missions :
        <?php foreach($missions as $mission): ?>
            <li><?= $mission ?></li>
        <?php endforeach; ?>
    </ul>
    <ul class="problems">Problèmes rencontrés :
        <?php foreach($problems as $problem): ?>
            <li><?= $problem ?></li>
        <?php endforeach; ?>
    </ul>
    <ul class="solutions">Solutions :
        <?php foreach($solutions as $solution): ?>
            <li><?= $solution ?></li>
        <?php endforeach; ?>
    </ul>
    <div class="links">
        <a href=<?= $work["repository"] ?> target="_blank">Code source</a>
        <?php
            if($work["demo"] === ""){
                echo "<p>Démo indisponible pour ce projet.</p>";
            } else{
                echo "<a href=" . $work['demo'] . " target='_blank'>Démo du projet</a>";
            }
        ?>
    </div>
    <div class="navigation">
        <a href="projet.php?id=<?= $work["id"] > 1 ? $work["id"] - 1 : 5 ?>">Précédent</a>
        <a href="projet.php?id=<?= $work["id"] < 5 ? $work["id"] + 1 : 1 ?>">Suivant</a>
    </div>
</article>