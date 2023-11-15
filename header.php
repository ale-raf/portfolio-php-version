<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title><?= $title ?? "Portfolio" ?></title>
</head>
<body>
    <header>
        <nav>
            <a href="index.php">Accueil</a>
            <a href=<?= $skills ?? "#skills" ?>>Compétences</a>
            <a href=<?= $works ?? "#works" ?>>Projets</a>
        </nav>
    </header>
