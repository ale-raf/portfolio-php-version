<?php
require_once "config.php";

$sql = "SELECT * FROM `works`";
$req = $db->query($sql);
$articles = $req->fetchAll();

include "header.php";

// $to = 'nobody@example.com';
// $subject = 'the subject';
// $message = 'hello';
// mail($to, $subject, $message) 
?>


<main>
    <?php include "hero.php" ?>
    
    <?php include "skills.php" ?>
    
    <section id="works">
        <h1>Projets</h1>
        <?php foreach($articles as $article): ?>
            <article>
                <h1>
                    <a href="projet.php?id=<?= $article["id"] ?>">
                        <?= $article["title"] ?>
                    </a>
                </h1>
                <p><?= $article["subtitle"] ?></p>
            </article>
        <?php endforeach; ?>
    </section>
</main>

<?php include "footer.php" ?>