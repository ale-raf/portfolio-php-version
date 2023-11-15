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

include "header.php";
?>

<article>
    <h1><?= $work["title"] ?></h1>
    <h2><?= $work["subtitle"] ?></h2>
    <p>Technologies utilisées : <?= $work["technologies"] ?></p>
    <?php
        if($work["demo"] === ""){
            echo "<p>Démo indisponible pour ce projet.</p>";
        } else{
            echo "<a href=" . $work['demo'] . ">Démo du projet</a>";
        }
    ?>
</article>