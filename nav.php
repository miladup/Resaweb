<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="nav.css">
    <link href="https://fonts.cdnfonts.com/css/happy-camper" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <title>Navigation Bar</title>
    <link rel="icon" href="photos/favicon.png">
</head>
<body>
<header>
<div class="nav-container">
    <nav>
        <a href="index.php">
            <span class="sr-only">Retour à l'accueil</span>
            <img class="logo" src="photos/logo-long-marron.png" alt="Logo">
        </a>
        <ul class="nav">
            <li><a class="nav-link <?php if ($current_page == 'cabanes.php') echo 'active'; ?>" href="cabanes.php">Nos cabanes</a></li>
            <li><a class="nav-link <?php if ($current_page == 'services.php') echo 'active'; ?>" href="services.php">Services</a></li>
            <li><a class="nav-link <?php if ($current_page == 'apropos.php') echo 'active'; ?>" href="apropos.php">À propos</a></li>
        </ul>
    </nav>
</div>
</header>

</body>
</html>