<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel de Milagres </title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;500&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/styles.css">
</head>

<?php
    require_once __DIR__ . '/config.php'
?>
<body class="container">
    <nav>
        <img class="image" src="./images/brasao_colorido.png" alt="">
    </nav>
    <main id="menu">
        <?php foreach($config->categorias as $cat ): ?>
            <a href="./milagre.php?categoria=<?= $cat->slug?>" class="transition color">
                <?= $cat->name ?>
            </a>
        <?php endforeach; ?>
    </main>
</body>
</html>